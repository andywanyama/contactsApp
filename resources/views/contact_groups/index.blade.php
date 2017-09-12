@extends('layouts.master')
@section('content')
<h1>Contact Groups</h1>
<p class="lead">Here's a list of all your contacts groups. <a href="{{ route('contact-groups.create') }}">Add New?</a></p>
<hr>
<table class="table table-bordered table-responsive table-striped">
    <thead>
    <th>ID</th>
    <th>Name</th>
</thead>
<tbody>
    @foreach($groups as $group)
    <tr>
        <td>{{$group->id}}</td>
        <td>{{$group->name}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection