<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory, Scopes;

    protected $table = 'weeks';

    public $fillable = [
        'id',
        'name',
        'start_date',
        'end_date',
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];

}
