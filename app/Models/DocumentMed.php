<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentMed extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'doc_name',
        'clinic_name',
        'slug',
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
