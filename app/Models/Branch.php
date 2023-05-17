<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory, Scopes;

    public $fillable = [
        'name',
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];
}
