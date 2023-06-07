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
        $data = Polytrauma::paginate(10);
        $departments = Branch::all();
        return view('dashboard.pages.home', compact('data', 'departments'));
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
        $department = Branch::findOrFail($validatedData['department']);
        $validatedData['department'] = $department->name;

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
