<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceRegions;
use App\Services\District\Contracts\DistrictServiceInterface;
use Illuminate\Http\Request;

class OdsAmbulanceDistrictsController extends Controller
{
    public function index(Request $request, DistrictServiceInterface $service)
    {
        $filters = [
            'name' => $request->input('name'),
            'coato' => $request->input('coato'),
            'region_id' => $request->input('region_id'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];


        $data = $service->customFilter($filters);
        $regions = OdsAmbulanceRegions::all(['id', 'name']);

        return view('dashboard.pages.district', compact('data', 'regions'));
    }

    public function edit($id)
    {
        $district = OdsAmbulanceDistricts::findOrFail($id);
        $regions =OdsAmbulanceRegions::all();
        return view('dashboard.pages.district-edit-page', [
            'district' => $district,
            'regions'=>$regions
        ]);
    }

    public function create()
    {
        $regions = OdsAmbulanceRegions::all();
        return view('dashboard.pages.district-create-page', compact('regions'));
    }

    public function store(Request $request)
    {
        $department = new OdsAmbulanceDistricts();
        $department->name = $request->name;
        $department->coato = $request->coato;
        $department->region_id = $request->region_id;
        $department->save();

        return redirect()->route('district.index')->with('success', 'Отделение успешно создано');
    }

    public function update(Request $request, $id)
    {
        $department = OdsAmbulanceDistricts::findOrFail($id);
        $department->name = $request->name;
        $department->coato = $request->coato;
        $department->region_id = $request->region_id;
        $department->save();

        return redirect()->route('district.index')->with('success', 'Отделение успешно обновлено');
    }

    public function destroy($id)
    {
        $department = OdsAmbulanceDistricts::findOrFail($id);
        $department->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
