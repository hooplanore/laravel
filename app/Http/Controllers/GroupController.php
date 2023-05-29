<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Groupcategory;
use App\Models\Group;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Student;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   

        $groups = Group::searchGroups($request->search)
        ->with('students', 'groupcategory')
        ->select(
            'id','groupcategory_id','name','groupdate','grouptime','placename',
            'address','status')->paginate(50);
        //dd($groups);
        return Inertia::render('Groups/Index',[
            'groups' => $groups
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Groups/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        //dd($request);
        Group::create([
            'groupcategory_id' => $request->groupcategory_id,
            'name' => $request->name,
            'groupdate' => $request->groupdate,
            'grouptime' => $request->grouptime,
            'placename' => $request->placename,
            'address' => $request->address
        ]);

        return to_route('groups.index')
        ->with([
            'message' => '登録しました',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::with('students', 'groupcategory')->findOrFail($id);
        $user = Group::with('users')->findOrFail($id);
        $apgroup = Group::with('apstudents')->findOrFail($id);
        //dd($group);
        return Inertia::render('Groups/Show',[
            'group' => $group,
            'user' => $user,
            'apgroup' => $apgroup
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        
        return Inertia::render('Groups/Edit',[
            'group' => $group
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGroupRequest $request, Group $group)
    {
        
        $group->groupcategory_id = $request->groupcategory_id;
        $group->name = $request->name;
        $group->groupdate = $request->groupdate;
        $group->grouptime = $request->grouptime;
        $group->placename = $request->placename;
        $group->address = $request->address;
        $group->status = $request->status;
        $group->save();


        $groupId = $group->id;
        //dd($studentId);

        return redirect()->route('groups.show', ['group' => $groupId])
        //return to_route('groups.index')
        ->with([
            'message' => '更新しました',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return to_route('groups.index')
        ->with([
        'message' => '削除しました。',
        'status' => 'danger'
        ]);
    }
}
