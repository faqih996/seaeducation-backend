<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'department_id',
        'name',
        'slug',
        'status',
        'about'
    ];

    protected $hidden =
    [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
