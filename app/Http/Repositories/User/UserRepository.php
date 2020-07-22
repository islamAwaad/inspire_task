<?php 

namespace App\Http\Repositories\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserRepository {

    /**
     * get all users
     * 
     */
    public function getAll()
    {
        return User::paginate(3);
    }
    /**
     * 
     * get single user
     * 
     */
    public function getUser($request)
    {
        $user = User::where('id', $request->user_id)->first();
        return $user ? $user : false ;
    }
    /**
     * 
     * edit user
     * 
     */
    public function edit($request)
    {
        return User::find($request->user_id)->update($request->all());
    }
    /**
     * 
     * delete user
     * 
     */
    public function deleteUser($request)
    {
        $user = User::find($request->user_id)->delete();
        return $user ? $user : false;
    }
    /**
     * 
     * create user
     * 
     */
    public function createUser($request)
    {
        $user = User::create($request->all());
        $role = Role::where('name', 'user')->first();
        $user->roles()->attach($role->id);
        return $user;
    }
}