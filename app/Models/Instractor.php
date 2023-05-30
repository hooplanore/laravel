<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Instractor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'kana',
        'zip_code',
        'address1',
        'address2',
        'tel',
        'gender',
        'birthday',
        'auth',
        'status',
    ];
    
    public function groups()
    {
    return $this->belongsToMany(Group::class);
    }

    
}
