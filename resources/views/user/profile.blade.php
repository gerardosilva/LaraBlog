@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="col-md-12">
                <h1 class="text-center"> {{$user->name}} <span class="badge badge-secondary">{{$user->username}}</span></h1>
            </div>
            <div class="col-md-6">
                <h2 class="text-center mt-3 mb-3"> Lastests Posts</h1>
                @foreach ($posts as $post)
                 <div class="card mt-1 mb-3 w-100">
                    <div class="card-header text-center"><h2>{{$post->title}}</h2></div>

                    <div class="card-body text-center">
                        {{ substr(strip_tags($post->body), 0, 50) }}...
                        <a href="/post/{{$post->slug}}"> Read More</a>
                    </div>
                        @if ( Auth::user()->id == $post->author_id) 

                            <div class="card-footer text-center">
                                <a href="/post/{{$post->id}}/edit">Edit</a>
                                <a href="/post/{{$post->id}}/delete">Delete</a>
                            </div>   
                        @endif        
                    </div>
                @endforeach
            </div>
            <div class="col-md-6">
                 <h2 class="text-center mt-3 mb-3"> Lastests Tweets</h1>
            </div>    
        </div>
    </div>
</div>
@endsection