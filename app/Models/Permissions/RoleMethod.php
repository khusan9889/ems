<?php

namespace App\Models\Permissions;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMethod extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'role_methods';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
