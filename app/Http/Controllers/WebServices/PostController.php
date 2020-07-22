<?php

namespace App\Http\Controllers\WebServices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\DeletePostRequest;
use App\Http\Repositories\Posts\PostRepository;

class PostController extends Controller
{
    /**
     * 
     * get All posts paginate
     * 
     */
    public function getAllPaginate(PostRepository $postRepository)
    {
        $posts = $postRepository->getAll();
        return view('/home')->with('posts', $posts);
    }
    /**
     * 
     * get post by id
     * 
     */
    public function get(GetPostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->getById($request);
        return view('web.post')->with('post', $post);
    }
    /**
     * 
     * create post
     * 
     */
    public function store(CreatePostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->create($request);
        if($post) {
            session()->flash('msg', 'Post Successfully created');
        }
        return redirect()->route('home');
        
    }
    /**
     * 
     * update post
     * 
     */
    public function update(EditPostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->edit($request);
        if($post) {
            session()->flash('msg', 'Post Successfully updated');
        }
        return redirect()->route('home');
    }
    /**
     * 
     * delete post
     * 
     */
    public function deletePost(DeletePostRequest $request, PostRepository $postRepository)
    {
        $post = $postRepository->destroy($request);
        if($post) {
            session()->flash('msg', 'Post Successfully deleted!');
        }
        return redirect()->route('post.user');
    }
    /**
     * 
     * create index
     * 
     */
    public function createPage()
    {
        if(isset(Auth::user()->id)){

            return view('posts.create');
        }
        
        return redirect()->route('home');
    }
    /**
     * 
     * user posts
     * 
     */
    public function userPosts(PostRepository $postRepository)
    {
        $posts = $postRepository->getUserPosts();
        if($posts){
            return view('posts.list')->with('posts', $posts);
        }
        return redirect()->route('home');
    }
    /**
     * 
     * show post
     * 
     */
    public function showPost(Request $request, PostRepository $postRepository)
    {
        $post = $postRepository->showSinglePost($request);

        if($post)
            return view('posts.show')->with('post', $post);
        else
        return redirect()->route('home');
    }
}