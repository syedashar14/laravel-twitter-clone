@extends('layout.layout')
@section('title', 'Ideas | Admin Panel')
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-bar')
    </div>
    <div class="col-9">
        <h1> Comments </h1>
        @include('shared.success-message')
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>CONTENT</th>
                    <th>USER</th>
                    <th>CREATED AT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                <tr>
                    <td> {{$comment->id }}</td>
                    <td> <a href="{{route('ideas.show', $comment->idea_id)}}"> {{$comment->content}} </a> </td>
                    <td> <a href="{{route('users.show', $comment->user_id)}}"> {{$comment->user->name}} </a> </td>
                    <td> {{$comment->created_at->toDateString()}} </td>
                    <td>
                        <form method="POST" action="{{route('admin.comments.destroy', $comment->id)}}">
                            @csrf
                            @method('delete')
                        <a href="#" onclick="this.closest('form').submit(); return false;"> Delete </a>
                        </form>
                    </td>

                </tr>
                @endforeach
            <tbody>
        </table>
        <div>
            {{$comments->links()}}
        </div>
    </div>
</div>
@endsection
