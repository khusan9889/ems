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
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;


class OdsAmbulanceIndicatorsImport implements ToCollection, WithHeadingRow, WithChunkReading, WithMapping,WithBatchInserts
{
    protected $excel_id;
    protected $region_coato;

    public function __construct($excel_id, $region_coato)
    {
        $this->excel_id = $excel_id;
        $this->region_coato = $region_coato;

    }

//    public function model(array $row)
//    {
//
//    try {
//
//        DB::commit();
//        DB::beginTransaction();
//
//        $data_priema = strtotime(trim($row['data_priema']));
//        $data_p = date("Y-m-d", $data_priema);
//
//        if (strlen(trim($row['data_priema']))== 10 and strlen(trim($row['peredaca_brigade']))== 19 and strlen(trim($row['vremia_vyezda_br']))==19 and strlen(trim($row['pribytie_na_vyz']))==19 and strlen(trim($row['vrna_prinvyzbr']))==8 and strlen(trim($row['vr_doezda_na_vyz']))==8) {
//            $substation = OdsAmbulanceSubstations::findOrCreate($row['podstanciia'], $this->region_coato);
//            $type = OdsAmbulanceReferences::findOrCreate($row['tip_vyzova'], 'call_types');
//            $reason = OdsAmbulanceReferences::findOrCreate($row['povod'], 'reasons');
//            $call_result = OdsAmbulanceReferences::findOrCreate($row['rezultat_vyezda'], 'call_results');
//            $hospitalization_result = $row['rez_tat_gosp_cii'] ? OdsAmbulanceReferences::findOrCreate($row['rez_tat_gosp_cii'], 'hospitalization_results') : null;
//            $call_place = OdsAmbulanceReferences::findOrCreate($row['mesto_vyzova'], 'call_places');
//            $diagnosis = OdsAmbulanceReferences::findOrCreate($row['diagnoz'], 'diagnoses');
//            $hospital = OdsAmbulanceHospitals::findOrCreate($row['mesto_gospit'], $this->region_coato);
//            $brigade = OdsAmbulanceBrigades::findOrCreate($row['brigada'], $substation);
//            OdsAmbulanceIndicators::create([
//                'call_region_coato' => $this->region_coato,
//                'substation_id' => $substation,
//                'filling_call_card' =>strtolower(trim($row['kv_zapolnena']))==strtolower("Да")?true:false,
//                'call_type_id' => $type,
//                'card_number' => $row['pp'],
//                'call_received' => $row['data_priema'],
//                'call_reception' => $data_p . ' ' . $row['vremia_priema'],
//                'transfer_brigade' => $row['peredaca_brigade'],
//                'brigade_departure' => $row['vremia_vyezda_br'],
//                'arrival_brigade_place' => $row['pribytie_na_vyz'],
//                'transportation_start' => $row['nacalo_transp_ki'],
//                'arrival_medical_center' => $row['prib_ie_v_medorg'],
//                'call_end' => $row['okoncanie_vyzova'],
//                'return_substation' => $row['vozvr_nie_na_pst'],
//                'brigade_id' => $brigade,
//                'address' => $row['adres_prozivaniia'],
//                'reason_id' => $reason,
//                'gender' => $row['pol'],
//                'age' => $row['vozrast'],
//                'diagnos' => $row['kod_mkb'],
//                'call_result_id' => $call_result,
//                'hospital_id' => $hospital,
//                'hospitalization_result_id' => $hospitalization_result,
//                'call_place_id' => $call_place,
//                'brigade_call_time' => $row['vr_doezda_na_vyz'],
//                'travel_time' => $row['vrna_prinvyzbr'],
//                'diagnosis_id' => $diagnosis,
//                'excel_id' => $this->excel_id
//            ]);
//
//        }
//        DB::commit();
//
//    } catch (Exception $e) {
//            DB::rollback();
//                file_put_contents("import_errors.log", $e, FILE_APPEND);
//            }
//
//    }


    public function collection(Collection $rows)
    {

        try {

            foreach ($rows as $row) {

                $data_priema = strtotime(trim($row['data_priema']));
                $data_p = date("Y-m-d", $data_priema);

                if (strlen(trim($row['data_priema']))== 10 and strlen(trim($row['peredaca_brigade']))== 19 and strlen(trim($row['vremia_vyezda_br']))==19 and strlen(trim($row['pribytie_na_vyz']))==19 and strlen(trim($row['vrna_prinvyzbr']))==8 and strlen(trim($row['vr_doezda_na_vyz']))==8) {
                    $substation = OdsAmbulanceSubstations::findOrCreate($row['podstanciia'], $this->region_coato);
                    $type = OdsAmbulanceReferences::findOrCreate($row['tip_vyzova'], 'call_types');
                    $reason = OdsAmbulanceReferences::findOrCreate($row['povod'], 'reasons');
                    $call_result = OdsAmbulanceReferences::findOrCreate($row['rezultat_vyezda'], 'call_results');
                    $hospitalization_result = $row['rez_tat_gosp_cii'] ? OdsAmbulanceReferences::findOrCreate($row['rez_tat_gosp_cii'], 'hospitalization_results') : null;
                    $call_place = OdsAmbulanceReferences::findOrCreate($row['mesto_vyzova'], 'call_places');
                    $diagnosis = OdsAmbulanceReferences::findOrCreate($row['diagnoz'], 'diagnoses');
                    $hospital = OdsAmbulanceHospitals::findOrCreate($row['mesto_gospit'], $this->region_coato);
                    $brigade = OdsAmbulanceBrigades::findOrCreate($row['brigada'], $substation);
                    OdsAmbulanceIndicators::create([
                        'call_region_coato' => $this->region_coato,
                        'substation_id' => $substation,
                        'filling_call_card' =>strtolower(trim($row['kv_zapolnena']))==strtolower("Да")?true:false,
                        'call_type_id' => $type,
                        'card_number' => $row['pp'],
                        'call_received' => $row['data_priema'],
                        'call_reception' => $data_p . ' ' . $row['vremia_priema'],
                        'transfer_brigade' => $row['peredaca_brigade'],
                        'brigade_departure' => $row['vremia_vyezda_br'],
                        'arrival_brigade_place' => $row['pribytie_na_vyz'],
                        'transportation_start' => $row['nacalo_transp_ki'],
                        'arrival_medical_center' => $row['prib_ie_v_medorg'],
                        'call_end' => $row['okoncanie_vyzova'],
                        'return_substation' => $row['vozvr_nie_na_pst'],
                        'brigade_id' => $brigade,
                        'address' => $row['adres_prozivaniia'],
                        'reason_id' => $reason,
                        'gender' => $row['pol'],
                        'age' => $row['vozrast'],
                        'diagnos' => $row['kod_mkb'],
                        'call_result_id' => $call_result,
                        'hospital_id' => $hospital,
                        'hospitalization_result_id' => $hospitalization_result,
                        'call_place_id' => $call_place,
                        'brigade_call_time' => $row['vr_doezda_na_vyz'],
                        'travel_time' => $row['vrna_prinvyzbr'],
                        'diagnosis_id' => $diagnosis,
                        'excel_id' => $this->excel_id
                    ]);

                }


            }
        } catch (Exception $e) {
                file_put_contents("import_errors.log", $e, FILE_APPEND);
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
        return 5000;
    }

    public function batchSize(): int
    {
        return 5000;
    }

}
