<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\User\AuthRepository;
use App\Http\Requests\User\Auth\LoginRequest;

class AuthController extends Controller
{
   /**
     * 
     * login page
     * 
     */
    public function login(AuthRepository $authRepository)
    {
        $loginStatus = $authRepository->checkIfLoged();
        if($loginStatus) {
            return redirect('/admin/home');
        }
        return view('dashboard.login');
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
            return redirect('/admin/home');
        }
        session()->flash('err', 'Email Or Password is incorrect!');
        return view('dashboard.login');
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