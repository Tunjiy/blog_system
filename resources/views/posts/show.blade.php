@extends('layouts.app')
@section('content')
    <a href="/posts" class="btn btn-default">Go back</a>
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p><hr> 
    <small>written on {{$post->created_at}}</small><br>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user->id)
            <a href="{{$post->id}}/edit" class="btn btn-primary">edit</a>
            {{-- delete form --}}
            <form role="form"  method="POST" action="{{route('destroy',$post->id)}}" class="float-right">
                    @csrf
                    {{method_field('DELETE')}}
            <button type="submit" name="destroy" class="btn btn-danger">Delete</button>
            </form>
        @endif
    @endif
    {{-- <small>written on {{$post['created_at']->diffForHumans()}}</small> this show time in different ways --}}
@endsection
