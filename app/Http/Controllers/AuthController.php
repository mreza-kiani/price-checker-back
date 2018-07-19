<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use App\Utils\ResponseGenerator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterFormRequest $request) {
        $user = User::create([
            "name" => $request->get('name'),
            "email" => $request->get('email'),
            "password" => bcrypt($request->get('password')),
        ]);
        return response()->json(ResponseGenerator::make($user, 'auth.register_successful'));
    }

    public function login(LoginFormRequest $request) {
        $credentials = $request->only('email', 'password');
        if ( ! $token = JWTAuth::attempt($credentials)) {
            return response()->json(ResponseGenerator::make([], 'auth.login_failed'), 400);
        }
        return response()->json(ResponseGenerator::make(["token" => $token], 'auth.login_successful'));
    }

    public function refresh()
    {
        return response()->json(ResponseGenerator::make([], 'auth.token_refreshed'));
    }
}
