<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentStcw extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'doc_name',
        'training_type',
        'training_facility',
        'slug',
        'user_id',
        'docs_number',
        'place_issued',
        'issued_date',
        'expired_date',
        'docs_status',
        'certificate'
    ];

    protected $hidden =
    [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
