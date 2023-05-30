<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\Attendance;
use App\Models\Group;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Student;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $groups = Group::searchGroups($request->search)
        ->with('students')->select('id','name')
        ->select(
            'id','groupcategory_id','name','groupdate','grouptime','placename',
            'address','status')->paginate(50);
        
        $attendances = Attendance::with('group')
            ->select('group.id','group.name')
            ->select(
            'id','group_id','attendancedate','attendance_count','belongs_count','ap_count', 'stamp_count')
            ->orderBy('attendancedate', 'desc')
            ->paginate(50);

             //dd($attendances);

        return Inertia::render('Attendances/Index',[
            'groups' => $groups,
            'attendances' => $attendances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();

        return Inertia::render('Attendances/Create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::with('students')->findOrFail($id);
        $user = Group::with('users')->findOrFail($id);
        $attendance = Attendance::findOrFail($id);
//dd($attendance);
        return Inertia::render('Attendances/Show',[
            'group' => $group,
            'user' => $user,
            'attendance' => $attendance
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceRequest  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceRequest $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
