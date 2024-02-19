<?php

namespace App\Models;

use App\Traits\Scopes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubFilial extends Model
{
    use HasFactory, Scopes;

    protected $table = 'sub_filials';

    public $fillable = [
        'id',
        'name',
        'branch_id'
    ];

    public $hidden = [
        'created_at', 'updated_at'
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }
}
