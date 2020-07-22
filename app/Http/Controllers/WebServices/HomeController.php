<?php

namespace App\Http\Controllers\WebServices;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function showPage(Request $request)
    {
        $page = Page::where('id', $request->page_id)->first();
        return view('page.index')->with('page', $page);
    }
}