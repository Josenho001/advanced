@extends('main')
@section('title','| Homepage')
@section('content')
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                      <h1 class="display-4">Welcome to My Blog</h1>
                      <p class="lead">Thank you for visiting. This is my website built with Laravel. Read my popular</p>
                      <a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    @foreach($posts as $post)

                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0,300) }}{{strlen(strip_tags($post->body)) > 300 ? "...": ""}}</p>
                        <p><a class="btn btn-primary" href="{{ url('blog/'.$post->slug) }}">Read More</a></p>
                    </div>
                    <hr>   
                    @endforeach                 
                </div>
                <div class="col-md-3 col-md-offset-1">
                    <h2>Sidebar</h2>
                </div>
            </div>
@endsection