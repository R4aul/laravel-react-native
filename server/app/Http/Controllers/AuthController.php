<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

use function Laravel\Prompts\password;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => ['required'],
            'email' => ['required', 'unique:users'],
            'password' => ['required']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'user created success'
        ]);

    }

    public function login(Request $request){

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'no auth'
            ]);
        }

        $user = User::where('email', $request->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        $data = [
            'user' => $user,
            'accessToken' => $token,
        ];

        return response()->json($data);


    }

    public function logout(){

        $user = Auth::user();

        $user->tokens()->delete();

        return response()->json([
            'message' => 'logout success'
        ], 200);

    }
}
