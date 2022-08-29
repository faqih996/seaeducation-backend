<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentVaccin extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'doc_name',
        'user_id',
        'slug',
        'product_type',
        'docs_number',
        'place_issued',
        'issued_date',
        'expired_date',
        'expired_date',
        'country_issued',
        'dose',
        'docs_status',
        'certificate'
    ];

    protected $hidden =
    [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
