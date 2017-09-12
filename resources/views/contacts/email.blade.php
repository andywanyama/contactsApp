@extends('layouts.master')

@section('content')

<h1>New Contact Email Message</h1>

<hr>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form action="{{route('sendmail')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
        <label for="email" class="control-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{$email}}">
        <span class="help-block">{{$errors->first('email')}}</span>
    </div>
    <div class="form-group {{$errors->has('emailmsg') ? ' has-error' : ''}}">
        <label for="emailmsg" class="control-label">Message</label>
        <textarea name="emailmsg" id="emailmsg" cols="50" rows="10">

        </textarea>
        <span class="help-block">{{$errors->first('emailmsg')}}</span>
    </div>


    <div class="form-group">
        <input type="submit" value="Send Message" class="btn btn-primary">
    </div>
</form>
@stop