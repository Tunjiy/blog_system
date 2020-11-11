@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="posts/create" class="btn btn-primary">create post</a>
                   <h3>Your blog post</h3>
                   @if(count($post)>0)
                   <table class='table table-stripped'>
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach ($post as $posts)
                            <tr>
                                <th>{{$posts->title}}</th>
                                <th>{{$posts->created_at}}</th>
                                <th><a href="posts/{{$posts->id}}/edit" class="btn btn-primary">edit</a></th>
                            </tr>
                        @endforeach
                   </table>
                   @else
                   <p>You have no post</p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
