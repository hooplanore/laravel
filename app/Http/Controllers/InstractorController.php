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
        $users = User::select('id','name','kana','email','tel','gender','birthday','status')->paginate(30);

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
        return Inertia::render('Instractors/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstractorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstractorRequest $request)
    {
        //dd($request);

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
    public function edit(Instractor $instractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstractorRequest  $request
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstractorRequest $request, Instractor $instractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instractor  $instractor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instractor $instractor)
    {
        //
    }
}
