@extends('layouts.app')
    @section('content')
        {{-- passing value to a page with d help of blade,the value was passed in the controller --}}
        <div class="card">
            <div class='container'>
                <h1>{{$title}}</h1>
                <p>This is the welcome page</p><br>
                <p>Please register to create post</p>
            </div>
        </div>
    @endsection    
