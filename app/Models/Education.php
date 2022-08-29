<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'edu_institution_name',
        'slug',
        'detail_user_id',
        'course',
        'degree',
        'start_date',
        'graduate_date',
        'address',
        'city',
        'province',
        'country',
        'zip_code',
        'certificate'
    ];

    protected $hidden =
    [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function DetailUser()
    {
        return $this->belongsTo(DetailUser::class);
    }
}
