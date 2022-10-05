<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'departments';

    protected $fillable = ['name', 'user_id', 'slug', 'status'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];
}