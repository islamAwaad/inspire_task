<?php 

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class AuthRepository {

    /**
     * 
     * create user and sgin him in
     * 
     */
    public function createUser($request)
    {
        $user = User::create($request->all());
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role->id);
        Auth::guard('web')->login($user);
        return $user;
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
                Auth::guard('web')->login($user);
                return $user;
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
    /**
     * 
     * check login status
     * 
     */
        public function checkIfLoged() {
            $user = Auth::user();
            if($user) {
                return true;
            }
            return false;
        }
}