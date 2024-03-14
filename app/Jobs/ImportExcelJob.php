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

    public $tries = 5;

    protected $excel_id;
    protected $region_coato;
    protected $file;
    protected $start_date;
    protected $end_date;

    public function __construct($excel_id,$region_coato,$file,$start_date,$end_date)
    {
        $this->excel_id = $excel_id;
        $this->region_coato = $region_coato;
        $this->file = $file;
        $this->start_date=$start_date;
        $this->end_date=$end_date;
    }


    public function handle()
    {
        Excel::import(new OdsAmbulanceIndicatorsImport($this->excel_id,$this->region_coato,$this->start_date,$this->end_date), $this->file);

        $med_data = MedDataExcel::findOrFail($this->excel_id);
        $med_data->sanction=1;
        $med_data->save();
    }

    public function failed(\Exception $exception)
    {
        $errorMessage = "[" . date("Y-m-d H:i:s") . "] Xatolik: " . $exception->getMessage() ."\n";
        file_put_contents("import_errors.log", $errorMessage, FILE_APPEND);
        $med_data = MedDataExcel::findOrFail($this->excel_id);
        $med_data->sanction=2;
        $med_data->save();
    }


}
