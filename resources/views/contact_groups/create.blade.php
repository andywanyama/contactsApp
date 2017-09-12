@extends('layouts.master')

@section('content')

<h1>New Contact Group</h1>
<p class="lead">Add to your contact group below.</p>

<hr>

<form action="{{route('contact-groups.store')}}" method="POST">
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
        <label for="name" class="control-label">Group Name</label>
        <input type="text" id="name" name="name" class="form-control">
        <span class="help-block">{{$errors->first('name')}}</span>
    </div>
    <div class="form-group">
        <input type="submit" value="Create New Group" class="btn btn-primary">
    </div>
</form>
@stop