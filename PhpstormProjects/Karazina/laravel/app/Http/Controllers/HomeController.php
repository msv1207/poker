<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $post=New Post();
        $post->name=$request->name;
        $post->description=$request->description;
        $post->save();
        return $this->index();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post=Post::all();
        return view('home', ['post'=>($post)]);
    }

    public function destroy( $post)
    {
    Post::destroy($post);
    return redirect('home');
    }
}
