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

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        $branches = Branch::all();

        return view('dashboard.pages.department-edit-page', [
            'department' => $data,
            'branches' => $branches
        ]);
    }

    public function update(Request $request, $id)
    {
        $polytrauma = Department::findOrFail($id);
        $polytrauma->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Record updated successfully');
    }

}
