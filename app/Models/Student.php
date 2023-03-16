<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Group;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'kana',
        'email',
        'password',
        'zip_code',
        'address1',
        'address2',
        'tel',
        'gender',
        'birthday',
        'joindate',
        'amount_category',
        'payment',
        'introducer',
        'parent_name',
        'campaign',
        'memo',
        'status',
    ];

    public function scopeSearchStudents($query, $input = null)
        {
        if(!empty($input)){
        if(Student::where('kana', 'like', $input . '%' )
        ->orWhere('tel', 'like', $input . '%')->exists())
        {
        return $query->where('kana', 'like', $input . '%' )
        ->orWhere('tel', 'like', $input . '%');
        }
        }
        }
    
    public function groups()
    {
    return $this->belongsToMany(Group::class);
    }


}
