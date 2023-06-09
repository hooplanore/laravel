<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Student;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'gourp_category',
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
        return $this->belongsToMany(Student::class);
        }
}
