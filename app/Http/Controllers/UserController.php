<?php

namespace App\Http\Controllers;

use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UserServiceInterface $userService)
    {
        $filters = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $data = $userService->customFilter($filters);

        return view('dashboard.pages.users', compact('data'));
    }
}
