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
}
