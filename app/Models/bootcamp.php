<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',   
        'slug',   
        'type',   
        'location_id',   
        'duration',   
        'price',   
        'status',   
        'camp_regis_date',   
        'camp_start',   
    ];

    protected $hidden = [
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    public function benefits()
    {
        return $this->hasMany(BootcampBenefit::class);
    }

    public function locations()
    {
        return $this->hasMany(BootcampLocation::class);
    }
    public function thumbnails()
    {
        return $this->hasMany(BootcampThumbnail::class);
    }
}
