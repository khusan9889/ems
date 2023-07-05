<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreACSRequest;
use App\Models\ACS;
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

        $hospitalization_channels = ACS::HOSPITALIZATION_CHANNELS;

        $data = $acsService->customFilter($filters);
        $branches = Branch::pluck('name', 'id');
        $departments = Department::pluck('name', 'id');

        return view('dashboard.pages.home', compact('data', 'branches', 'hospitalization_channels', 'departments'));
    }

    public function fullTable(Request $request)
    {
        $query = ACS::query();

        // Filter by department
        if ($request->has('branch')) {
            $branch = $request->input('branch');
            $query->where('branch', $branch);
        }

        // Search by full name
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('full_name', 'like', "%$search%");
        }

        $data = $query->get();

        return view('acs.full-table', compact('data'));
    }

    public function destroy($id)
    {
        $acs = ACS::findOrFail($id);
        $acs->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
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

        return redirect('/acs/list')->with('success', 'Record updated successfully');
    }

    public function edit($id)
    {
        $data = ACS::findOrFail($id);
        $branches = Branch::all();

        return view('dashboard.pages.edit-page', compact('data', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $acs = ACS::findOrFail($id);
        $acs->update($request->all());
        return redirect('acs/list')->with('success', 'Record updated successfully');
    }

    public function statistics(Request $request, ACSServiceInterface $service)
    {
        $data = $service->statistics($request);
        return view('dashboard.pages.acs.statistics', compact('data'));
    }
}


// $userBranchId = auth()->user()->branch_id;

//         // Retrieve the branches based on user's branch ID
//         if ($userBranchId == 1 || $userBranchId == null) {
//             $branches = Branch::pluck('name', 'id');
//         } else {
//             $branches = Branch::where('id', $userBranchId)->pluck('name', 'id');
//         }
