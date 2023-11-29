<?php

namespace App\Imports;


use App\Jobs\OdsAmbulanceIndicatorJob;
use App\Models\OdsAmbulanceBrigades;
use App\Models\OdsAmbulanceDistricts;
use App\Models\OdsAmbulanceHospitals;
use App\Models\OdsAmbulanceIndicators;
use App\Models\OdsAmbulanceReferences;
use App\Models\OdsAmbulanceRegions;
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

        $substation= OdsAmbulanceSubstations::findOrCreate($row['podstanciia_priniatiia_vyzova'],$row['coato_oblast_vyzova'],$row['coato_raion_vyzova']);
        $region_call=OdsAmbulanceRegions::findOrCreate($row['oblast_vyzova'],$row['coato_oblast_vyzova']);
        $district_call=OdsAmbulanceDistricts::findOrCreate($row['raion_vyzova'],$row['coato_raion_vyzova'],$row['oblast_vyzova'],$row['coato_oblast_vyzova']);
        $region_residence=OdsAmbulanceRegions::findOrCreate($row['oblast_prozivaniia_pacienta'],$row['coato_oblast_prozivaniia_pacienta']);
        $district_residence=OdsAmbulanceDistricts::findOrCreate($row['raion_prozivaniia_pacienta'],$row['coato_raion_prozivaniia_pacienta'],$row['oblast_prozivaniia_pacienta'],$row['coato_oblast_prozivaniia_pacienta']);
        $type=OdsAmbulanceReferences::findOrCreate($row['tip_vyzova'],'call_types');
        $reason=OdsAmbulanceReferences::findOrCreate($row['pricina_vyzova'],'reasons');
        $hospital=OdsAmbulanceHospitals::findOrCreate($row['mesto_gospitalizacii'],$region_call,$district_call);
        $call_result=OdsAmbulanceReferences::findOrCreate($row['rezultat_vyezda'],'call_results');
        $hospitalization_result=OdsAmbulanceReferences::findOrCreate($row['rezultat_gospitalizacii'],'hospitalization_results');
        $called_person=OdsAmbulanceReferences::findOrCreate($row['kto_vyzval'],'called_persons');
        $call_place=OdsAmbulanceReferences::findOrCreate($row['mesto_vyzova'],'call_places');
        $brigade=OdsAmbulanceBrigades::findOrCreate($row['nazvanie_brigady'],$substation);

        OdsAmbulanceIndicators::create([
            'call_region_coato' => $region_call,
            'call_district_coato' => $district_call,
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
            'brigade_id'=>$brigade,
            'address'=>$row['podrobnyi_adres_vyzova'],
            'reason_id'=>$reason,
            'gender'=>$row['pol_pacienta'],
            'age'=>$row['vozrast_pacienta'],
            'residence_region_coato'=>$region_residence,
            'residence_district_coato'=>$district_residence,
            'diagnos'=>$row['diagnoz_po_mkb10'],
            'call_result_id'=>$call_result,
            'hospital_id'=>$hospital,
            'hospitalization_result_id'=>$hospitalization_result,
            'called_person_id'=>$called_person,
            'call_place_id'=>$call_place,
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
            'coato_oblast_vyzova' => 'required|integer',
            'podstanciia_priniatiia_vyzova' => 'required',
            'coato_raion_vyzova' => 'required',
            'zapolnenie_karty_vyzova_kv' => 'required|boolean',
            'tip_vyzova' => 'required|string',
            'nomer_kv' => 'required|integer',
            'data_priema_vyzova' => 'required',
            'vremia_priema_vyzova' => 'required',
            'vremia_nacaly_formirovaniia_kartocki_transportirovki_kt' => 'required',
            'vremia_zaverseniia_formirovaniia_kt' => 'required',
            'vremia_peredaci_vyzova_brigade' => 'required',
            'vremia_vyezda_brigady' => 'required',
            'pribytie_brigady_na_mesto_vyzova' => 'required',
            'vremia_nacaly_transportirovki' => 'required',
            'vremia_pribytiia_na_med_ucrezdenie' => 'required',
            'vremia_zaverseniia_vyzova' => 'required',
            'vremia_vozvraseniia_na_podstanciiu' => 'required',
            'nazvanie_brigady' => 'required',
            'podrobnyi_adres_vyzova' => 'nullable',
            'pricina_vyzova' => 'required',
            'pol_pacienta' => 'required',
            'vozrast_pacienta' => 'required|integer',
            'coato_oblast_prozivaniia_pacienta' => 'required|integer',
            'coato_raion_prozivaniia_pacienta' => 'required|integer',
            'diagnoz_po_mkb10' => 'required|string',
            'rezultat_vyezda' => 'required',
            'mesto_gospitalizacii' => 'nullable',
            'rezultat_gospitalizacii' => 'nullable',
            'kto_vyzval' => 'nullable',
            'mesto_vyzova' => 'required'
        ];
    }
}
