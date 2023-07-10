<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.branch', compact('branches'));
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
