<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolytraumaRequest;
use App\Models\Branch;
use App\Models\Polytrauma;
use App\Services\Contracts\PolytraumaServiceInterface;
use Illuminate\Http\Request;

class PolytraumaController extends Controller
{

    public $modelClass = Polytrauma::class;

    public function index(Request $request, PolytraumaServiceInterface $polytraumaService)
    {
        $filters = [
            'branch' => $request->input('branch'),
            'history_disease' => $request->input('history_disease'),
            'full_name' => $request->input('full_name'),
            'hospitalization_date' => $request->input('hospitalization_date'),
            'discharge_date' => $request->input('discharge_date'),
            'physician_full_name' => $request->input('physician_full_name'),
            'stat_department_full_name' => $request->input('stat_department_full_name'),
            'hospitalization_channels' => $request->input('hospitalization_channels'), // Add this line
        ];

        $hospitalization_channels = Polytrauma::HOSPITALIZATION_CHANNELS;

        $query = Polytrauma::query(); // Define the $query variable here

        // Filter by hospitalization channels
        if ($request->has('hospitalization_channels')) {
            $hospitalizationChannels = $request->input('hospitalization_channels');
            if ($hospitalizationChannels !== '') {
                $query->where('hospitalization_channels', $hospitalizationChannels);
            }
        }

        $data = $polytraumaService->customFilter($filters);
        $branches = Branch::pluck('name', 'id'); // Get branch names with their IDs

        return view('dashboard.pages.home', compact('data', 'branches', 'hospitalization_channels'));
    }

    public function fullTable(Request $request)
    {
        $query = Polytrauma::query();

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

        return view('polytrauma.full-table', compact('data'));
    }

    public function destroy($id)
    {
        $polytrauma = Polytrauma::findOrFail($id);
        $polytrauma->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function store(StorePolytraumaRequest $request)
    {
        $validatedData = $request->validated();

        // Get the selected branch's ID from the form data
        $branchId = $validatedData['branch_id'] ?? null;

        // Find the corresponding branch record
        $branch = Branch::find($branchId);

        if (!$branch) {
            // Branch does not exist in the database
            // You can handle this situation based on your requirements, such as throwing an exception or returning an error message
            return redirect()->back()->with('error', 'Selected branch does not exist.');
        }

        // Set the branch ID in the data array before creating the record
        $validatedData['branch_id'] = $branch->id;

        // Create the ACS record
        Polytrauma::create($validatedData);

        return redirect()->back()->with('success', 'Record stored successfully');
    }

    public function edit($id)
    {
        $data = Polytrauma::findOrFail($id);
        $branches = Branch::all();

        return view('dashboard.pages.polyt-edit-page', compact('data', 'branches'));
    }

    public function update(Request $request, $id)
    {
        $polytrauma = Polytrauma::findOrFail($id);
        $polytrauma->update($request->all());

        return redirect('/polytrauma')->with('success', 'Record updated successfully');
    }
}
