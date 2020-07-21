<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\User\AuthRepository;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Requests\User\Auth\LoginRequest;

class AuthController extends Controller
{
    /**
     * 
     * register
     * 
     */
    public function signup(RegisterRequest $request, AuthRepository $authRepository)
    {
        $createUser = $authRepository->createUser($request);
        return response()->json(['data' =>'Sginup success'], 200);
    }
    /**
     * 
     * login
     * 
     */
    public function login(LoginRequest $request, AuthRepository $authRepository)
    {
        $login = $authRepository->sginin($request);
        if(!$login) {
            return response()->json(['data' => 'your email or password is incorrect'], 400);
        }
        return response()->json(['data' =>'you\'re successfuly loged in'], 200);
    }
    /**
     * 
     * logout
     * 
     */
    public function logout(AuthRepository $authRepository)
    {
        $authRepository->sginout();
        return response()->json(['data' => 'Successfully loged out'], 200);
    }
}
