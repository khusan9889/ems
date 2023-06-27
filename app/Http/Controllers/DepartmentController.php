<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all(['id', 'name']);
        $branches = Branch::all(['id', 'name']);
        $data = Department::when($request->department, function ($query, $value) {
            $query->where('department', $value);
        })
        ->when($request->branch, function ($query, $value) {
            $query->where('branch', $value);
        })
        ->orderBy('id', $request->sort ?? 'ASC')
        ->get();

        return view('dashboard.pages.departments', compact('departments', 'branches', 'data'));
    }
    
}
