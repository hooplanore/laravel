<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\GroupStudent;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $students = Student::searchStudents($request->search)->with(['groups' => function ($query) {
            $query->select('groups.name','group_category');
        }])->select('id','name','kana','email','tel','gender','birthday','status')->paginate(50);
    

        //dd($students);

        // $students = Student::searchStudents($request->search)
        // ->with('groups')->select('id','groups','name','kana','email','tel','gender','status')->paginate(50);

        //$students = Student::with('groups')->take(10)->get();

        return Inertia::render('Students/Index',[
            'students' => $students
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

        return Inertia::render('Students/Create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'kana' => $request->kana,
            'email' => $request->email,
            'password' => $request->password,
            'zip_code' => $request->zip_code,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'tel' => $request->tel,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'joindate' => $request->joindate,
            'amount_category' => $request->amount_category,
            'payment' => $request->payment,
            'introducer' => $request->introducer,
            'parent_name' => $request->parent_name,
            'campaign' => $request->campaign,
        ]);


        $group = Group::create([
            'selectedGroupId' => $request->selectedGroupId,
        ]);


        dd($group);

        

        return to_route('students.index')
        ->with([
            'message' => '登録しました',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::with('groups')->findOrFail($id);
        //dd($students);
        return Inertia::render('Students/Show',[
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $group = Group::take(10)->get();

        //dd($group);

        return Inertia::render('Students/Edit',[
            'student' => $student,
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->name = $request->name;
        $student->kana = $request->kana;
        $student->email = $request->email;
        $student->password = $request->password;
        $student->zip_code = $request->zip_code;
        $student->address1 = $request->address1;
        $student->address2 = $request->address2;
        $student->tel = $request->tel;
        $student->gender = $request->gender;
        $student->birthday = $request->birthday;
        $student->joindate = $request->joindate;
        $student->amount_category = $request->amount_category;
        $student->payment = $request->payment;
        $student->introducer = $request->introducer;
        $student->parent_name = $request->parent_name;
        $student->campaign = $request->campaign;
        $student->memo = $request->memo;
        $student->status = $request->status;
        $student->save();


        return to_route('students.index')
        ->with([
            'message' => '更新しました',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('students.index')
        ->with([
        'message' => '削除しました。',
        'status' => 'danger'
        ]);
    }
}
