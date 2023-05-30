<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

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
        // 'amount_category',
        // 'payment',
        'introducer',
        'parent_name',
        'campaign',
        'memo',
        'status',
        'family_id',
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
    //return $this->belongsToMany('App\Models\Group','group_student','group_id','student_id');
    }

    //ap用
    public function apgroups()
    {
    return $this->belongsToMany(Group::class, 'ap_student');
    //return $this->belongsToMany('App\Models\Group','ap_student','group_id','student_id');
    }

    //中間テーブルないの値も紐付け
    public function group_students()
    {
        return $this->belongsToMany(Group::class, 'group_student', 'student_id', 'group_id')->withPivot('amount_category','payment');
    }


}
