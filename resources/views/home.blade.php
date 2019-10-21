@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($posts as $post)
                 <div class="card">
                    <div class="card-header text-center"><h2>{{$post->title}}</h2></div>

                    <div class="card-body text-center">
                        {{ substr(strip_tags($post->body), 0, 50) }}
                        <a href="{{$post->slug}}"> Read More</a>
                    </div>
                    <div class="card-footer text-center">
                    Created by <a href="{{$post->author->username}}">{{$post->author->name}}</a>
                        at {{$post->created_at->diffForHumans()}}
                    </div>        
                </div>
            </div>
            @endforeach
           {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
