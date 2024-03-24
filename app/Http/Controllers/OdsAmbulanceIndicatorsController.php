<?php

namespace App\Http\Controllers;

use App\Jobs\ImportExcelJob;
use App\Models\MedDataExcel;
use App\Models\OdsAmbulanceBrigades;
use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceHospitals;
use App\Models\OdsAmbulanceIndicators;
use App\Models\OdsAmbulanceReferences;
use App\Models\OdsAmbulanceRegions;
use App\Models\OdsAmbulanceSubstations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Validators\ValidationException;

class OdsAmbulanceIndicatorsController extends Controller
{
    public function index(Request $request)
    {
        $filters = [
            'substation_id' => $request->input('substation_id'),
            'brigade_id' => $request->input('brigade_id'),
            'call_result_id' => $request->input('call_result_id'),
            'call_region_coato' => $request->input('call_region_coato'),
            'call_district_coato' => $request->input('call_district_coato'),
            'call_received' => $request->input('call_received'),
            'confirm_status' => $request->input('confirm_status'),
            'end_date' => $request->input('end_date'),
            'start_date' => $request->input('start_date'),
            'sort' => $request->input('sort') ?? 'DESC',
        ];

        $query = OdsAmbulanceIndicators::with('call_type')
            ->with('substation')
            ->with('brigade')
            ->with('call_region')
            ->with('call_district')
            ->with('residence_region')
            ->with('residence_district')
            ->when(
                $filters['sort'],
                fn($query, $value) => $query->orderBy('id', $value)
            )
            ->when(
                $filters['substation_id'],
                fn($query, $value) => $query->where('substation_id', $filters['substation_id'])
            )->when(
                $filters['call_district_coato'],
                fn($query, $value) => $query->where('call_district_coato', $filters['call_district_coato'])
            )->when(
                $filters['call_region_coato'],
                fn($query, $value) => $query->where('call_region_coato', $filters['call_region_coato'])
            )->when(
                $filters['brigade_id'],
                fn($query, $value) => $query->where('brigade_id', $filters['brigade_id'])
            )->when(
                $filters['confirm_status'],
                fn($query, $value) => $query->where('confirm_status', $filters['confirm_status'])
            )->when(
                $filters['call_result_id'],
                fn($query, $value) => $query->where('call_result_id', $filters['call_result_id'])
            )->when(
                $filters['call_received'],
                fn($query, $value) => $query->whereDate('call_received', $filters['call_received'])
            )->when(
                $filters['end_date'],
                fn($query, $value) => $query->where('transfer_brigade', '<=', $filters['end_date'])
            )
            ->when(
                $filters['start_date'],
                fn($query, $value) => $query->where('transfer_brigade', '>=', $filters['start_date'])
            );
        $indicators = $query->paginate(10);
        $regions = OdsAmbulanceRegions::all();
        $districts = OdsAmbulanceDistricts::all();
        $substations = OdsAmbulanceSubstations::all();
        $call_types = OdsAmbulanceReferences::where('table_name', 'call_types')->get();
        $reasons = OdsAmbulanceReferences::where('table_name', 'reasons')->get();
        $call_results = OdsAmbulanceReferences::where('table_name', 'call_results')->get();
        $hospitalization_results = OdsAmbulanceReferences::where('table_name', 'hospitalization_results')->get();
        $called_persons = OdsAmbulanceReferences::where('table_name', 'called_persons')->get();
        $call_places = OdsAmbulanceReferences::where('table_name', 'call_places')->get();
        $brigades = OdsAmbulanceBrigades::all();
        $hospitals = OdsAmbulanceHospitals::all();
        return view('dashboard.pages.indicator',
            compact('indicators', 'substations', 'call_types',
                'brigades', 'reasons', 'call_results', 'hospitals', 'hospitalization_results',
                'called_persons', 'call_places', 'regions', 'districts'));
    }

    public function edit($id)
    {
        $indicator = OdsAmbulanceIndicators::findOrFail($id);
        if ($indicator->confirm_status == 1) {
            return back()->with(['not-allowed' => 'У вас нет доступа']);
        }

        $substations = OdsAmbulanceSubstations::all();
        $call_types = OdsAmbulanceReferences::where('table_name', 'call_types')->get();
        $reasons = OdsAmbulanceReferences::where('table_name', 'reasons')->get();
        $call_results = OdsAmbulanceReferences::where('table_name', 'call_results')->get();
        $hospitalization_results = OdsAmbulanceReferences::where('table_name', 'hospitalization_results')->get();
        $called_persons = OdsAmbulanceReferences::where('table_name', 'called_persons')->get();
        $call_places = OdsAmbulanceReferences::where('table_name', 'call_places')->get();
        $brigades = OdsAmbulanceBrigades::all();
        $hospitals = OdsAmbulanceHospitals::all();
        $regions = OdsAmbulanceRegions::all();
        $diagnoses = OdsAmbulanceReferences::where('table_name', 'diagnoses')->get();
        return view('dashboard.pages.indicator-edit-page',
            compact('indicator', 'substations', 'call_types', 'brigades',
                'reasons', 'call_results', 'hospitals', 'hospitalization_results',
                'called_persons', 'call_places', 'regions', 'diagnoses'));
    }

    public function create()
    {
        $regions = OdsAmbulanceRegions::all();
        $substations = OdsAmbulanceSubstations::all();
        $call_types = OdsAmbulanceReferences::where('table_name', 'call_types')->get();
        $reasons = OdsAmbulanceReferences::where('table_name', 'reasons')->get();
        $call_results = OdsAmbulanceReferences::where('table_name', 'call_results')->get();
        $hospitalization_results = OdsAmbulanceReferences::where('table_name', 'hospitalization_results')->get();
        $called_persons = OdsAmbulanceReferences::where('table_name', 'called_persons')->get();
        $call_places = OdsAmbulanceReferences::where('table_name', 'call_places')->get();
        $brigades = OdsAmbulanceBrigades::all();
        $hospitals = OdsAmbulanceHospitals::all();
        $diagnoses = OdsAmbulanceReferences::where('table_name', 'diagnoses')->get();
        return view('dashboard.pages.indicator-create-page',
            compact('substations', 'call_types', 'brigades',
                'reasons', 'call_results', 'hospitals', 'hospitalization_results',
                'called_persons', 'call_places', 'regions', 'diagnoses'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $indicator = new OdsAmbulanceIndicators();
        $indicator->call_region_coato = $request->call_region_coato;
        $indicator->call_district_coato = $request->call_district_coato;
        $indicator->substation_id = $request->substation_id;
        $indicator->filling_call_card = $request->filling_call_card;
        $indicator->call_type_id = $request->call_type_id;
        $indicator->card_number = $request->card_number;
        $indicator->call_received = $request->call_received;
        $indicator->call_reception = $request->call_reception;
        $indicator->beginning_formation_ct = $request->beginning_formation_ct;
        $indicator->completion_formation_ct = $request->completion_formation_ct;
        $indicator->transfer_brigade = $request->transfer_brigade;
        $indicator->brigade_departure = $request->brigade_departure;
        $indicator->arrival_brigade_place = $request->arrival_brigade_place;
        $indicator->transportation_start = $request->transportation_start;
        $indicator->arrival_medical_center = $request->arrival_medical_center;
        $indicator->call_end = $request->call_end;
        $indicator->return_substation = $request->return_substation;
        $indicator->brigade_id = $request->brigade_id;
        $indicator->address = $request->address;
        $indicator->reason_id = $request->reason_id;
        $indicator->gender = $request->gender;
        $indicator->age = $request->age;
        $indicator->residence_region_coato = $request->residence_region_coato;
        $indicator->residence_district_coato = $request->residence_district_coato;
        $indicator->diagnos = $request->diagnos;
        $indicator->call_result_id = $request->call_result_id;
        $indicator->hospital_id = $request->hospital_id;
        $indicator->hospitalization_result_id = $request->hospitalization_result_id;
        $indicator->called_person_id = $request->called_person_id;
        $indicator->call_place_id = $request->call_place_id;
        $indicator->confirm_status = $request->confirm_status;
        $indicator->travel_time = $request->travel_time;
        $indicator->brigade_call_time = $request->brigade_call_time;
        $indicator->diagnosis_id = $request->diagnosis_id;
        $indicator->save();

        return redirect()->route('indicator.index')->with('success', 'Индикаторы успешно создано');
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $indicator = OdsAmbulanceIndicators::findOrFail($id);
        $indicator->call_region_coato = $request->call_region_coato;
        $indicator->call_district_coato = $request->call_district_coato;
        $indicator->substation_id = $request->substation_id;
        $indicator->filling_call_card = $request->filling_call_card;
        $indicator->call_type_id = $request->call_type_id;
        $indicator->card_number = $request->card_number;
        $indicator->call_received = $request->call_received;
        $indicator->call_reception = $request->call_reception;
        $indicator->beginning_formation_ct = $request->beginning_formation_ct;
        $indicator->completion_formation_ct = $request->completion_formation_ct;
        $indicator->transfer_brigade = $request->transfer_brigade;
        $indicator->brigade_departure = $request->brigade_departure;
        $indicator->arrival_brigade_place = $request->arrival_brigade_place;
        $indicator->transportation_start = $request->transportation_start;
        $indicator->arrival_medical_center = $request->arrival_medical_center;
        $indicator->call_end = $request->call_end;
        $indicator->return_substation = $request->return_substation;
        $indicator->brigade_id = $request->brigade_id;
        $indicator->address = $request->address;
        $indicator->reason_id = $request->reason_id;
        $indicator->gender = $request->gender;
        $indicator->age = $request->age;
        $indicator->residence_region_coato = $request->residence_region_coato;
        $indicator->residence_district_coato = $request->residence_district_coato;
        $indicator->diagnos = $request->diagnos;
        $indicator->call_result_id = $request->call_result_id;
        $indicator->hospital_id = $request->hospital_id;
        $indicator->hospitalization_result_id = $request->hospitalization_result_id;
        $indicator->called_person_id = $request->called_person_id;
        $indicator->call_place_id = $request->call_place_id;
        $indicator->confirm_status = $request->confirm_status;
        $indicator->travel_time = $request->travel_time;
        $indicator->brigade_call_time = $request->brigade_call_time;
        $indicator->diagnosis_id = $request->diagnosis_id;
        $indicator->save();
        return redirect()->route('indicator.index')->with('success', 'Индикаторы успешно обновлено');
    }

    public function destroy($id)
    {
        $brigade = OdsAmbulanceIndicators::findOrFail($id);
        $brigade->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }

    public function importExcel(Request $request)
    {
        dd($request->all());


        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'import_file' => 'required',
            'region_coato' => 'required'
        ]);


        $results = OdsAmbulanceIndicators::whereBetween('call_received', [$request->start_date, $request->end_date])->where('call_region_coato', $request->region_coato)->count();
        if ($results == 0) {
            if ($file = $request->file("import_file")) {
                try {
                    $med_data = new MedDataExcel();
                    $med_data->file = uploadFilePublic($file, 'med_excels');
                    $med_data->start_date = $request->start_date;
                    $med_data->end_date = $request->end_date;
                    $med_data->region_coato = $request->region_coato;
                    $med_data->sanction = 0;
                    $med_data->save();
                    ImportExcelJob::dispatch($med_data->id, $request->region_coato, public_path($med_data->file), $request->start_date, $request->end_date);
                    Session::flash('success', 'Маълумотлар текширувга юборилди! Тез орада маълумотлар юкланади.');
                    return back();
                } catch (ValidationException $e) {

                    $failures = $e->failures();
                    $errors = [];
                    $counter = 0;
                    foreach ($failures as $failure) {
                        $errors[] = $failure->errors()[0];
                        $counter++;
                        if ($counter == 5) {
                            break;
                        }
                    }
                    Session::flash('validation-errors', $errors);
                    return back();
                }
            }
        } else {

            Session::flash('not-allowed', 'Маълумотлар танланган вақт оралиғида яратилган!');
            return back();
        }
    }

    public function exportExcel(Request $request)
    {
        return response()->download("shablon.xlsx");
    }

    public function index_file(Request $request)
    {

        $filters = [
            'call_region_coato' => $request->input('call_region_coato'),
            'end_date' => $request->input('end_date'),
            'start_date' => $request->input('start_date'),
            'sanction' => $request->input('sanction')
        ];

        $indicators = MedDataExcel::with('region')
            ->withCount('indicators')
            ->when(
                $filters['call_region_coato'],
                fn($query, $value) => $query->where('region_coato', $filters['call_region_coato'])
            )
            ->when(
                $filters['sanction'],
                fn($query, $value) => $query->where('sanction', $filters['sanction']==3?0:$filters['sanction'])
            )
            ->when(
                $filters['end_date'],
                fn($query, $value) => $query->where('end_date', '<=', $filters['end_date'])
            )
            ->when(
                $filters['start_date'],
                fn($query, $value) => $query->where('start_date', '>=', $filters['start_date'])
            )
            ->paginate(15);
        $regions = OdsAmbulanceRegions::all();

        return view('dashboard.pages.indicator-file', compact('indicators', 'regions'));
    }

    public function delete_files($id)
    {
        $med_data = MedDataExcel::findOrFail($id);
        OdsAmbulanceIndicators::where('excel_id', $med_data->id)->delete();
        $med_data->delete();

        return redirect()->back()->with('success', 'Запись успешно удалена');
    }
}
