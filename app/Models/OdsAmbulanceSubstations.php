<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceSubstations extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
        'region_coato',
        'district_coato',
        'substation_id',
    ];

    protected $table = 'ods_ambulance_substations';
    public function region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class,'region_coato','coato');
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceDistricts::class,'district_coato','coato');
    }
}
