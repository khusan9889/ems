<?php

namespace App\Http\Controllers;

use App\Models\OdsAmbulanceReferences;
use App\Http\Requests\StoreOdsAmbulanceReferencesRequest;
use App\Http\Requests\UpdateOdsAmbulanceReferencesRequest;
use Illuminate\Http\Request;

class OdsAmbulanceReferencesController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'item_id' => $request->input('item_id'),
            'name' => $request->input('name'),
            'table_name' => $request->input('table_name'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $query = OdsAmbulanceReferences::when(
            $filters['sort'],
            fn($query, $value) => $query->orderBy('id', $value)
        )
            ->when(
                $filters['item_id'],
                fn($query, $value) => $query->where('item_id', $filters['item_id'])
            )->when(
                $filters['table_name'],
                fn($query, $value) => $query->where('table_name', $filters['table_name'])
            ) ->when(
                $filters['name'],
                fn($query, $value) => $query->where('name', 'like', '%' . $filters['name'] . '%')
            );
        $references = $query->paginate(10);

        return view('dashboard.pages.reference', compact( 'references'));
    }

    public function edit($id)
    {
        $reference = OdsAmbulanceReferences::findOrFail($id);
        return view('dashboard.pages.reference-edit-page', [
            'reference' => $reference
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.reference-create-page');
    }

    public function store(Request $request)
    {
        $reference = new OdsAmbulanceReferences();
        $reference->item_id = $request->item_id;
        $reference->name = $request->name;
        $reference->table_name = $request->table_name;
        $reference->save();

        return redirect()->route('reference.index')->with('success', 'Справочник успешно создано');
    }

    public function update(Request $request, $id)
    {
        $reference = OdsAmbulanceReferences::findOrFail($id);
        $reference->name = $request->name;
        $reference->item_id = $request->item_id;
        $reference->table_name = $request->table_name;
        $reference->save();

        return redirect()->route('reference.index')->with('success', 'Справочник успешно обновлено');
    }

    public function destroy($id)
    {
        $brigade = OdsAmbulanceReferences::findOrFail($id);
        $brigade->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
