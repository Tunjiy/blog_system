@extends('layouts.app')
@section('content')
<h1>posts</h1><br><br>
@if(count($posts) > 0)
    <div class="card" style="border-radius:13px; padding:10px;">
        @foreach ($posts as $post )
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h1><a href="posts/{{$post->id}}">{{$post->title}}</a></h1>
                    <small>{{$post->created_at}}</small>
                </li>
            
        @endforeach
            </ul>
    </div> 
@else

@endif

@endsection
