<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Emergency extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'emergencies_user';

    protected $fillable = [
        'family_name',
        'relations',
        'detail_user_id',
        'contact1',
        'contact2',
        'email',
        'address',
        'city',
        'province',
        'country',
        'zip_code',
        'certificate',
    ];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    public function DetailUser()
    {
        return $this->belongsTo(DetailUser::class);
    }
}