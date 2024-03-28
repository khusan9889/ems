<?php

namespace App\Jobs;

use App\Imports\OdsAmbulanceIndicatorsImport;
use App\Models\MedDataExcel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelJob implements ShouldQueue

{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $excel_id;
    protected $region_coato;
    protected $file;

    public function __construct($excel_id,$region_coato,$file)
    {
        $this->excel_id = $excel_id;
        $this->region_coato = $region_coato;
        $this->file = $file;
    }


    public function handle()
    {
        Excel::import(new OdsAmbulanceIndicatorsImport($this->excel_id,$this->region_coato), $this->file);

        $med_data = MedDataExcel::findOrFail($this->excel_id);
        $med_data->sanction=1;
        $med_data->save();
    }

    public function failed(\Exception $exception)
    {
        $med_data = MedDataExcel::findOrFail($this->excel_id);
        $med_data->sanction=2;
        $med_data->save();

        file_put_contents(" storage/logs/jobs_failed.log", $exception, FILE_APPEND);
    }


}
