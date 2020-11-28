<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthAPIController extends Controller
{
    public function login(StoreLoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            return response(
                [
                    'message' => 'Wrong credentials! Check your email & password.'
                ],
                Response::HTTP_UNAUTHORIZED
            );
        }

        $token = Str::random(80);

        $request->user()->forceFill([
            'api_token' => $token,
        ])->save();

        return response(['token' =>  $token]);
    }

    public function register(StoreRegisterRequest $request)
    {
        $data = $request->validated();
        $token = Str::random(80);

        User::forceCreate(array_merge(
            $data,
            ['password' => Hash::make($data['password']), 'api_token' => $token]
        ));

        return response(['token' =>  $token]);
    }

    public function logout(Request $request)
    {
        $request->user()->forceFill([
            'api_token' => null,
        ])->save();

        return response(['message' =>  'Logout success!']);
    }
}
