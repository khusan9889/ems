<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedDataExcel extends Model
{
    use HasFactory;

    public $fillable = [
        'id',
        'file',
        'start_date',
        'end_date',
        'region_coato',
        'sanction'
    ];

    protected $table = 'med_data_excels';

    public function indicators()
    {
        return $this->hasMany(OdsAmbulanceIndicators::class,'excel_id','id');
    }
    public function region(): BelongsTo
    {
        return $this->belongsTo(OdsAmbulanceRegions::class,'region_coato','coato');
    }
}
