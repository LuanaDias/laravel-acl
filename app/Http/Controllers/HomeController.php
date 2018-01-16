<?php

namespace App\Http\Controllers;

use App\Http\Request;
use App\Notice;
use Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Notice $postnotice)
    {
        //$posts = $postnotice->all();
        $posts = $postnotice->where('user_id',auth()->user()->id)->get();
        return view('home',compact('posts'));
    }

    public function update($idPost){

        $postnotice = Notice::find($idPost);

       // $postnotice = Notice::find($idPost);
        if(Gate::denies('update-notice',$postnotice))
            abort(403,'Unautorized');

        return view('update-notice',compact('postnotice'));
    }
}
