<?php

namespace App\Imports;


use App\Models\OdsAmbulanceBrigades;
use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceHospitals;
use App\Models\OdsAmbulanceIndicators;
use App\Models\OdsAmbulanceReferences;
use App\Models\OdsAmbulanceRegions;
use App\Models\OdsAmbulanceSubstations;
use App\Rules\ExcelAgeRule;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Throwable;


class OdsAmbulanceIndicatorsImport implements ToCollection, SkipsOnError, WithHeadingRow,WithColumnFormatting,WithValidation,WithChunkReading
{
    public function collection(Collection $rows)
{
    foreach ($rows as $row)
    {
//        $district_call=OdsAmbulanceDistricts::findOrCreate($row['raion_vyzova'],$row['coato_raion_vyzova'],$row['oblast_vyzova'],$row['coato_oblast_vyzova']);
//        $region_residence=OdsAmbulanceRegions::findOrCreate($row['oblast_prozivaniia_pacienta'],$row['coato_oblast_prozivaniia_pacienta']);
//        $district_residence=OdsAmbulanceDistricts::findOrCreate($row['raion_prozivaniia_pacienta'],$row['coato_raion_prozivaniia_pacienta'],$row['oblast_prozivaniia_pacienta'],$row['coato_oblast_prozivaniia_pacienta']);

        if($row['vremia_priema']<$row['vr_nac_form_kt']){
            $d=date_create($row['data_priema']);
            date_modify($d,"-1 days");
        }
        else{
            $d=date_create($row['data_priema']);
        }

        $substation= OdsAmbulanceSubstations::findOrCreate($row['podstanciia'],$row['coato_oblast_vyzova']);
        $region_call=OdsAmbulanceRegions::findOrCreate($row['oblast_vyzova'],$row['coato_oblast_vyzova']);
        $type=OdsAmbulanceReferences::findOrCreate($row['tip_vyzova'],'call_types');
        $reason=OdsAmbulanceReferences::findOrCreate($row['povod'],'reasons');
        $call_result=OdsAmbulanceReferences::findOrCreate($row['rezultat_vyezda'],'call_results');
        $hospitalization_result=$row['rez_tat_gosp_cii']?OdsAmbulanceReferences::findOrCreate($row['rez_tat_gosp_cii'],'hospitalization_results'):null;
        $called_person=OdsAmbulanceReferences::findOrCreate($row['vyzvavsii'],'called_persons');
        $call_place=OdsAmbulanceReferences::findOrCreate($row['mesto_vyzova'],'call_places');
        $diagnosis=OdsAmbulanceReferences::findOrCreate($row['diagnoz'],'diagnoses');
        $hospital=OdsAmbulanceHospitals::findOrCreate($row['mesto_gospit'],$region_call);
        $brigade=OdsAmbulanceBrigades::findOrCreate($row['brigada'],$substation);

        OdsAmbulanceIndicators::create([
//            'residence_region_coato'=>$region_residence,
//            'residence_district_coato'=>$district_residence,
//            'call_district_coato' => $district_call,
//            'completion_formation_ct'=>Carbon::createFromTimestamp($row['vremia_zaverseniia_formirovaniia_kt']),
            'call_region_coato' => $region_call,
            'substation_id'=>$substation,
            'filling_call_card'=>$row['kv_zapolnena']=="Да"?1:0,
            'call_type_id'=>$type,
            'card_number'=>$row['pp'],
            'call_received'=>$row['data_priema'],
            'call_reception'=>date_format($d,"Y-m-d").' '.$row['vremia_priema'],
            'beginning_formation_ct'=>$row['data_priema'].' '.$row['vr_nac_form_kt'],
            'transfer_brigade'=>$row['peredaca_brigade'],
            'brigade_departure'=>$row['vremia_vyezda_br'],
            'arrival_brigade_place'=>$row['pribytie_na_vyz'],
            'transportation_start'=>$row['nacalo_transp_ki'],
            'arrival_medical_center'=>$row['prib_ie_v_medorg'],
            'call_end'=>$row['okoncanie_vyzova'],
            'return_substation'=>$row['vozvr_nie_na_pst'],
            'brigade_id'=>$brigade,
            'address'=>$row['adres'],
            'reason_id'=>$reason,
            'gender'=>$row['pol'],
            'age'=>explode(' ',$row['vozrast'])[0],
            'diagnos'=>$row['kod_mkb'],
            'call_result_id'=>$call_result,
            'hospital_id'=>$hospital,
            'hospitalization_result_id'=>$hospitalization_result,
            'called_person_id'=>$called_person,
            'call_place_id'=>$call_place,
            'brigade_call_time'=>$row['vr_doezda_na_vyz'],
            'travel_time'=>$row['vrna_prinvyzbr'],
            'diagnosis_id'=>$diagnosis,
        ]);
    }
}

    public function onError(Throwable $e)
    {
      // TODO: Implement onError() method.
    }
    public function chunkSize(): int
    {
        return 1000;
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'J' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'L' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'M' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'N' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'P' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'Q' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'S' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    public function  rules(): array
    {

        return [
            '*.coato_oblast_vyzova' => 'required|integer',
            '*.oblast_vyzova' => 'required',
            '*.peredaca_brigade' => 'required|date',
            '*.vremia_vyezda_br' => 'required|date',
            '*.pribytie_na_vyz' => 'required|date',
            '*.pp' => 'required|integer',
            '*.podstanciia' => 'required',
            '*.kv_zapolnena' => ['required',Rule::in(["да","нет"])],
            '*.tip_vyzova' => 'required|string',
            '*.data_priema' => 'required|date',
            '*.vremia_priema' => 'required',
            '*.vr_nac_form_kt' => 'required',
            '*.nacalo_transp_ki' => 'nullable',
            '*.prib_ie_v_medorg' => 'nullable',
            '*.okoncanie_vyzova' => 'required|date',
            '*.vozvr_nie_na_pst' => 'nullable',
            '*.brigada' => 'required',
            '*.adres' => 'nullable',
            '*.povod' => 'required',
            '*.pol' => 'required',
            '*.vozrast' => ['required',new ExcelAgeRule()],
            '*.diagnoz' => 'required|string',
            '*.rezultat_vyezda' => 'required',
            '*.mesto_gospit' => 'nullable',
            '*.rez_tat_gosp_cii' => 'nullable',
            '*.vyzvavsii' => 'required',
            '*.mesto_vyzova' => 'required',
            '*.vr_doezda_na_vyz' => 'required',
            '*.vrna_prinvyzbr' => 'required',
            '*.kod_mkb' => 'nullable',
        ];
    }
}
