<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function elk(){
//        $a = Book::createIndex();
//         $books = Book::search('Moby Dick');
        $books = Book::where('id', '<', 200)->get();
         dd($books->addToIndex());
    }
}
