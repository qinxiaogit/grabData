<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    //
    public function __invoke (){
        echo "hello world";die();
        return redirect()->route('blog');
    }
}
