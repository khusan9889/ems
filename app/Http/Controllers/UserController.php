<?php

namespace App\Http\Controllers;

use App\Models\Branch;
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

        return view('dashboard.pages.users-create-page', compact('branches', 'roles'));
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
            'role_id' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|min:8', // Add validation rule for the password
        ]);

        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->branch_id = $request->input('branch_id');
        $user->role_id = $request->input('role_id');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');

        // Hash the password using bcrypt
        $user->password = bcrypt($request->input('password'));

        // Save the user
        $user->save();

        // Redirect to the users index page or perform any other necessary actions
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
}
