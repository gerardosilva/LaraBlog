<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    try {
            $slug = Str::slug(request('title'), '-');
            Post::create([
                'title' => request('title'),
                'body' => request('body'),
                'slug' => $slug,
                'author_id' => auth()->id(),
            ]);

            return redirect("/posts")->with([
                'status' => 'success',
                'message' => 'Your post was published successfully',
            ]);
    } catch (Exception $e) {
            return redirect("/post/create")->with([
                'status' => 'danger',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id); 
       return view('posts.edit', ['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::find(request('id'));
        $post->title = request('title');
        $post->body = request('body');
        $slug = Str::slug(request('title'), '-');
        $post->slug = $slug;
        $post->save();

        return redirect("/posts")->with([
            'status' => 'success',
            'message' => 'Your post was edited successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $post = Post::find(request('id'));
         $post->delete();

         return redirect("/posts")->with([
            'status' => 'success',
            'message' => 'Your post was deleted successfully',
        ]);
    }
}
