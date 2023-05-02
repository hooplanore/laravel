<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Group;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'attendancedate',
        'attendance_count',
        'belongs_count',
        'ap_count',
        'stamp_count',
    ];


    public function students()
    {
    return $this->belongsToMany(Student::class);
    }

    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
}
