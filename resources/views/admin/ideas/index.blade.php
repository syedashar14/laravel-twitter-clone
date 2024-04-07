@extends('layout.layout')
@section('title', 'Ideas | Admin Panel')
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-bar')
    </div>
    <div class="col-9">
        <h1> Ideas </h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>USER</th>
                    <th>CONTENT</th>
                    <th>CREATED AT</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ideas as $idea)
                <tr>
                    <td> {{$idea->id }}</td>
                    <td> <a href="{{route('users.show', $idea->user)}}"> {{$idea->user->name}} </a></td>
                    <td> {{$idea->content}} </td>
                    <td> {{$idea->created_at->toDateString()}} </td>
                    <td> <a href="{{route('ideas.show', $idea)}}"> View </a> </td>
                    <td> <a href="{{route('ideas.edit', $idea)}}"> Edit </a> </td>
                </tr>
                @endforeach
            <tbody>
        </table>
        <div>
            {{$ideas->links()}}
        </div>
    </div>
</div>
@endsection
