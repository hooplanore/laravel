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
            $query->select('groups.name','groupcategory_id');
        }])->select('id','name','kana','email','tel','gender','birthday','status','family_id')->paginate(50);

        return Inertia::render('Students/Index',[
            'students' => $students,
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

        // $addforms = $request->addforms ?? $request->input('addforms'); //リクエストの中にaddformsがあれば取得
        // dd($addforms);
        // Student インスタンスを作成する前に、各フォームの selectedGroupIds プロパティを配列に格納する
        // $selectedGroupIdsArray = [];
        // foreach ($addforms as $addform) {
        //     $selectedGroupIdsArray[] = $addform['selectedGroupIds'];
        // }

        //AP用
        // $addapforms = $request->addapforms ?? $request->input('addapforms'); //リクエストの中にaddformsがあれば取得

        // // Student インスタンスを作成する前に、各フォームの selectedGroupIds プロパティを配列に格納する
        // $selectedApGroupIdsArray = [];
        // foreach ($addapforms as $addapform) {
        //     $selectedApGroupIdsArray[] = $addapform['selectedApGroupIds'];
        // }
        
        //dd($request->all());
        
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
            // 'amount_category' => $request->amount_category,
            // 'payment' => $request->payment,
            'introducer' => $request->introducer,
            'parent_name' => $request->parent_name,
            'campaign' => $request->campaign,
            'family_id' => $request->family_id,
        ]);
        
        // if (!is_null($request->addforms)) {
        //     $selectedGroupIds = array_column($request->addforms, 'selectedGroupIds'); //選択されたグループIDの配列を取得
        //     foreach ($selectedGroupIds as $groupId) {
        //         $group = Group::find($groupId); //選択されたグループのモデルを取得
        //         $group->students()->syncWithoutDetaching($student->id); //中間テーブルにレコードを追加
        //     }
        // }

        if (!is_null($request->addforms)) {
            foreach ($request->addforms as $addform) {
                $selectedGroupIds = $addform['selectedGroupIds']; // 選択されたグループIDを取得
                $selectedAmountcategory = $addform['selectedAmountcategory']; // 選択されたamount_categoryを取得
                $selectedPayment = $addform['selectedPayment']; // 選択されたpaymentを取得
        
                $group = Group::find($selectedGroupIds); // 選択されたグループのモデルを取得
                $group->students()->syncWithoutDetaching([
                    $student->id => [
                        'amount_category' => $selectedAmountcategory,
                        'payment' => $selectedPayment
                    ]
                ]); // 中間テーブルにレコードを追加
            }
        }
        

        //AP用
        if (!is_null($request->addapforms)) {
            $selectedApGroupIds = array_column($request->addapforms, 'selectedApGroupIds'); //選択されたグループIDの配列を取得
            foreach ($selectedApGroupIds as $groupId) {
                $apgroup = Group::find($groupId); //選択されたグループのモデルを取得
                $apgroup->apstudents()->syncWithoutDetaching($student->id); //中間テーブルにレコードを追加
            }
        }
        
        return redirect()->route('students.index')
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
        $student = Student::with('groups','group_students')->findOrFail($id);
        $apstudent = Student::with('apgroups')->findOrFail($id);
        $studentIds = Student::select('id','name','status')->get();
        $group = Group::with('groupcategory')->get();

       //dd($student);
        //dd($apstudent);
        return Inertia::render('Students/Show',[
            'student' => $student,
            'apstudent' => $apstudent,
            'studentIds' => $studentIds,
            'group' => $group,
            'groupStudents' => $student->group_students,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::with('groups','group_students')->findOrFail($id);
        $groups = Group::select('id','name')->get();
        $apstudent = Student::with('apgroups')->findOrFail($id);

        //dd($student->group_students);

        return Inertia::render('Students/Edit',[
            'student' => $student,
            'groups' => $groups,
            'apstudent' => $apstudent,
            'groupStudents' => $student->group_students,
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
        $student->introducer = $request->introducer;
        $student->parent_name = $request->parent_name;
        $student->campaign = $request->campaign;
        $student->memo = $request->memo;
        $student->status = $request->status;
        $student->family_id = $request->family_id; 
        $student->save();
        
       
        if (!is_null($request->addforms)) {
            $selectedGroupIds = array_column($request->addforms, 'id'); //選択されたグループIDの配列を取得
            $selectedAmountcategory = array_column($request->addforms, 'pivot');
            $pivotData = [];
            foreach ($selectedAmountcategory as $pivot) {
                $pivotData[$pivot['group_id']] = [
                'amount_category' => $pivot['amount_category'],
                'payment' => $pivot['payment']
                ];
            }
            
            //dd($pivotData);
            $student->groups()->sync($selectedGroupIds,$pivotData); // 中間テーブルのレコードを更新
        }
        

        if (!is_null($request->addapforms)) {
            $selectedApGroupIds = array_column($request->addapforms, 'id'); //選択されたグループIDの配列を取得

            $student->apgroups()->sync($selectedApGroupIds); // 中間テーブルのレコードを更新
        }

        $studentId = $student->id;
        //dd($studentId);

        return redirect()->route('students.show', ['student' => $studentId])
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
