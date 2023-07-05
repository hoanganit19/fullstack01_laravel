<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Phone;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $pageTitle = 'Danh sách Users';

        // DB::enableQueryLog();
        //$users = DB::table('users');
        $users = User::all();

        //logic
        if ($request->id) {
            //$users->where('id', '>=', $request->id);
            // $users->whereIn('id', function ($query) {
            //     // $query->where('name', 'like', '%a%');
            //     // $query->orWhere('email', 'like', '%a%');
            //     $query->select('id')->from('users');
            // });
        }

        //select * from users where status = 1 and (name like '%a%' or email like '%a%')

        // $users->select('users.*', 'groups.name as group_name');
        // $users->join('groups', 'users.group_id', '=', 'groups.id');

        //$users->selectRaw('name, (SELECT count(id) FROM groups WHERE users.group_id=groups.id) as group_count');
        //$users->select('name', DB::raw('(SELECT count(id) FROM groups WHERE users.group_id=groups.id) as group_count'));
        // $users->groupBy('email');
        // $users->havingRaw('max(age) >= ?', [20]);

        // $users->whereIn('id', function ($query) {
        //     $query->selectRaw('id')->fromRaw('groups');
        // });

        // $users = $users
        //->latest()
        //->inRandomOrder()
        // ->limit(2)
        // ->offset(1)
        // ->get(); //collection
        /// dd(DB::getQueryLog());
        foreach ($users as $item) {
            $phone = $item->phone->number ?? '';
            echo $item->name.' - '.$phone.'<br/>';
        }

        $phoneNumber = '04234244';
        $phone = Phone::whereNumber($phoneNumber)->first();
        dd($phone->user()->whereEmail('nguyenvana@gmail.com')->first());

        die();
        return view('admin.users.lists', compact('pageTitle', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|min:5'
        // ], [
        //     'required' => ':attribute bắt buộc phải nhập',
        //     'min' => ':attribute phải từ :min ký tự'
        // ], [
        //     'name' => 'Tên'
        // ]);

        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        //Thêm vào database

        // if ($request->header('Accept') === 'application/json') {
        //     return $request->except('_token');
        // }

        // return redirect()
        // ->route('admin.users.index')
        // ->with(['msg' => 'Thêm thành công', 'type' => 'error']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = DB::table('users')->whereId($id)->first();
        return view('admin.users.edit', compact('id', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        //
        //dd($request->name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
