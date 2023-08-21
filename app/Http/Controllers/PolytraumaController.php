<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolytraumaRequest;
use App\Models\ActionsLog;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Polytrauma;
use App\Services\Contracts\PolytraumaServiceInterface;
use App\Services\PolytraumaService;
use Illuminate\Http\Request;

class PolytraumaController extends Controller
{

    public $modelClass = Polytrauma::class;

    public function index(Request $request, PolytraumaServiceInterface $polytraumaService)
    {
        $filters = [
            'branch' => $request->input('branch'),
            'department' => $request->input('department'),
            'history_disease' => $request->input('history_disease'),
            'full_name' => $request->input('full_name'),
            'hospitalization_date' => $request->input('hospitalization_date'),
            'discharge_date' => $request->input('discharge_date'),
            'physician_full_name' => $request->input('physician_full_name'),
            'hospitalization_channels' => $request->input('hospitalization_channels'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $userBranchId = auth()->user()->branch_id;

        if ($userBranchId !== 1) {
            $filters['branch'] = $userBranchId;
        }

        $hospitalization_channels = Polytrauma::HOSPITALIZATION_CHANNELS;
        $data = $polytraumaService->customFilter($filters);
        $branches = Branch::pluck('name', 'id'); // Get branch names with their IDs
        $departments = Department::pluck('name', 'id');

        return view('dashboard.pages.home', compact('data', 'branches', 'departments', 'hospitalization_channels'));
    }

    public function fullTable($id)
    {
        $data = Polytrauma::findOrFail($id);
        return view('dashboard.pages.full-table-polyt', compact('data'));
    }

    public function destroy($id)
    {
        $polytrauma = Polytrauma::findOrFail($id);
        $polytrauma->delete();

        $activity = new ActionsLog();
        $activity->name = 'Политравма запись удалена: ' . $polytrauma->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }

    public function store(StorePolytraumaRequest $request)
    {
        $validatedData = $request->validated();
        $branchId = $validatedData['branch_id'] ?? null;

        $branch = Branch::find($branchId);

        if (!$branch) {
            return redirect()->back()->with('error', 'Selected branch does not exist.');
        }

        $validatedData['branch_id'] = $branch->id;

        Polytrauma::create($validatedData);

        return redirect('/polytrauma/list')->with('success', 'Запись успешно сохранена');
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
        $activity->name = 'Таблица Политравмы создана'; // The text you want to save in the log
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.polyt-create-page', compact('branches', 'departments'));
    }

    public function edit($id)
    {
        $data = Polytrauma::findOrFail($id);
        $branches = Branch::all();

        $activity = new ActionsLog();
        $activity->name = 'Политравма запись изменена: ' . $data->id;
        $activity->user_id = auth()->id();
        $activity->save();

        return view('dashboard.pages.polyt-edit-page', compact('data', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $polytrauma = Polytrauma::findOrFail($id);
        $polytrauma->update($request->all());

        return redirect('/polytrauma/list')->with('success', 'Запись успешно обновлена');
    }

    public function statistics(Request $request, PolytraumaServiceInterface $service)
    {
        $data = $service->statistics($request);
        $branches = Branch::all(['id', 'name']);
        return view('dashboard.pages.polytrauma.statistics', compact('data', 'branches'));
    }

    public function less16(Request $request, PolytraumaServiceInterface $service)
    {
        $data = $service->statistics($request, 16);
        return view('dashboard.pages.polytrauma.statistics', compact('data'));
    }

    public function more16(Request $request, PolytraumaServiceInterface $service)
    {
        $data = $service->statistics($request, 17); // Use 17 here to get data greater than 16
        return view('dashboard.pages.polytrauma.statistics', compact('data'));
    }

}
