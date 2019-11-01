
@extends('main')
@section('title','| Contact')
@section('content')
            <div class="row">
                <div class="offset-md-1 col-md-10">
                    <h1>Contact Me</h1>
                    <hr>
                    <form action="{{ url('contact') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label name="email">Email:</label>
                            <input id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="Subject">Subject:</label>
                            <input id="Subject" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                            <label name="Message">Message:</label>
                            <textarea id="Message" name="message" class="form-control", rows="10"></textarea>
                        </div>
                        <center><input type="submit" value="send message" class="btn btn-success"></center>
                    </form>
                </div>
            </div>
    @endsection   