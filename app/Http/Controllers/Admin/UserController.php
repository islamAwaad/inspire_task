<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repositories\User\UserRepository;
use App\Http\Requests\Admin\User\EditUserRequest;
use App\Http\Requests\Admin\User\DeleteUserRequest;
use App\Http\Requests\User\Auth\RegisterRequest;
use App\Http\Repositories\User\AuthRepository;

class UserController extends Controller
{
    /**
     * 
     * list all users
     * 
     */
    public function getAllPaginate(UserRepository $userRepository) 
    {
        $users = $userRepository->getAll();
        return view('dashboard.user.list')->with('users',$users);
    }
    /**
     * 
     * show single user in edit page
     * 
     */
    public function showUser(Request $request, UserRepository $userRepository)
    {
        $user = $userRepository->getUser($request);
        if($user)
            return view('dashboard.user.show')->with('user',$user);
        else
            return redirect()->route('user.list');
    }
    /**
     * 
     * edit user
     * 
     */
    public function updateUser(EditUserRequest $request, UserRepository $userRepository)
    {
        $user = $userRepository->edit($request);
        if($user) {
            session()->flash('msg', 'User Successfully updated!');
        }
        return redirect()->route('user.list');
    }
    /**
     * 
     * delete user
     * 
     */
    public function delete(DeleteUserRequest $request, UserRepository $userRepository)
    {
        $delete = $userRepository->deleteUser($request);
        if($delete) {
            session()->flash('msg', 'User Successfully Deleted!');
        }
        return redirect()->route('user.list');
    }
    /**
     * 
     * user create page
     * 
     */
    public function createPage()
    {
        return view('dashboard.user.create');
    }
    /**
     * 
     * create user form dashboard
     * 
     */
    public function store(RegisterRequest $request, AuthRepository $authRepository)
    {
        $user = $authRepository->createUser($request);
        if($user) {
            session()->flash('msg', 'User Successfully Created User!');
        }
        return redirect()->route('user.list');
    }
}