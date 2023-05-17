<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use function Ramsey\Uuid\v1;

class ACS extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'branch_id',
        'user_id',
        'department',
        'history_disease',
        'full_name',
        'hospitalization_date',
        'discharge_date',
        'hospitalization_channels',
        'treatment_result',
        'final_result',
        'anginal_attack_date',
        'cta_invasive_angiography',
        'cta_90min',
        'deferred_cta_invasive',
        'deferred_cta_completed',
        'reasons_not_performing_cta',
        'thrombolytic_therapy',
        'thrombolytic_therapy_administered',
        'not_administering_tlt',
        'ecg_during_hospitalization',
        'st_segment',
        'echocardiogram',
        'first_measurement',
        'cholestero_levels',
        'aptt',
        'anticoagulant',
        'aspirin',
        'p2y12',
        'high_intensity_statins',
        'ACE_inhibitors_ARBs',
        'physician_full_name',
        'stat_department_full_name',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
