<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithValidation;
use Throwable;

class MedDataImportRequest implements ToCollection, SkipsOnError, WithHeadingRow, WithChunkReading, WithMapping, WithValidation
{
    use Importable;
    protected $end_date;
    protected $start_date;

    public function __construct($end_date ,$start_date )
    {
        $this->end_date=$end_date;
        $this->start_date=$start_date;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Bu yerda har bir qator uchun tekshiruvlar
        }
    }
    public function map($row): array
    {

        $row['peredaca_brigade']=explode('.',$row['peredaca_brigade'])[0];
        $row['vremia_vyezda_br']=explode('.',$row['vremia_vyezda_br'])[0];
        $row['pribytie_na_vyz']=explode('.',$row['pribytie_na_vyz'])[0];

        return $row;
    }
    public function onError(Throwable $e)
    {
        // TODO: Implement onError() method.
    }
    public function chunkSize(): int
    {
        return 1000;
    }
    public function rules(): array
    {

        return [
            '*.peredaca_brigade' => 'required|date',
            '*.vremia_vyezda_br' => 'required|date',
            '*.data_priema' => [
                'required',
                'date',
                'after_or_equal:'.$this->start_date,
                'before_or_equal:'.$this->end_date,
            ],
            '*.vremia_priema' => 'required',
            '*.vr_doezda_na_vyz' => 'required',
            '*.vrna_prinvyzbr' => 'required',
            '*.kod_mkb' => 'nullable',
        ];


    }
}
