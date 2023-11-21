<?php

namespace App\Imports;


use App\Jobs\OdsAmbulanceIndicatorJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;


class OdsAmbulanceIndicatorsImport implements ToCollection, SkipsOnError, WithHeadingRow, WithChunkReading, ShouldQueue, WithValidation
{
    /**
     * @param Collection $rows
     * @throws \Illuminate\Validation\ValidationException
     */
    public function collection(Collection $rows)
    {
//        Validator::make($rows->toArray(), [
//          '*.region' => 'required',
//          '*.region_id' => 'required|integer',
//          '*.district' => 'required',
//          '*.district_id' => 'required|integer',
//          '*.massiv' => 'required',
//          '*.massiv_id' => 'required|integer',
//          '*.farmer' => 'required',
//          '*.farmer_id' => 'required|integer',
//          '*.contour_number' => 'required|integer',
//          '*.crop_area' => 'required|numeric',
//          '*.year' => 'required|date_format:Y',
//          '*.crop_name' => 'required',
//        ])->validate();
        dispatch(new OdsAmbulanceIndicatorJob($rows));
    }

    public function onError(Throwable $e)
    {
      // TODO: Implement onError() method.
    }

    public function chunkSize(): int
    {
      return 1000;
    }

    public function  rules(): array
    {
      return [
        '*.region' => 'required',
        '*.region_id' => 'required|integer',
        '*.district' => 'required',
        '*.district_id' => 'required|integer',
        '*.massiv' => 'required',
        '*.massiv_id' => 'required|integer',
        '*.farmer' => 'required',
        '*.farmer_id' => 'required|integer',
        '*.contour_number' => 'required|integer',
        '*.crop_area' => 'required|numeric',
        '*.year' => 'required|date_format:Y',
        '*.crop_name' => 'required',
      ];
    }
}
