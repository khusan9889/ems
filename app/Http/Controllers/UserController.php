<?php

namespace App\Http\Controllers;

use App\Models\Branch;
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
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $data = $userService->customFilter($filters);
        $branches = Branch::pluck('name', 'id'); // Get branch names with their IDs

        return view('dashboard.pages.users', compact('data', 'branches'));
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        $branches = User::all();

        return view('dashboard.pages.users-edit-page', compact('data', 'branches'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }
}
