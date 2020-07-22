<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repositories\Pages\PageRepository;
use App\Http\Requests\Pages\GetPageIdRequest;
use App\Http\Requests\Pages\EditPageRequest;
use App\Http\Requests\Pages\CreatePageRequest;

class PageController extends Controller
{
    /**
     * 
     * list all page in dashboard
     * 
     */
    public function getAll(PageRepository $pageRepository)
    {
        $pages = $pageRepository->getAll();
        return view('dashboard.page.list')->with('pages', $pages);
    }
    /**
     * 
     * show page
     * 
     */
    public function showpage(GetPageIdRequest $request, PageRepository $pageRepository)
    {
        $page = $pageRepository->getById($request);
        return view('dashboard.page.show')->with('page',$page);
    }
    /**
     * 
     * update page
     * 
     */
    public function updatepage(EditPageRequest $request, PageRepository $pageRepository)
    {
        $page = $pageRepository->edit($request);
        if($page) {
            session()->flash('msg', 'page Successfully updated!');
        }
        return redirect()->route('admin.page.list');
    }
    /**
     * 
     * delete page
     * 
     */
    public function delete(GetPageIdRequest $request, PageRepository $pageRepository)
    {
        $delete = $pageRepository->destroy($request);
        if($delete) {
            session()->flash('msg', 'Page Successfully deleted!');
        }
        return redirect()->route('admin.page.list');
    }
    /**
     * 
     * create page page
     * 
     */
    public function createPage()
    {
        return view('dashboard.page.create');
    }
    /**
     * 
     * store page
     * 
     */
    public function storePage(CreatePageRequest $request, PageRepository $pageRepository)
    {
        $page = $pageRepository->create($request);
        if($page) {
            session()->flash('msg', 'Page Successfully Created!');
        }
        return redirect()->route('admin.page.list');
    }
}