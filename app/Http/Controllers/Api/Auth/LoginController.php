<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email|string',
            'password'=>'required'
        ]);

        $credentials=$request->only('email','password');

        if(!$Auth=Auth()->attempt($credentials)){
           return response()->json([
            'Error'=>'Falha ao tentar logar'
           ],401);
        }
        $token=Auth()->user()->createToken('auth_token');
        return response()->json([
            'token'=>$token->plainTextToken
           ],200);
    }
    public function logout()
    {
        $token=Auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'msg'=>'Logout feito com sucesso.'
           ],401);
    }
}
