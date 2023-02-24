<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExamsDetailResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string|max:200',
            'password' => 'required',
        ]);

        if (!Auth::attempt(
            $request->only('email', 'password')
        )) {
            return response()
                ->json([
                    'message' => 'Email atau password mungkin salah!'
                ], 404);
        }

        $user = User::where('email', $request->email) -> firstOrFail();

        $token = $user -> createToken('auth-sanctum') -> plainTextToken ;

        return response() -> json([
            'access_token' => $token,
            'code' => '200',
            'message' => 'Selamat datang '.$user->name,
            'data' =>  $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil.']);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }
}
