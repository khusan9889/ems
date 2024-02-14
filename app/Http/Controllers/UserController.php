<?php

namespace App\Http\Controllers;

use App\Models\ActionsLog;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request, UserServiceInterface $userService)
    {
        $filters = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'branch' => $request->input('branch'),
            'department' => $request->input('department'),
            'role' => $request->input('role'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $userBranchId = auth()->user()->branch_id;

        if ($userBranchId != 1) {
            $filters['branch'] = $userBranchId;
        }

        $data = $userService->customFilter($filters);
        $branches = Branch::pluck('name', 'id');
        $roles = Role::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');


        return view('dashboard.pages.users', compact('data', 'branches', 'roles', 'departments'));
    }

    public function create()
    {
        $userBranchId = auth()->user()->branch_id;
        if ($userBranchId === 1) {
            $branches = Branch::all(['id', 'name']);
        } else {
            $branches = Branch::where('id', $userBranchId)->get(['id', 'name']);
        }
        $roles = Role::all();
        $departments = Department::all(['id', 'name']);

        $activity = new ActionsLog();
        $activity->name = 'Пользователь создан';
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.users-create-page', compact('branches', 'roles', 'departments'));
    }


    public function update(Request $request, User $user)
    {
        $userData = $request->only('name', 'branch_id', 'department_id', 'role_id', 'email', 'phone_number');

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->input('password'));
        }

        $user->update($userData);

        return redirect()->route('users.index');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
            'role_id' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|min:8',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->branch_id = $request->input('branch_id');
        $user->department_id = $request->input('department_id');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = bcrypt($request->input('password'));

        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(Request $request, User $user)
    {
        $data = $user;
        $departments = Department::all();
        $roles = Role::all();

        $userBranchId = auth()->user()->branch_id;
        if ($userBranchId === 1) {
            $branches = Branch::all(['id', 'name']);
        } else {
            $branches = Branch::where('id', $userBranchId)->get(['id', 'name']);
        }

        $activity = new ActionsLog();
        $activity->name = 'Пользователь изменен: ' . $data->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.users-edit-page', compact('data', 'branches', 'departments', 'roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $activity = new ActionsLog();
        $activity->name = 'Пользователь удален: ' . $user->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function fetchDepartments(Request $request)
    {
        $branchId = $request->input('branch_id');
        $departments = Department::where('branch_id', $branchId)->get();

        return response()->json(['departments' => $departments]);
    }

    public function activity()
    {
        $data = ActionsLog::with('user')->paginate(50);

        return view('dashboard.pages.activities', ['data' => $data]);
    }

}
