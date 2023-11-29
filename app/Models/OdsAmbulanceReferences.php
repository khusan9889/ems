<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OdsAmbulanceReferences extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
        'table_name'
    ];

    protected $table = 'ods_ambulance_references';
    public static function findOrCreate($name,$table_name)
    {
        $obj = OdsAmbulanceReferences::where('name',$name)->first();
        if ($obj == null)
        {
            $obj = new OdsAmbulanceReferences();
            $obj->name = $name;
            $obj->table_name = $table_name;
            $obj->save();
        }
        return $obj->id;
    }
}
