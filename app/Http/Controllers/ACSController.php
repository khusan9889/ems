<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreACSRequest;
use App\Models\ACS;
use App\Services\Contracts\ACSServiceInterface;
use App\Traits\Crud;
use Illuminate\Http\Request;


class ACSController extends Controller
{
    public function index(Request $request)
    {
        $data = ACS::all();

        return view('acs.index', compact('data'));
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
        ACS::create($request->validated());

        return redirect()->back()->with('success', 'Record stored successfully');
    }
}

