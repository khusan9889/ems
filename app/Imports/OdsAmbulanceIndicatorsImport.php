<?php

namespace App\Imports;


use App\Jobs\OdsAmbulanceIndicatorJob;
use App\Models\OdsAmbulanceIndicators;
use App\Models\OdsAmbulanceReferences;
use App\Models\OdsAmbulanceSubstations;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Carbon\Carbon;
use Throwable;


class OdsAmbulanceIndicatorsImport implements ToCollection, SkipsOnError, WithHeadingRow,WithColumnFormatting,WithValidation
{
    public function collection(Collection $rows)
{
    foreach ($rows as $row)
    {

//        dd(Carbon::createFromTimestamp($row['data_priema_vyzova']));
        $substation= OdsAmbulanceSubstations::findOrCreate($row['podstanciia_priniatiia_vyzova'],$row['coato_oblast_vyzova'],$row['coato_raion_vyzova']);
        $type=OdsAmbulanceReferences::findOrCreate($row['tip_vyzova']);
        OdsAmbulanceIndicators::create([
            'call_region_coato' => $row['coato_oblast_vyzova'],
            'call_district_coato' => $row['raion_vyzova'],
            'substation_id'=>$substation,
            'filling_call_card'=>$row['zapolnenie_karty_vyzova_kv'],
            'call_type_id'=>$type,
            'card_number'=>$row['nomer_kv'],
            'call_received'=>Carbon::createFromTimestamp($row['data_priema_vyzova']),
            'call_reception'=>Carbon::createFromTimestamp($row['vremia_priema_vyzova']),
            'beginning_formation_ct'=>Carbon::createFromTimestamp($row['vremia_nacaly_formirovaniia_kartocki_transportirovki_kt']),
            'completion_formation_ct'=>Carbon::createFromTimestamp($row['vremia_zaverseniia_formirovaniia_kt']),
            'transfer_brigade'=>Carbon::createFromTimestamp($row['vremia_peredaci_vyzova_brigade']),
            'brigade_departure'=>Carbon::createFromTimestamp($row['vremia_vyezda_brigady']),
            'arrival_brigade_place'=>Carbon::createFromTimestamp($row['pribytie_brigady_na_mesto_vyzova']),
            'transportation_start'=>Carbon::createFromTimestamp($row['vremia_nacaly_transportirovki']),
            'arrival_medical_center'=>Carbon::createFromTimestamp($row['vremia_pribytiia_na_med_ucrezdenie']),
            'call_end'=>Carbon::createFromTimestamp($row['vremia_zaverseniia_vyzova']),
            'return_substation'=>Carbon::createFromTimestamp($row['vremia_vozvraseniia_na_podstanciiu']),
            'brigade_id'=>$row['nazvanie_brigady'],
            'address'=>$row['podrobnyi_adres_vyzova'],
            'reason_id'=>2,
            'gender'=>$row['pricina_vyzova'],
            'age'=>4,
            'residence_region_coato'=>'rt',
            'residence_district_coato'=>'tr',
            'diagnos'=>46,
            'call_result_id'=>45,
            'hospital_id'=>45,
            'hospitalization_result_id'=>45,
            'called_person_id'=>45,
            'call_place_id'=>45,
        ]);
    }
}

    public function onError(Throwable $e)
    {
      // TODO: Implement onError() method.
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
            'branch_id' => 'required',
            'podstanciia_priniatiia_vyzova' => 'required',
            'coato_oblast_vyzova' => 'required|integer',
            'coato_raion_vyzova' => 'required',
            'tip_vyzova' => 'required|integer',
            'raion_vyzova' => 'required|integer',
            'zapolnenie_karty_vyzova_kv' => 'required',
            'nomer_kv' => 'required|integer',
            'data_priema_vyzova' => 'required|integer',
            'vremia_priema_vyzova' => 'required|numeric',
            'vremia_nacaly_formirovaniia_kartocki_transportirovki_kt' => 'required|date_format:Y',
            'vremia_zaverseniia_formirovaniia_kt' => 'required',
            'vremia_peredaci_vyzova_brigade' => 'required|integer',
            'vremia_vyezda_brigady' => 'required',
            'pribytie_brigady_na_mesto_vyzova' => 'required|integer',
            'vremia_nacaly_transportirovki' => 'required',
            'vremia_pribytiia_na_med_ucrezdenie' => 'required|integer',
            'vremia_zaverseniia_vyzova' => 'required',
            'vremia_vozvraseniia_na_podstanciiu' => 'required|integer',
            'nazvanie_brigady' => 'required|integer',
            'podrobnyi_adres_vyzova' => 'required|numeric',
            'pricina_vyzova' => 'required|date_format:Y'
        ];
    }
}
