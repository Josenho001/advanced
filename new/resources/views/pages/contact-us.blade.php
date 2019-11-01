@extends('main')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <div class="offset-md-1 col-md-10">
                   
                    <form action="{{ url('contact') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <strong><label name="email"><strong>Email:</strong></label></strong>
                            <input id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <strong><label name="Subject"><b>Subject:</b></label></strong>
                            <input id="Subject" name="subject" class="form-control">
                        </div>
                        <div class="form-group">
                           <strong><label name="Message"><b>Message:</b></label></strong>
                            <textarea id="Message" name="message" class="form-control", rows="10"></textarea>
                        </div>
                        <center><input type="submit" value="send message" class="btn btn-success"></center>
                    </form>
                </div>
        </div>
    </div>
@endsection