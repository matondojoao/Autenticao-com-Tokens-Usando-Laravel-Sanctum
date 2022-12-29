<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|string',
            'password'=>'required'
        ]);
       try {
          $userData=([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
          ]);
        $user= User::create($userData);
        return response()->json([
            'Error'=>'Usuario Registrado com sucesso'
        ],500);

       } catch (\Throwable $th) {
          return response()->json([
            'Error'=>$th->getMessage()
          ],500);
       }
    }
}
