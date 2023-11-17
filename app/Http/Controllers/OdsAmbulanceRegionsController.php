<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceRegions;
use App\Services\Region\Contracts\RegionServiceInterface;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class OdsAmbulanceRegionsController extends Controller
{
    public function index(Request $request, RegionServiceInterface $service)
    {
        $filters = [
            'name' => $request->input('name'),
            'coato' => $request->input('coato'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];


        $data = $service->customFilter($filters);

        return view('dashboard.pages.region', compact('data'));
    }

    public function edit($id)
    {
        $region = OdsAmbulanceRegions::findOrFail($id);
        return view('dashboard.pages.region-edit-page', [
            'region' => $region
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.region-create-page');
    }

    public function store(Request $request)
    {
        $department = new OdsAmbulanceRegions();
        $department->name = $request->name;
        $department->coato = $request->coato;
        $department->save();

        return redirect()->route('region.index')->with('success', 'Отделение успешно создано');
    }

    public function update(Request $request, $id)
    {
        $department = OdsAmbulanceRegions::findOrFail($id);
        $department->name = $request->name;
        $department->coato = $request->coato;
        $department->save();

        return redirect()->route('region.index')->with('success', 'Отделение успешно обновлено');
    }

    public function destroy($id)
    {
        $department = OdsAmbulanceRegions::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
