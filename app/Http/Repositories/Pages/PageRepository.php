<?php 

namespace App\Http\Repositories\Pages;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;
class PageRepository {
     /**
     * 
     * get all pages pagination
     * 
     */
    public function getAll()
    {
        $pages = Page::orderBy('created_at', 'DESC')
                ->paginate(2);
        return $pages;
    }
    /**
     * 
     * get page with id
     * 
     */
    public function getById($request)
    {
        $page = Page::where('id', $request->page_id)->first();
        return $page;
    }
    /**
     * 
     * create page
     * 
     */
    public function create($request)
    {
        if(isset(Auth::user()->id)){
            $request->merge([
                'user_id' => Auth::user()->id,
            ]);
            return Page::create($request->all());
        }else {
            return false;
        }

    }
    /**
     * 
     * update page
     * 
     */
    public function edit($request)
    {
        if(isset(Auth::user()->id)){
            $request->merge([
                'user_id' => Auth::user()->id,
            ]);

            $page = Page::find($request->page_id);
            return $page ? $page->update($request->all()): false; 
        }else {
            return false;
        }

    }
    /**
     * 
     * delete page
     * 
     */
    public function destroy($request)
    {
        if(isset(Auth::user()->id)){
            $page = Page::where('id', $request->page_id);
            if(Auth::user()->roles->first()->name == "admin"){
                $page->where('user_id', Auth::user()->id);
            }
            $page = $page->first();
        }
                    
        return $page ? $page->delete(): false;
    }
}