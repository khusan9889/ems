<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Polytrauma extends Model
{
    use HasFactory, Scopes;

    protected $table = 'polytrauma';

    // public $fillable = [
    //     'branch_id',
    //     'user_id',
    //     'department',
    //     'history_disease',
    //     'full_name',
    //     'hospitalization_date',
    //     'discharge_date',
    //     'hospitalization_channels',
    //     'treatment_result',
    //     'severity_of_ts',
    //     'injury_of_iss',
    //     'arrival_after_injury',
    //     'mechanism_of_injury',
    //     'survey_of_surgeon',
    //     'survey_of_neurosurgeon',
    //     'survey_of_traumatologist',
    //     'narrow_specialists',
    //     'r_graphy',
    //     'conducted_ultrasound',
    //     'msct',
    //     'msct_individual_parts',
    //     'neutral_fats',
    //     'analysis_of_hb_ht',
    //     'dynamic_uzs',
    //     'diagnostic_laparoscopy',
    //     'thoracocentesis',
    //     'laparotomy',
    //     'thoracoscopy_thoracotomy',
    //     'osteosynthesis_of_fractures',
    //     'skull_trepanation',
    //     'physician_full_name',
    //     'stat_department_full_name',
    // ];

    protected $guarded = [];

    const HOSPITALIZATION_CHANNELS = [
        'Направление' => 'Направление',
        'Самотек' => 'Самотек',
        'Скорая' => 'Скорая',
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
