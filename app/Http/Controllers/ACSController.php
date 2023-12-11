<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreACSRequest;
use App\Models\ACS;
use App\Models\ActionsLog;
use App\Models\Branch;
use App\Models\Department;
use App\Services\Contracts\ACSServiceInterface;
use Illuminate\Http\Request;


class ACSController extends Controller
{
    public function index(Request $request, ACSServiceInterface $acsService)
    {
        $filters = [
            'branch' => $request->input('branch'),
            'history_disease' => $request->input('history_disease'),
            'full_name' => $request->input('full_name'),
            'hospitalization_date' => $request->input('hospitalization_date'),
            'discharge_date' => $request->input('discharge_date'),
            'physician_full_name' => $request->input('physician_full_name'),
            'department' => $request->input('department'),
            'hospitalization_channels' => $request->input('hospitalization_channels'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $userBranchId = auth()->user()->branch_id;

        if ($userBranchId != 1) {
            $filters['branch'] = $userBranchId;
        }

        $hospitalization_channels = ACS::HOSPITALIZATION_CHANNELS;
        $data = $acsService->customFilter($filters);
        $branches = Branch::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');
        return view('dashboard.pages.home', compact('data', 'branches', 'hospitalization_channels', 'departments'));
    }

    public function destroy($id)
    {
        $acs = ACS::findOrFail($id);
        $acs->delete();
        //logs
        $activity = new ActionsLog();
        $activity->name = 'ОКС запись удалена: ' . $acs->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }

    public function fullform($id)
    {

        $data = ACS::findOrFail($id);
        return view('dashboard.pages.full-table', compact('data'));
    }

    public function store(StoreACSRequest $request)
    {
        $validatedData = $request->validated();
        $branchId = $validatedData['branch_id'] ?? null;

        $branch = Branch::find($branchId);

        if (!$branch) {

            return redirect()->back()->with('error', 'Selected branch does not exist.');
        }

        $validatedData['branch_id'] = $branch->id;

        ACS::create($validatedData);

        return redirect('/acs/list')->with('success', 'Запись успешно сохранена');
    }

    public function create()
    {
        $userBranchId = auth()->user()->branch_id;
        if ($userBranchId === 1) {
            $branches = Branch::all(['id', 'name']);
        } else {
            $branches = Branch::where('id', $userBranchId)->get(['id', 'name']);
        }
        $departments = Department::all(['id', 'name']);

        // Log the creation activity
        $activity = new ActionsLog();
        $activity->name = 'Таблица ОКС создана';
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.create-page', compact('branches', 'departments'));
    }

    public function edit($id)
    {
        $data = ACS::findOrFail($id);
        $branches = Branch::all();
        if ($data->confirm_status==1){
            return back()->with(['not-allowed' => 'У вас нет доступа']);
        }

        // Log the edit activity
        $activity = new ActionsLog();
        $activity->name = 'ОКС запись изменена: ' . $data->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.edit-page', compact('data', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $acs = ACS::findOrFail($id);
        $acs->update($request->all());
        return redirect('acs/list')->with('success', 'Запись успешно обновлена');
    }

    public function statistics(Request $request, ACSServiceInterface $service)
    {
        $data = $service->statistics($request);
        $branches = Branch::all(['id', 'name']);
        $a=collect([
            "id"=> 0,
            "name"=> "Все"
        ]);
        $branches->push($a);
        $branches=$branches->sortBy('id');
        return view('dashboard.pages.acs.statistics', compact('data', 'branches'));
    }

}
