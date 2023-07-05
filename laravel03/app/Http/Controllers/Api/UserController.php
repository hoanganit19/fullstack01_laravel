<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function index(Request $request){

        $users = User::latest();
        
        if ($request->limit){
            $users = $users->paginate($request->limit);
        }else{
            $users = $users->get();
        }

        // header("Content-Type: application/json");
     
        // http_response_code(201);
       
        // return json_encode($users);

        $users = new UserCollection($users);
       //$users = UserResource::collection($users);

        return response()->json($users, 200);
    }

    public function view($id){
        $user = User::find($id);
        if (!$user){
            return response()->json([
                'status' => 'error',
                'data' => []
            ], 404);
        }

        $user = new UserResource($user);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function store(Request $request){

        //Validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        if (!$user){
            return response()->json([
                'status' => 'error'
            ], 404);
        }

         //Validate
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
        $user->save();

        return response()->json($user);
    }   

    public function destroy($id){
        User::destroy($id);
        return response()->json([
            'status' => 'success'
        ]);
    }
}