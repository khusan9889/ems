<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionsLog extends Model
{
    use HasFactory, Scopes;

    protected $table = 'actions_log';
}
