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
        'district_coato'
    ];

    protected $table = 'ods_ambulance_hospitals';

    public function region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class,'region_coato','coato');
    }
    public function district(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceDistricts::class,'district_coato','coato');
    }
    public static function findOrCreate($name,$region_coato,$district_coato)
    {
        if ($name == null)
        {
            return null;
        }
        $obj = OdsAmbulanceHospitals::where('name',$name)->where('region_coato',$region_coato)->where('district_coato',$district_coato)->first();
        if ($obj == null)
        {
            $obj = new OdsAmbulanceHospitals;
            $obj->name = $name;
            $obj->region_coato = $region_coato;
            $obj->district_coato = $district_coato;
            $obj->save();
        }
        return $obj->id;
    }
}
