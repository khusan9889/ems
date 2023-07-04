<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Services\Contracts\DepartmentServiceInterface;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request, DepartmentServiceInterface $service)
    {
        $filters = [
            'name' => $request->input('name'),
            'branch' => $request->input('branch'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $departments = Department::all(['id', 'name']);
        $branches = Branch::all(['id', 'name']);
        $data = $service->customFilter($filters);

        return view('dashboard.pages.departments', compact('departments', 'branches', 'data'));
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        $branches = Branch::all();

        return view('dashboard.pages.department-edit-page', [
            'data' => $data,
            'department' => $data,
            'branches' => $branches
        ]);
    }

    public function create()
    {
        $branches = Branch::all();

        return view('dashboard.pages.department-create-page', compact('branches'));
    }

    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }
}
