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
        'brigade_id',
        'substation_id',
    ];

    protected $table = 'ods_ambulance_brigades';
    public function substation(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceSubstations::class);
    }
}
