<?php

namespace App\Imports;


use App\Models\OdsAmbulanceBrigades;
use App\Models\OdsAmbulanceHospitals;
use App\Models\OdsAmbulanceIndicators;
use App\Models\OdsAmbulanceReferences;
use App\Models\OdsAmbulanceSubstations;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;


class OdsAmbulanceIndicatorsImport implements ToCollection, WithHeadingRow, WithChunkReading, WithMapping, WithBatchInserts
{
    protected $excel_id;
    protected $region_coato;

    public function __construct($excel_id, $region_coato)
    {
        $this->excel_id = $excel_id;
        $this->region_coato = $region_coato;

    }

    public function collection(Collection $rows)
    {


        foreach ($rows as $row) {
            try {
                $data_priema = strtotime(trim($row['data_priema']));
                $data_p = date("Y-m-d", $data_priema);
                if (
                    strlen(trim($row['data_priema'])) == 10
                    and strlen(trim($row['vremia_priema'])) == 8
                    and strlen(trim($row['peredaca_brigade'])) == 19
                    and strlen(trim($row['vremia_vyezda_br'])) == 19
                    and strlen(trim($row['pribytie_na_vyz'])) == 19
                    and strlen(trim($row['vrna_prinvyzbr'])) == 8
                    and strlen(trim($row['vr_doezda_na_vyz'])) == 8
                ) {
                    $reason = OdsAmbulanceReferences::findOrCreate($row['povod'] ? $row['povod'] : "Без причины", 'reasons');
                    $diagnosis = OdsAmbulanceReferences::findOrCreate($row['diagnoz'] ? $row['diagnoz'] : "Недиагностированный", 'diagnoses');
//                    $substation = OdsAmbulanceSubstations::findOrCreate($row['podstanciia'], $this->region_coato);
//                    $type = OdsAmbulanceReferences::findOrCreate($row['tip_vyzova'], 'call_types');
//                    $call_result = OdsAmbulanceReferences::findOrCreate($row['rezultat_vyezda'], 'call_results');
//                    $hospitalization_result = $row['rez_tat_gosp_cii'] ? OdsAmbulanceReferences::findOrCreate($row['rez_tat_gosp_cii'], 'hospitalization_results') : null;
//                    $call_place = OdsAmbulanceReferences::findOrCreate($row['mesto_vyzova'], 'call_places');
//                    $hospital = OdsAmbulanceHospitals::findOrCreate($row['mesto_gospit'], $this->region_coato);
//                    $brigade = OdsAmbulanceBrigades::findOrCreate($row['brigada'], $substation);
                    OdsAmbulanceIndicators::create([
                        'call_region_coato' => $this->region_coato,
                        'filling_call_card' =>strtolower(trim($row['kv_zapolnena']))==strtolower("да")?true:false,
                        'call_received' => $row['data_priema'],
                        'call_reception' => $data_p . ' ' . $row['vremia_priema'],
                        'transfer_brigade' => $row['peredaca_brigade'],
                        'brigade_departure' => $row['vremia_vyezda_br'],
                        'arrival_brigade_place' => $row['pribytie_na_vyz'],
                        'reason_id' => $reason,
                        'diagnos' => $row['kod_mkb'] ? $row['kod_mkb'] : "Нет",
                        'brigade_call_time' => $row['vr_doezda_na_vyz'],
                        'travel_time' => $row['vrna_prinvyzbr'],
                        'diagnosis_id' => $diagnosis,
                        'excel_id' => $this->excel_id
//                        'card_number' => $row['pp'],
//                        'substation_id' => $substation,
//                        'call_type_id' => $type,
//                        'transportation_start' => $row['nacalo_transp_ki'],
//                        'arrival_medical_center' => $row['prib_ie_v_medorg'],
//                        'call_end' => $row['okoncanie_vyzova'],
//                        'return_substation' => $row['vozvr_nie_na_pst'],
//                        'brigade_id' => $brigade,
//                        'address' => $row['adres_prozivaniia'],
//                        'gender' => $row['pol'],
//                        'age' => $row['vozrast'],
//                        'call_result_id' => $call_result,
//                        'hospital_id' => $hospital,
//                        'hospitalization_result_id' => $hospitalization_result,
//                        'call_place_id' => $call_place,
                    ]);
                }
            } catch (Exception $e) {
                Log::error('Xato yozishda : ' . $e->getMessage());
            }
        }

    }

    public function map($row): array
    {

        $row['peredaca_brigade'] = explode('.', $row['peredaca_brigade'])[0];
        $row['vremia_vyezda_br'] = explode('.', $row['vremia_vyezda_br'])[0];
        $row['pribytie_na_vyz'] = explode('.', $row['pribytie_na_vyz'])[0];
        return $row;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function batchSize(): int
    {
        return 1000;
    }

}
