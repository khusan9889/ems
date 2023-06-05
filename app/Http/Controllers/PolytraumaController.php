<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolytraumaRequest;
use App\Models\Branch;
use App\Models\Polytrauma;
use App\Traits\Crud;
use Illuminate\Http\Request;

class PolytraumaController extends Controller
{
    use Crud;

    public $modelClass = Polytrauma::class;

    public function index(Request $request)
    {
        $data = Polytrauma::all();
        return view('polytrauma.index', compact('data'));
    }

    public function fullTable(Request $request)
    {
        $query = Polytrauma::query();

        // Filter by department
        if ($request->has('department')) {
            $department = $request->input('department');
            $query->where('department', $department);
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
        $acs = Polytrauma::findOrFail($id);
        $acs->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function store(StorePolytraumaRequest $request)
    {
        $validatedData = $request->validated();
        $department = Branch::findOrFail($validatedData['department']);
        $validatedData['department'] = $department->name;

        Polytrauma::create($validatedData);

        return redirect()->back()->with('success', 'Record stored successfully');
    }

}
