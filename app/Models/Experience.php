<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'work_institution_name',
        'base',
        'detail_user_id',
        'position',
        'job_title',
        'start_date',
        'end_date',
        'address',
        'city',
        'province',
        'country',
        'zip_code',
        'spv_name',
        'institution_phone',
        'job_descriptions',
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
