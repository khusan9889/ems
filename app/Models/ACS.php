<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->logFillable()
            ->logOnly(['create', 'update']); // Optional: Specify the attributes you want to log

        // You can customize the log options based on your requirements
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // //logging only the changed attributes
    // protected static $logOnlyDirty = true;

    // //the deleted event wouldn't get logged
    // protected static $recordEvents = ['created', 'updated'];

}
