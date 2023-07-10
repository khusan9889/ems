<?php

namespace App\Http\Controllers;

use App\Models\ActionsLog;
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

        $userBranchId = auth()->user()->branch_id;

        if ($userBranchId !== 1) {
            $filters['branch'] = $userBranchId;
        }

        $departments = Department::all(['id', 'name']);
        $branches = Branch::pluck('name', 'id');
        $data = $service->customFilter($filters);

        return view('dashboard.pages.departments', compact('departments', 'branches', 'data'));
    }

    public function edit($id)
    {
        $data = Department::findOrFail($id);
        $branches = Branch::all();

        $activity = new ActionsLog();
        $activity->name = 'Отделение изменено: ' . $data->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.department-edit-page', [
            'data' => $data,
            'department' => $data,
            'branches' => $branches
        ]);
    }

    public function create()
    {
        $userBranchId = auth()->user()->branch_id;
        if ($userBranchId === 1) {
            $branches = Branch::all(['id', 'name']);
        } else {
            $branches = Branch::where('id', $userBranchId)->get(['id', 'name']);
        }

        // Log the creation activity
        $activity = new ActionsLog();
        $activity->name = 'Отделение создано'; // The text you want to save in the log
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.department-create-page', compact('branches'));
    }

    public function store(Request $request)
    {
        $department = new Department();
        $department->name = $request->name;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Отделение успешно создано');
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->branch_id = $request->branch_id;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Отделение успешно обновлено');
    }

    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        $activity = new ActionsLog();
        $activity->name = 'Отделение удалено: ' . $department->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
