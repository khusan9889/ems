<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreACSRequest;
use App\Models\ACS;
use App\Models\Branch;
use App\Services\Contracts\ACSServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;


class ACSController extends Controller
{
    public function index(Request $request)
    {
        $data = ACS::paginate(10);
        $departments = Branch::all();
        return view('dashboard.pages.home', compact('data', 'departments'));
    }

    public function fullTable(Request $request)
    {
        $query = ACS::query();

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
        $acs = ACS::findOrFail($id);
        $acs->delete();

        return redirect()->back()->with('success', 'Record deleted successfully');
    }

    public function store(StoreACSRequest $request)
    {
        $validatedData = $request->validated();
        $department = Branch::findOrFail($validatedData['department']);
        $validatedData['department'] = $department->name;

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


