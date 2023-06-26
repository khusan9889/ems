<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Role;
use App\Models\User;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserServiceInterface $userService)
    {
        $filters = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'branch' => $request->input('branch'),
            'role' => $request->input('role'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $data = $userService->customFilter($filters);
        $branches = Branch::pluck('name', 'id'); // Get branch names with their IDs
        $roles = Role::pluck('name', 'id');

        return view('dashboard.pages.users', compact('data', 'branches', 'roles'));
    }

    public function create()
    {
        $branches = Branch::all(['id', 'name']);
        $roles = Role::all(['id', 'name']);
        $departments = Department::all(['id', 'name']);
        return view('dashboard.pages.users-create-page', compact('branches', 'roles', 'departments'));
    }


    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'branch_id', 'role_id', 'email', 'phone_number'));

        return redirect()->route('users.index');
    }

    public function store(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required', // Add validation rule for the department ID
            'role_id' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|min:8',
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->branch_id = $request->input('branch_id');
        $user->department_id = $request->input('department_id'); // Save the selected department ID
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');
        $user->password = bcrypt($request->input('password'));

        // Save the user
        $user->save();

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }
    
    public function edit(Request $request, User $user)
    {
        // dd($user);
        // $data = User::findOrFail($id);
        $data = $user;
        $branches = Branch::all();
        $roles = Role::all();

        return view('dashboard.pages.users-edit-page', compact('data', 'branches', 'roles'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }

    public function fetchDepartments(Request $request)
    {
        $branchId = $request->input('branch_id');
        $departments = Department::where('branch_id', $branchId)->get();

        return response()->json(['departments' => $departments]);
    }
}
