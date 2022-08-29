<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentPass extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'doc_name',
        'user_id',
        'slug',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
