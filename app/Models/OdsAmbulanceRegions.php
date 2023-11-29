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

    public static function findOrCreate($name,$coato)
    {
        $obj = OdsAmbulanceRegions::where('coato',$coato)->first();
        if ($obj == null)
        {
            $obj = new OdsAmbulanceRegions;
            $obj->name = $name;
            $obj->coato = $coato;
            $obj->save();
        }
        return $obj->coato;
    }
}
