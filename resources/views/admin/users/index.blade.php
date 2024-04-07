@extends('layout.layout')
@section('title', 'Users | Admin Panel')
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-bar')
    </div>
    <div class="col-9">
        <h1> Users </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>JOINED AT</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td> {{$user->id }}</td>
                    <td> {{$user->name}} </td>
                    <td> {{$user->email}} </td>
                    <td> {{$user->created_at}} </td>
                    <td> <a href="{{route('users.show', $user)}}"> View </a> </td>
                    <td> <a href="{{route('users.edit', $user)}}"> Edit </a> </td>
                </tr>
                @endforeach
            <tbody>
        </table>
        <div>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection
