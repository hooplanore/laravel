<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Groupcategory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'groupcategory_id',
        'name',
        'groupdate',
        'grouptime',
        'placename',
        'address',
        'status',
    ];

    public function scopeSearchGroups($query, $input = null)
        {
        if(!empty($input)){
        if(Group::where('name', 'like', $input . '%' )
        ->orWhere('group_category', 'like', $input . '%')->exists())
        {
        return $query->where('name', 'like', $input . '%' )
        ->orWhere('group_category', 'like', $input . '%');
        }
        }
        }
    
        public function students()
        {
        return $this->belongsToMany(Student::class,'group_student');
        //return $this->belongsToMany('App\Models\Student','group_student','group_id','student_id');
        }
        //ap用
        public function apstudents()
        {
        return $this->belongsToMany(Student::class,'ap_student');
        //return $this->belongsToMany('App\Models\Student','ap_student','group_id','student_id');
        }
    
        public function users()
        {
        return $this->belongsToMany(User::class);
        }
    
        public function attendances()
        {
        return $this->hasMany(Attendance::class);
        }

        public function groupcategory()
        {
        return $this->belongsTo(Groupcategory::class);
        }

        
}
