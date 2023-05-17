<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory, Scopes;

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
}
