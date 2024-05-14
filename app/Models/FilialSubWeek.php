<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FilialSubWeek extends Model
{
    use HasFactory, Scopes;

    protected $table = 'filial_sub_weeks';

    public $fillable = [
        'branch_id',
        'sub_filial_id',
        'week_id',
        'g_appeal',
        'g_sleeping',
        'g_ambulator',
        'y_appeal',
        'y_sleeping',
        'y_ambulator',
        'r_appeal',
        'r_sleeping',
        'r_death',
        'r_dead',
        'ambulance_03',
        'children_03',
        'arrived_himself',
        'children_arrived_himself',
        'came_ticket',
        'children_came_ticket',
        'recumbent',
        'children_recumbent',
        'operation',
        'children_operation',
        'high_tech_operas',
        'children_high_tech_operas',
        'death',
        'children_death',
        'ambulator',
        'children_ambulator',
        'ambulatory_operas',
        'including_children',
        'status',
        'confirm_status',
        'acs',
        'polytrauma'
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
    public function sub_filial(): BelongsTo
    {
        return $this->belongsTo(SubFilial::class, 'sub_filial_id', 'id');
    }
    public function week(): BelongsTo
    {
        return $this->belongsTo(Week::class, 'week_id', 'id');
    }
}
