<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class thumbnails_department extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'department_id',
        'thumbnail'
    ];
}
