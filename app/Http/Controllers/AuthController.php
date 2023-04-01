<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request) {
        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken(time())->plainTextToken
        ]);
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if(isset($user)) {
            if(Hash::check($request->password, $user->password)) {
                return response()->json([
                    'user' => $user->name,
                    'token' => $user->createToken(time())->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
            ]);
        }
    }

    public function getCategory() {
        return response()->json(['name' => 'This is category']);
    }
}
