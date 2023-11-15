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
        'indicator_id',
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
    ];

    protected $table = 'ods_ambulance_hospitals';
    public function substation(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceSubstations::class);
    }
}
