<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
