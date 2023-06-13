<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory, Scopes;

    protected $table = 'branch';

    public $fillable = [
        'name',
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function acs(): HasMany
    {
        return $this->hasMany(ACS::class);
    }

    public function polytrauma(): HasMany
    {
        return $this->hasMany(Polytrauma::class);
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
