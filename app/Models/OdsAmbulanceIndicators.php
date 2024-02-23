<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceIndicators extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'call_region_coato',
        'call_district_coato',
        'substation_id',
        'filling_call_card',
        'call_type_id',
        'card_number',
        'call_received',
        'call_reception',
        'beginning_formation_ct',
        'completion_formation_ct',
        'transfer_brigade',
        'brigade_departure',
        'arrival_brigade_place',
        'transportation_start',
        'arrival_medical_center',
        'call_end',
        'return_substation',
        'brigade_id',
        'address',
        'reason_id',
        'gender',
        'age',
        'residence_region_coato',
        'residence_district_coato',
        'diagnos',
        'call_result_id',
        'hospital_id',
        'hospitalization_result_id',
        'called_person_id',
        'call_place_id',
        'brigade_call_time',
        'travel_time',
        'diagnosis_id',
        'excel_id'
    ];

    protected $table = 'ods_ambulance_indicators';
    public function substation(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceSubstations::class);
    }
    public function brigade(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceBrigades::class);
    }
    public function call_type(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'call_type_id');
    }
    public function reason(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'reason_id');
    }
    public function call_result(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'call_result_id');
    }
    public function diagnosis(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'diagnosis_id');
    }
    public function hospital(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'hospital_id');
    }
    public function hospitalization_result(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'hospitalization_result_id');
    }
    public function called_person(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'called_person_id');
    }
    public function call_place(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceReferences::class,'call_place_id');
    }


    public function call_region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class,'call_region_coato','coato');
    }
    public function call_district(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceDistricts::class,'call_district_coato','coato');
    }

    public function residence_region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class,'residence_region_coato','coato');
    }
    public function residence_district(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceDistricts::class,'residence_district_coato','coato');
    }
}
