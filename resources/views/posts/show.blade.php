@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2> {{$post->title}}</h2>
            <article>
                {{$post->body}}
            </article>
            <div>
               Created by <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a>
                        at {{$post->created_at->diffForHumans()}}
            </div>
            <div>
                @if ( Auth::user()->id == $post->author_id)   
                        <div><a href="/post/{{$post->id}}/edit">Edit</a></div>
                        <div><a href="/post/{{$post->id}}/delete">Delete</a></div>   
                     @endif 
            </div>
        </div>
    </div>
</div>
@endsection