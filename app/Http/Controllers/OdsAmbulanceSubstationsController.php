<?php

namespace App\Http\Controllers;

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

        $query = OdsAmbulanceSubstations::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            ) ->when(
                $filters['region_coato'],
                fn($query, $value) => $query->where('region_coato', 'like', '%' . $filters['region_coato'] . '%')
            )
            ->when(
                $filters['district_coato'],
                fn($query, $value) => $query->where('district_coato', 'like', '%' . $filters['district_coato'] . '%')
            );
        $substations = $query->paginate(10);

        return view('dashboard.pages.substation', compact( 'substations'));
    }

    public function edit($id)
    {
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        return view('dashboard.pages.substation-edit-page', [
            'substation' => $substation
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.substation-create-page');
    }

    public function store(Request $request)
    {
        $substation = new OdsAmbulanceSubstations();
        $substation->name = $request->name;
        $substation->region_coato = $request->region_coato;
        $substation->district_coato = $request->district_coato;
        $substation->save();

        return redirect()->route('substation.index')->with('success', 'Отделение успешно создано');
    }

    public function update(Request $request, $id)
    {
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        $substation->name = $request->name;
        $substation->region_coato = $request->region_coato;
        $substation->district_coato = $request->district_coato;
        $substation->save();

        return redirect()->route('substation.index')->with('success', 'Отделение успешно обновлено');
    }

    public function destroy($id)
    {
        $substation = OdsAmbulanceSubstations::findOrFail($id);
        $substation->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
