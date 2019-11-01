@extends('main')

@section('content')

{!! Html::style('css/styles.css') !!}
            <div class="form-spacing-t">
                <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary btn-block ">Create Blog</a>
            </div>
       
        <div class="container ">
            <div class="row">
                <div class="col-md-12">
                    <div class="card form-spacing-tt">
                        <h3><strong><center>All Posts</center></strong></h3>

                    </div>
                </div>

            </div>
        </div>
@endsection
