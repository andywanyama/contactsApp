@extends('layouts.master')
@section('content')
<h1>Contact List</h1>
<p class="lead">Here's a list of all your contacts. <a href="{{ route('contacts.create') }}">Add New?</a></p>
<hr>
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<table class="table table-bordered table-responsive table-striped">
    <thead>
    <th>ID</th>
    <th>Name</th>
    <th>Number</th>
    <th>Group</th>
    <th>Email Address</th>
    <th>Action</th>
</thead>

<tbody>
    @foreach($contacts as $contact)
    <tr>
        <td>{{$contact->id}}</td>
        <td>{{$contact->name}}</td>
        <td>{{$contact->number}}</td>
        <td>{{$contact->contactgroup_id}}</td>
        <td>{{$contact->email}}</td>
        <td>
            <a class="btn btn-primary" href="{{route('sendmailview',$contact->email)}}">Send mail</a>
            <a class="btn btn-info" href="{{route('contacts.edit',$contact->id)}}">Edit</a>
            <a class="btn btn-danger" href="{{route('contacts.destroy',$contact->id)}}">Delete</a>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
