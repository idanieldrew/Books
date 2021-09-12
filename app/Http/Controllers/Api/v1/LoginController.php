<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\LoginRequest;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function Login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();

        if(!$user || Hash::check($request->password, $user->password)){
            return response([
                'message' => 'incorrect'
            ],401); 
        }

        $token = $user->createToken('token')->plainTextToken;

        return response([
            'message' => 'correct',
            'user' => $user,
            'token' => $token
        ],201); 
    }
}
