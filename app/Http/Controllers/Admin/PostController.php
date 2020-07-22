<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\GetPostRequest;
use App\Http\Repositories\Posts\PostRepository;
use App\Http\Requests\Posts\EditPostRequest;
use App\Http\Requests\Posts\DeletePostRequest;
use App\Http\Requests\Posts\CreatePostRequest;



class PostController extends Controller
{
    /**
     * 
     * list all post in dashboard
     * 
     */
    public function getAll(PostRepository $postRepository)
    {
        $posts = $postRepository->getAll();
        return view('dashboard.post.list')->with('posts', $posts);
    }
    /**
     * 
     * show post
     * 
     */
    public function showPost(GetPostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->getById($request);
        return view('dashboard.post.show')->with('post',$post);
    }
    /**
     * 
     * update post
     * 
     */
    public function updatePost(EditPostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->edit($request);
        if($post) {
            session()->flash('msg', 'Post Successfully updated!');
        }
        return redirect()->route('admin.post.list');
    }
    /**
     * 
     * delete post
     * 
     */
    public function delete(DeletePostRequest $request, PostRepository $postRepository)
    {
        $delete = $postRepository->destroy($request);
        if($delete) {
            session()->flash('msg', 'Post Successfully deleted!');
        }
        return redirect()->route('admin.post.list');
    }
    /**
     * 
     * create post page
     * 
     */
    public function createPage()
    {
        return view('dashboard.post.create');
    }
    /**
     * 
     * store post
     * 
     */
    public function storePost(CreatePostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->create($request);
        if($post) {
            session()->flash('msg', 'Post Successfully Created!');
        }
        return redirect()->route('admin.post.list');
    }
}