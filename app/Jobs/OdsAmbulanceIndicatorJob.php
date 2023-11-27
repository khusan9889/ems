<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class OdsAmbulanceIndicatorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $rows;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rows)
    {
      $this->rows = $rows;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//OdsAmbulanceSubstations
//OdsAmbulanceBrigades
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceReferences
//OdsAmbulanceRegions
//OdsAmbulanceDistricts
//OdsAmbulanceRegions
//OdsAmbulanceDistricts
        foreach ($this->rows as $row) {
            dd($row);
//          Region::findOrCreate($row['region_id'], $row['region']);
//          District::findOrCreate($row['district_id'], $row['district'], $row['region_id']);
//          Matrix::findOrCreate($row['massiv_id'], $row['massiv'], $row['district_id']);
//          Farmer::findOrCreate($row['farmer_id'], $row['farmer'], $row['crop_area'], $row['region_id'], $row['district_id'], $row['contour_number']);
//          $farmer_contour = FarmerContour::findOrCreate($row['farmer_id'], $row['contour_number'], $row['crop_area']);
//          ContourHistory::findOrCreate($row['region_id'], $row['district_id'], $row['massiv_id'], $farmer_contour['id'], $row['year'], $row['crop_name']);
        }
    }
}
