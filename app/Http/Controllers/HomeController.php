<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3)->withPath('/posts/');
        return view('home', ['posts' => $posts]);
    }

    public function page($page){
        $posts = Post::latest()->paginate(3)->withPath('/posts/');
        return view('home', ['posts' => $posts]);
    }
}
