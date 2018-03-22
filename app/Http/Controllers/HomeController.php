<?php

namespace App\Http\Controllers;

use App\Events\ElkLogEvent;
use Illuminate\Http\Request;
use App\Model\Book;
use App\Model\Log;
use Illuminate\Support\Facades\Event;

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
        return view('serach');
    }
    public function elk(){
//        $a = Book::createIndex();
//         $books = Book::search('Moby Dick');
        $books = Book::where('id', '=', 200)->get();
        dd($books);
//         dd($books->addToIndex());
    }
    public function event(Request $request){

        $log = new Log;
        $log->ip = $request->server('REMOTE_ADDR');
        $log->context = $request->input('context','');
        $log->title = $request->input('title','');
        $log->save();
        Event::fire(new ElkLogEvent($log));
        echo "aaa";
    }

}
