@extends('layouts.app')
@section('title','| Contact')
@section('content')

{!! Html::style('css/styles.css') !!}
            <div class="row form-spacing-tt" style="margin-top: 0px;">
                <div class="offset-md-1 col-md-10">
                    <div class="card">
                        <div class="card-header">
                            <center><h5><strong>Contact Us</strong></h5></center>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label name="email"><strong>Email:</strong></label>
                                    <input id="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label name="Subject"><strong>Subject:</strong></label>
                                    <input id="Subject" name="subject" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label name="Message"><strong>Message:</strong></label>
                                    <textarea id="Message" name="message" class="form-control", rows="7"></textarea>
                                </div>
                                <center><input type="submit" value="send message" class="btn btn-success"></center>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
 @endsection   