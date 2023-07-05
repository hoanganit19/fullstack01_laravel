<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $checkLogin = Auth::attempt(['email' => $email, 'password' =>
        $password]);

        if ($checkLogin){

            $user = User::whereEmail($email)->first();

            $token = $user->createToken('web_api', ['*'], Carbon::now()->addHours(1))->plainTextToken;

            return response()->json([
                'status' => 'success',
                'accessToken' => $token
            ]);
        }

        return response()->json([
            'status' => 'failed'
        ]);
    }

    public function history(Request $request){
        $user = $request->user();
        $response = [];
        $tokens = $user->tokens()->get();
        return $tokens;
    }

    public function logout(Request $request){
        $user = $request->user();
        $user->currentAccessToken()->delete();
        return response()->json(['status' => 'success']);
    }
}