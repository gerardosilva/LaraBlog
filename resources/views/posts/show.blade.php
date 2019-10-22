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
               Created by <a href="/user/{{$post->author->username}}">{{$post->author->name}}</a>
                        at {{$post->created_at->diffForHumans()}}
            </div>
        </div>
    </div>
</div>
@endsection