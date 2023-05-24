<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstractorRequest;
use App\Http\Requests\UpdateInstractorRequest;
use Inertia\Inertia;
use App\Models\Instractor;
use App\Models\User;
use App\Models\Group;

class InstractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('groups')->select('id','name')
        ->select('id','name','kana','email','tel','gender','birthday','status')->paginate(30);

        //dd($users);
    
        return Inertia::render('Instractors/Index',[
            'users' => $users
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

        return Inertia::render('Instractors/Create', [
            'groups' => $groups,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstractorRequest $request)
    {

        $addforms = $request->addforms ?? $request->input('addforms'); //リクエストの中にaddformsがあれば取得

        // Student インスタンスを作成する前に、各フォームの selectedGroupIds プロパティを配列に格納する
        $selectedGroupIdsArray = [];
        foreach ($addforms as $addform) {
            $selectedGroupIdsArray[] = $addform['selectedGroupIds'];
        }
        //dd($addforms);

        $user = User::create([
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
            'status' => $request->status
        ]);

        
        if (!is_null($request->addforms)) {
            $selectedGroupIds = array_column($request->addforms, 'selectedGroupIds'); //選択されたグループIDの配列を取得
            foreach ($selectedGroupIds as $groupId) {
                $group = Group::find($groupId); //選択されたグループのモデルを取得
                $group->users()->syncWithoutDetaching($user->id); //中間テーブルにレコードを追加
            }
        }
        //dd($selectedGroupIds);
        
        return redirect()->route('instractors.index')
            ->with([
                'message' => '登録しました',
                'status' => 'success'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with('groups')->findOrFail($id);
        //dd($user);
        return Inertia::render('Instractors/Show',[
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instractor = User::with('groups')->findOrFail($id);
        $groups = Group::select('id','name')->get();
        //dd($groups);
        return Inertia::render('Instractors/Edit',[
            'instractor' => $instractor,
            'groups' => $groups
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstractorRequest  $request
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstractorRequest $request, User $instractor)
    {
        //dd($request);
        $instractor->name = $request->name;
        $instractor->kana = $request->kana;
        $instractor->email = $request->email;
        $instractor->zip_code = $request->zip_code;
        $instractor->address1 = $request->address1;
        $instractor->address2 = $request->address2;
        $instractor->tel = $request->tel;
        $instractor->gender = $request->gender;
        $instractor->birthday = $request->birthday;
        $instractor->auth = $request->auth;    
        $instractor->status = $request->status;  
        $instractor->save();

        if (!is_null($request->addforms)) {
            $selectedGroupIds = array_column($request->addforms, 'id'); //選択されたグループIDの配列を取得
            $instractor->groups()->sync($selectedGroupIds); // 中間テーブルのレコードを更新
        }

        $instractorId = $instractor->id;
        //dd($studentId);

        return redirect()->route('instractors.show', ['instractor' => $instractorId])
        //return to_route('instractors.index')
        ->with([
            'message' => '更新しました',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $instractor)
    {
        $instractor->delete();
        return to_route('instractors.index')
        ->with([
        'message' => '削除しました。',
        'status' => 'danger'
        ]);
    }
}
