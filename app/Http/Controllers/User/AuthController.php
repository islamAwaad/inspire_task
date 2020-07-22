<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\User\AuthRepository;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Requests\User\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    /**
     * 
     * register
     * 
     */
    public function store(RegisterRequest $request, AuthRepository $authRepository)
    {
        $user = $authRepository->createUser($request);
        return redirect('/home');
    }
    /**
     * 
     * register
     * 
     */
    public function register(AuthRepository $authRepository)
    {
        $loginStatus = $authRepository->checkIfLoged();
        if($loginStatus) {
            return redirect('/home');
        }
        return view('auth.register');
    }
    /**
     * 
     * login page
     * 
     */
    public function login(AuthRepository $authRepository)
    {
        $loginStatus = $authRepository->checkIfLoged();
        if($loginStatus) {
            return redirect('/home');
        }
        return view('auth.login');
    }
    /**
     * 
     * login
     * 
     */
    public function sginIn(LoginRequest $request, AuthRepository $authRepository)
    {
        $user = $authRepository->sginin($request);
        if($user) {
            return redirect('/home');
        }
        session()->flash('err', 'Email Or Password is incorrect!');
        return view('auth.login');
    }
    /**
     * 
     * logout
     * 
     */
    public function logout(AuthRepository $authRepository)
    {
        $authRepository->sginout();
        return redirect('/home');
    }
}