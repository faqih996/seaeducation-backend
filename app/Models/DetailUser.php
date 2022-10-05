<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailUser extends Model
{
    use HasFactory;

    public $table = 'detail_user';

    protected $fillable = [
        'photo',
        'user_id',
        'birth_place',
        'birth_date',
        'gender',
        'marital',
        'about_me',
        'phone_number',
        'phone_number2',
        'address',
        'regency',
        'province',
        'zip_code',
        'country',
        'skype',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}