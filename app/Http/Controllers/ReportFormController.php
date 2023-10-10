<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubFilialRequest;
use App\Http\Requests\UpdateSubFilialRequest;
use App\Http\Resources\SubFilialResource;
use App\Models\ActionsLog;
use App\Models\Branch;
use App\Models\Department;
use App\Models\FilialSubWeek;
use App\Models\SubFilial;
use App\Models\Week;
use App\Services\SubFilial\Contracts\SubFilialServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReportFormController extends Controller
{
    use ApiResponse;

    public $modelClass = FilialSubWeek::class;

    public function index(Request $request, SubFilialServiceInterface $service)
    {

        $filters = [
            'week' => $request->input('week'),
            'branch' => $request->input('branch'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];


        $branches = Branch::pluck('name', 'id');
        $weeks = Week::pluck('name', 'id');
        $data = $service->customFilter($filters);
        return view('dashboard.pages.report-form', compact('branches', 'data', 'weeks'));
    }

    public function create()
    {
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.report-form-create-page', compact('branches'));
    }

    public function store(StoreSubFilialRequest $request)
    {
        $flial = new SubFilial();
        $flial->name = $request->name;
        $flial->branch_id = $request->branch_id;
        $flial->save();

        return redirect()->route('sub.index')->with('success', 'Отделение успешно создано');

    }

    public function edit($id)
    {
        $data = SubFilial::findOrFail($id);
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.sub-edit-page', [
            'data' => $data,
            'department' => $data,
            'branches' => $branches
        ]);
    }

    public function show($id)
    {
        $result = new SubFilialResource($this->modelClass::findOrFail($id));
        return $this->success($result);
    }

    public function update(UpdateSubFilialRequest $request, $id, SubFilialServiceInterface $service)
    {
        $result = new SubFilialResource($service->update($id, $request));
        return redirect()->route('sub.index')->with('success', 'Суб филиал успешно обновлено');
    }

}
