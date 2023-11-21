<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceHospitals;
use App\Http\Requests\StoreOdsAmbulanceHospitalsRequest;
use App\Http\Requests\UpdateOdsAmbulanceHospitalsRequest;
use App\Models\OdsAmbulanceRegions;
use App\Models\OdsAmbulanceSubstations;
use Illuminate\Http\Request;

class OdsAmbulanceHospitalsController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'name' => $request->input('name'),
            'region_coato' => $request->input('region_coato'),
            'district_coato' => $request->input('district_coato'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $query = OdsAmbulanceHospitals::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            ) ->when(
                $filters['region_coato'],
                fn($query, $value) => $query->where('region_coato', $filters['region_coato'] )
            )
            ->when(
                $filters['district_coato'],
                fn($query, $value) => $query->where('district_coato', $filters['district_coato'])
            );
        $hospitals = $query->paginate(10);
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();

        return view('dashboard.pages.hospital', compact( 'hospitals','regions','districts'));
    }

    public function edit($id)
    {
        $hospital = OdsAmbulanceHospitals::findOrFail($id);
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();
        return view('dashboard.pages.hospital-edit-page', [
            'hospital' => $hospital,
            'regions'=>$regions,
            'districts'=>$districts
        ]);
    }

    public function create()
    {
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();
        return view('dashboard.pages.hospital-create-page',compact('regions','districts'));
    }

    public function store(Request $request)
    {
        $hospital = new OdsAmbulanceHospitals();
        $hospital->name = $request->name;
        $hospital->region_coato = $request->region_coato;
        $hospital->district_coato = $request->district_coato;
        $hospital->save();

        return redirect()->route('hospital.index')->with('success', 'Место госпитализации успешно создано');
    }

    public function update(Request $request, $id)
    {
        $hospital = OdsAmbulanceHospitals::findOrFail($id);
        $hospital->name = $request->name;
        $hospital->region_coato = $request->region_coato;
        $hospital->district_coato = $request->district_coato;
        $hospital->save();

        return redirect()->route('hospital.index')->with('success', 'Место госпитализации успешно обновлено');
    }

    public function destroy($id)
    {
        $hospital = OdsAmbulanceHospitals::findOrFail($id);
        $hospital->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
