<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory, Scopes;

    protected $table = 'roles';

    public $fillable = [
        'name',
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
