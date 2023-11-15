<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OdsAmbulanceRegions extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
        'coato'
    ];

    protected $table = 'ods_ambulance_regions';
}
