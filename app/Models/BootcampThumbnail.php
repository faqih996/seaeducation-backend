<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class BootcampThumbnail extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'bootcamp_thumbnails';

    protected $fillable = ['bootcamp_id', 'thumbnail'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function bootcamps()
    {
        return $this->belongsTo(Bootcamp::class);
    }
}