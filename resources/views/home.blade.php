@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($posts as $post)
                 <div class="card mt-1 mb-3 w-100">
                    <div class="card-header text-center"><h2>{{$post->title}}</h2></div>

                    <div class="card-body text-center">
                        {{ substr(strip_tags($post->body), 0, 50) }}...
                        <a href="/post/{{$post->slug}}"> Read More</a>
                    </div>
                    <div class="card-footer text-center">
                    Created by <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a>
                        at {{$post->created_at->diffForHumans()}}
                     
                     @if ( Auth::user()->id == $post->author_id)   
                        <div><a href="/post/{{$post->id}}/edit">Edit</a></div>   
                     @endif   
                    </div>        
                </div>
            @endforeach           
        </div>
        <div class="col-md-12 justify-content-center"> 
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
