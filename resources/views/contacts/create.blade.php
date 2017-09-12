@extends('layouts.master')

@section('content')
@if($contact)
<h1>Edit Contact</h1>
@else
<h1>Add a New Contact</h1>
<p class="lead">Add to your contact below.</p>
@endif


<hr>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<form action="{{ $contact != '' ? route('contacts.update',$contact->id) : route('contacts.store')}}" method="{{$contact != null ? 'PATCH' : 'POST'}}">
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('name') ? ' has-error' : ''}}">
        <label for="name" class="control-label">Contact Name</label>
        <input type="text" id="name" name="name" class="form-control" value="{{$contact != null ? $contact->name :''}}">
        <span class="help-block">{{$errors->first('name')}}</span>
    </div>
    <div class="form-group {{$errors->has('number') ? ' has-error' : ''}}">
        <label for="number" class="control-label">Number</label>
        <input type="text" id="number" name="number" class="form-control" value="{{$contact != null ? $contact->number :''}}">
        <span class="help-block">{{$errors->first('number')}}</span>
    </div>
    <div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
        <label for="email" class="control-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{$contact != null ? $contact->email :''}}">
        <span class="help-block">{{$errors->first('email')}}</span>
    </div>

    <div class="form-group {{$errors->has('group') ? ' has-error' : ''}}">
        <label for="contactgroup_id" class="control-label">Select Group</label>
        <select name="contactgroup_id">
            @foreach($groups as $group)
            <option value="{{$group->id}}" {{$contact != null && $contact->contactgroup_id == $group->id ? ' selected' :''}}>{{$group->name}}</option>
            @endforeach
        </select>
        <span class="help-block">{{$errors->first('group')}}</span>
    </div>
    <div class="form-group">
        <input type="submit" value="{{$contact != null ? 'Update Contact' :'Create New Contact'}}" class="btn btn-primary">
    </div>
</form>
@stop