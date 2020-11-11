@extends('layouts.app')
@section('content')

<h1>Create Post</h1><br><br>
    <form role="form"  method="POST" action="{{route('store')}}">
            
                <div class="form-group">
                    <label for="body">Title:</label>
                    <input class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control" name="body"></textarea>
                </div>
                <input type="file" id="myFile" name="filename">
                <button type="submit" class="btn btn-primary">Submit</button>
    </form>
     {{-- {!! Form::open(['action' => ['PostController@store', $post->id], 'method' => 'POST', 'enctype' => 'multipart/data'])!!}
            <div class="form-group">
                {{form::label('title', 'Title')}}
                {{form::text('title', ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{form::label('body', 'Body')}}
                {{form::textarea('body',['class' => 'form-control'])}}
            </div>
            {{-- {{form::hidden('_method', 'PUT')}}<!--This is done because laravel does not allow us to use a Post request for update--> 
            <div class="form-group">
            {{Form::file('cover_image')}}
            </div>
            {{form::submit('submit',['class' =>'btn btn-primary'])}}

        
        {!! Form::close() !!}--} --}}

@endsection