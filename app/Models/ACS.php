<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ACS extends Model
{
    use HasFactory, Scopes;

    protected $table = 'acs';

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
