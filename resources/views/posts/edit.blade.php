@extends('layouts.app')
    <!--blade template used to avoid repitition of <!doctype html.....>-->
@section('content')
        <h1 style="margin-top:60px;">Edit Post</h1>
        <form role="form"  method="POST" action="{{route('update',$post->id)}}">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="body">Title:</label>
                <input class="form-control" name="title" value="{{$post->title}}">
            </div>
            
            <div class="form-group">
                <label for="body">Body:</label>
                <textarea name="body" class="form-control">{{$post->body}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        {{--{!! Form::open(['action' => ['PostController@update', $post->id], 'method' => 'POST']) !!}
            <div class="form-group">
                {{form::label('title', 'Title')}}
                {{form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'title', 'value' => '$post->title'])}}
            </div>
            <div class="form-group">
                {{form::label('body', 'Body')}}
                {{form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'body text', 'value' => '$post->body'])}}
            </div>
            {{form::hidden('_method', 'PUT')}}<!--This is done because laravel does not allow us to use a Post request for update-->
            {{form::submit('submit',['class' =>'btn btn-primary'])}}

        
        {!! Form::close() !!}--}}
@endsection  