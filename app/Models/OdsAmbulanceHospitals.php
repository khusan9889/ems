<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceHospitals extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
        'region_coato',
        'district_coato',
        'hospital_id'
    ];

    protected $table = 'ods_ambulance_hospitals';

    public function hospital(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceHospitals::class);
    }
}
