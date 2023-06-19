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

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request, User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'branch_id', 'role_id', 'email', 'phone_number'));

        return redirect()->route('users.index');
    }

    // public function update(Request $request, User $user)
    // {
    //     $user->update($request->only('name', 'branch_id', 'role_id', 'email', 'phone_number'));

    //     return redirect()->route('users-edit', $user->id)->with('success', 'User updated successfully');
    // }

    public function edit(Request $request, User $user)
    {
        // dd($user);
        // $data = User::findOrFail($id);
        $data = $user;
        $branches = Branch::all();
        $roles = Role::all();

        return view('dashboard.pages.users-edit-page', compact('data', 'branches', 'roles'));
    }

    public function destroy(Request $request, User $user)
    {
        dd($user);
        // $user = User::findOrFail($id);
        // $user->delete();

        // return redirect()->route('users.index')->with('success', 'Record deleted successfully');
    }
}
