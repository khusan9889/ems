<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceDistricts extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'region_id',
        'coato',
        'name',
    ];

    protected $table = 'ods_ambulance_districts';

    public function region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class);
    }
    public static function findOrCreate($name,$coato,$region_name,$region_coato)
    {
        $o = OdsAmbulanceRegions::where('coato',$region_coato)->first();
        if ($o == null){
            $o = new OdsAmbulanceRegions();
            $o->name=$region_name;
            $o->coato=$region_coato;
            $o->save();
        }
        $obj = OdsAmbulanceDistricts::where('coato',$coato)->first();
        if ($obj == null)
        {
            $obj = new OdsAmbulanceDistricts;
            $obj->name = $name;
            $obj->coato = $coato;
            $obj->region_id = $o->id;
            $obj->save();
        }
        return $obj->coato;
    }
}
