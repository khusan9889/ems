<?php

namespace App\Models\Permissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleMethod extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function role_methods()
    {
        return $this->hasMany(RoleMethod::class, 'method_id');
    }
}
