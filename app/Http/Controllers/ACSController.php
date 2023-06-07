<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreACSRequest;
use App\Models\ACS;
use App\Models\Branch;
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
            'discharge_date' => $request->input('discharge_date')
            // Add more filters for other columns if needed
        ];

        $data = $acsService->customFilter($filters);
        $branches = Branch::pluck('name', 'id'); // Get branch names with their IDs

        return view('dashboard.pages.home', compact('data', 'branches'));
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
        $branch = Branch::findOrFail($validatedData['branch']);
        $validatedData['branch'] = $branch->name;

        ACS::create($validatedData);

        return redirect()->back()->with('success', 'Record stored successfully');
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

        return redirect('/')->with('success', 'Record updated successfully');
    }

}


