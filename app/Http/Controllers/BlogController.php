<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private $blogService ;
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index(Request $request){

        $data['article'] = $this->blogService->index();
        dd($data);
        \Debugbar::info($data);
        return view('blog.welcome',$data);
    }
}
