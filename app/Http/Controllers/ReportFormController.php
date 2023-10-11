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
use App\Services\FilialSubWeek\Contracts\FilialSubWeekServiceInterface;
use App\Services\SubFilial\Contracts\SubFilialServiceInterface;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ReportFormController extends Controller
{
    use ApiResponse;

    public $modelClass = FilialSubWeek::class;

    public function index(Request $request, FilialSubWeekServiceInterface $service)
    {

        $filters = [
            'week' => $request->input('week'),
            'branch' => $request->input('branch'),
            'status' => $request->input('status'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];


        $branches = Branch::pluck('name', 'id');
        $weeks = Week::pluck('name', 'id');
        $data = $service->customFilter($filters);
        return view('dashboard.pages.report-form', compact('branches', 'data', 'weeks'));
    }


    public function edit($id)
    {
        $week = FilialSubWeek::findOrFail($id);
        $filial_sub_weeks = FilialSubWeek::with(['week', 'branch', 'sub_filial'])->orderBy('id', 'ASC')->where('branch_id', $week->branch_id)->where('week_id', $week->week_id)->whereNotNull('sub_filial_id')->get();
        return view('dashboard.pages.report-form-create-page', compact('filial_sub_weeks', 'week'));
    }

    public function show($id)
    {
        $result = new SubFilialResource($this->modelClass::findOrFail($id));
        return $this->success($result);
    }

    public function update(Request $request, $id)
    {

        FilialSubWeek::updateOrCreate(
            ['id' => $id],
            [
                'g_appeal' => $request->g_appeal_one,
                'g_sleeping' => $request->g_sleeping_one,
                'g_ambulator' => $request->g_ambulator_one,
                'y_appeal' => $request->y_appeal_one,
                'y_sleeping' => $request->y_sleeping_one,
                'y_ambulator' => $request->y_ambulator_one,
                'r_appeal' => $request->r_appeal_one,
                'r_sleeping' => $request->r_sleeping_one,
                'r_death' => $request->r_death_one,
                'r_dead' => $request->r_dead_one,
                'ambulance_03' => $request->ambulance_03,
                'children_03' => $request->children_03,
                'arrived_himself' => $request->arrived_himself,
                'children_arrived_himself' => $request->children_arrived_himself,
                'came_ticket' => $request->came_ticket,
                'children_came_ticket' => $request->children_came_ticket,
                'recumbent' => $request->recumbent,
                'children_recumbent' => $request->children_recumbent,
                'operation' => $request->operation,
                'children_operation' => $request->children_operation,
                'high_tech_operas' => $request->high_tech_operas,
                'children_high_tech_operas' => $request->children_high_tech_operas,
                'death' => $request->death,
                'children_death' => $request->children_death,
                'ambulator' => $request->ambulator,
                'children_ambulator' => $request->children_ambulator,
                'ambulatory_operas' => $request->ambulatory_operas,
                'including_children' => $request->including_children,
                'status' => 'Измененный'
            ]
        );
        if($request->g_appeal!=null)
        foreach ($request->g_appeal as $key => $value) {
            FilialSubWeek::updateOrCreate(
                ['id' => $key],
                [
                    'g_appeal' => $request->g_appeal[$key],
                    'g_sleeping' => $request->g_sleeping[$key],
                    'g_ambulator' => $request->g_ambulator[$key],
                    'y_appeal' => $request->y_appeal[$key],
                    'y_sleeping' => $request->y_sleeping[$key],
                    'y_ambulator' => $request->y_ambulator[$key],
                    'r_appeal' => $request->r_appeal[$key],
                    'r_sleeping' => $request->r_sleeping[$key],
                    'r_death' => $request->r_death[$key],
                    'r_dead' => $request->r_dead[$key]
                ]
            );
        }


        return redirect()->route('form.index')->with('success', 'Суб филиал успешно обновлено');
    }

}
