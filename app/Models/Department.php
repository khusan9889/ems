<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'branch_id',
        'name',
    ];

    protected $table = 'departments';

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }

    public function acs(): HasMany
    {
        return $this->hasMany(ACS::class);
    }

    public function polytrauma(): HasMany
    {
        return $this->hasMany(Polytrauma::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
