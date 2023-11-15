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
        'table_name',
        'item_id'
    ];

    protected $table = 'ods_ambulance_references';

}
