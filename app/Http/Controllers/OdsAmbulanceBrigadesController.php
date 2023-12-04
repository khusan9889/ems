<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceBrigades;
use App\Http\Requests\StoreOdsAmbulanceBrigadesRequest;
use App\Http\Requests\UpdateOdsAmbulanceBrigadesRequest;
use App\Models\OdsAmbulanceSubstations;
use Illuminate\Http\Request;

class OdsAmbulanceBrigadesController extends Controller
{

    public function index(Request $request)
    {
        $filters = [
            'name' => $request->input('name'),
            'brigade_number' => $request->input('brigade_number'),
            'substation_id' => $request->input('substation_id'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $query = OdsAmbulanceBrigades::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['substation_id'],
                fn($query, $value) => $query->where('substation_id', $filters['substation_id'])
            ) ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            );
        $brigades = $query->paginate(10);
        $substations=OdsAmbulanceSubstations::all();

        return view('dashboard.pages.brigade', compact( 'brigades','substations'));
    }

    public function edit($id)
    {
        $substations=OdsAmbulanceSubstations::all();
        $brigade = OdsAmbulanceBrigades::findOrFail($id);
        return view('dashboard.pages.brigade-edit-page', [
            'brigade' => $brigade,
            'substations'=>$substations
        ]);
    }

    public function create()
    {
        $substations=OdsAmbulanceSubstations::all();
        return view('dashboard.pages.brigade-create-page',compact('substations'));
    }

    public function store(Request $request)
    {
        $brigade = new OdsAmbulanceBrigades();
        $brigade->name = $request->name;
        $brigade->substation_id = $request->substation_id;
        $brigade->brigade_number = $request->brigade_number;
        $brigade->save();

        return redirect()->route('brigade.index')->with('success', 'бригады успешно создано');
    }

    public function update(Request $request, $id)
    {
        $brigade = OdsAmbulanceBrigades::findOrFail($id);
        $brigade->name = $request->name;
        $brigade->brigade_number = $request->brigade_number;
        $brigade->substation_id = $request->substation_id;
        $brigade->save();

        return redirect()->route('brigade.index')->with('success', 'бригады успешно обновлено');
    }

    public function destroy($id)
    {
        $brigade = OdsAmbulanceBrigades::findOrFail($id);
        $brigade->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
