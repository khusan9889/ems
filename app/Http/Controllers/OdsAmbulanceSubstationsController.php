<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceRegions;
use App\Models\OdsAmbulanceSubstations;
use App\Http\Requests\StoreOdsAmbulanceSubstationsRequest;
use App\Http\Requests\UpdateOdsAmbulanceSubstationsRequest;
use Illuminate\Http\Request;

class OdsAmbulanceSubstationsController extends Controller
{

    public function index(Request $request)
    {

        $filters = [
            'name' => $request->input('name'),
            'region_coato' => $request->input('region_coato'),
            'district_coato' => $request->input('district_coato'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $query = OdsAmbulanceSubstations::with('region')->with('district')->when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            ) ->when(
                $filters['region_coato'],
                fn($query, $value) => $query->where('region_coato', $filters['region_coato'])
            )
            ->when(
                $filters['district_coato'],
                fn($query, $value) => $query->where('district_coato', $filters['district_coato'])
            );
        $substations = $query->paginate(10);
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();
        return view('dashboard.pages.substation', compact( 'substations','regions','districts'));
    }

    public function edit($id)
    {
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();
        return view('dashboard.pages.substation-edit-page', [
            'substation' => $substation,
            'regions'=>$regions,
            'districts'=>$districts
        ]);
    }

    public function create()
    {
        $regions=OdsAmbulanceRegions::all();
        $districts=OdsAmbulanceDistricts::all();
        return view('dashboard.pages.substation-create-page',compact('districts','regions'));
    }

    public function store(Request $request)
    {
        $substation = new OdsAmbulanceSubstations();
        $substation->name = $request->name;
        $substation->region_coato = $request->region_coato;
        $substation->district_coato = $request->district_coato;
        $substation->save();

        return redirect()->route('substation.index')->with('success', 'Подстанция успешно создано');
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        $substation->name = $request->name;
        $substation->region_coato = $request->region_coato;
        $substation->district_coato = $request->district_coato;
        $substation->save();

        return redirect()->route('substation.index')->with('success', 'Подстанция успешно обновлено');
    }

    public function destroy($id)
    {
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        $substation->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
