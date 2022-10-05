<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class BootcampLocation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'bootcamp_locations';

    protected $fillable = ['name', 'status'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function bootcamps()
    {
        return $this->hasMany(Bootcamp::class);
    }
}