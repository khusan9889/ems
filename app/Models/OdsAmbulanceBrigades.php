<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceBrigades extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
        'brigade_number',
        'substation_id',
    ];

    protected $table = 'ods_ambulance_brigades';
    public function substation(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceSubstations::class);
    }
    public static function findOrCreate($name,$brigade_number,$substation)
    {
        $obj = OdsAmbulanceBrigades::where('name',$name)->first();
        if ($obj == null)
        {
            $obj = new OdsAmbulanceBrigades();
            $obj->name = $name;
            $obj->brigade_number = $brigade_number;
            $obj->substation_id = $substation;
            $obj->save();
        }
        return $obj->id;
    }
}
