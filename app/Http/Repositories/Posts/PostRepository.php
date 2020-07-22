<?php 

namespace App\Http\Repositories\Posts;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository {

    /**
     * 
     * get all post pagination
     * 
     */
    public function getAll()
    {
        $posts = Post::with('user:id,name')
                ->orderBy('created_at', 'DESC')
                ->paginate(2);
        return $posts;
    }
    /**
     * 
     * get post with id
     * 
     */
    public function getById($request)
    {
        $post = Post::where('id', $request->post_id)->first();
        return $post;
    }
    /**
     * 
     * create post
     * 
     */
    public function create($request)
    {
        if(isset(Auth::user()->id)){
            $request->merge([
                'user_id' => Auth::user()->id,
                'image' => 'uploads/' . $request->file('img')->store('posts/gallery'),
            ]);
            return Post::create($request->all());
        }else {
            return false;
        }

    }
    /**
     * 
     * update post
     * 
     */
    public function edit($request)
    {
        if(isset(Auth::user()->id)){
            $user_id = Auth::user()->id;
            $request->merge([
                'user_id' => $user_id,
            ]);
            
            if($request->has('img')) {
                $request->merge([
                    'image' => 'uploads/' . $request->file('img')->store('posts/gallery'),
                ]);
            }
            
            $post = Post::where('id',$request->post_id)
                        ->where('user_id', $user_id)
                        ->first();
            return $post ? $post->update($request->all()): false; 
        }else {
            return false;
        }

    }
    /**
     * 
     * delete post
     * 
     */
    public function destroy($request)
    {
        if(isset(Auth::user()->id)){
            $post = Post::where('id', $request->post_id)
                        ->where('user_id', Auth::user()->id)
                        ->first();
        }
                    
        return $post ? $post->delete(): false;
    }
    /**
     * 
     * all user posts
     * 
     */
    public function getUserPosts()
    {
        if(isset(Auth::user()->id)){
            return Post::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(2);
        }
        return false;
    }
    /**
     * 
     * show single post
     * 
     */
    public function showSinglePost($request)
    {
        $post = Post::where('id', $request->post_id)->first();
        
        return $post ? $post : false ;
    }
}