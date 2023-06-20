<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Services\Contracts\BranchServiceInterface;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request, BranchServiceInterface $branchService)
    {
        $filters = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'branch' => $request->input('branch'),
            'role' => $request->input('role'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $data = $branchService->customFilter($filters);
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.branch', compact('data', 'branches'));
    }

    public function fetchDepartments(Request $request)
    {
        // dd($request->all());
        $data = Department::when($request->branch_id, function ($query, $value) {
            $query->where('branch_id', $value);
        })->get();

        return response()->json($data);
    }
}
