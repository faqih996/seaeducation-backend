<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'positions';

    protected $fillable = [
        'user_id',
        'department_id',
        'name',
        'slug',
        'status',
        'about',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
}