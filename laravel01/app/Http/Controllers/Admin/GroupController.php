<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        DB::enableQueryLog();
        // $groups = Group::all();
        // foreach ($groups as $item) {
        //     $users = $item->users;
        //     foreach ($users as $user) {
        //         echo $user->name;
        //     }
        // }
        $groups = Group::all();
        foreach ($groups as $item) {
            $users = $item->users;
            foreach ($users as $user) {
                echo $user->name;
            }
        }
        dd(DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.groups.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $data = $request->except('_token');
        // $group = Group::create($data);
        $group = new Group();

        // $group->name = $request->name;
        // $group->description = $request->description;

        $group->fill($request->all());

        $group->save();

        dd($group);
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        DB::enableQueryLog();
        //$group = Group::find($id);
        //$group = Group::whereId($id)->first();
        $users = $group->users;
        foreach ($users as $user) {
            echo $user->name.'<br/>';
        }

        dd(DB::getQueryLog());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //$group = Group::find($id);
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        // $group = Group::find($id);
        $group->fill($request->all());
        $group->save();
        return back()->with('msg', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
