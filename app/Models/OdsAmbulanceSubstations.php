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
        'district_coato'
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
    public static function findOrCreate($name,$region_id)
    {
        $obj = OdsAmbulanceSubstations::where('name',$name)->first();
        if ($obj == null)
        {
            $region=OdsAmbulanceRegions::where('coato',$region_id)->first();
            $obj = new OdsAmbulanceSubstations;
            $obj->name = $name;
            $obj->region_coato = $region->id;
//            $obj->district_coato = $district_coato;
            $obj->save();
        }
        return $obj->id;
    }
}
