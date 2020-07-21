<?php 

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepository {

    /**
     * 
     * create user and sgin him in
     * 
     */
    public function createUser($request)
    {
        $user = User::create($request->all());
        Auth::guard('web')->login($user);
        return true;
    }
    /**
     * 
     * user sginin
     * 
     */
    public function sginin($request)
    {
        $user = User::where('email', $request->email)->first();
        if($user) {
            $check = Hash::check($request->password, $user->password);
            if($check) {
                Auth::gaurd('web')->login($user);
                return true;
            }
            return  false;
        }
    }
    /**
     * 
     * logout
     * 
     */
    public function sginout()
    {
        Auth::logout();
        return true;
    }
}