<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'doc_name',
        'slug',
        'user_id',
        'product_type',
        'issued_date',
        'docs_number',
        'place_issued',
        'country_issued',
        'dose',
        'docs_status',
        'certificate',
    ];

    protected $hidden =
    [
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
