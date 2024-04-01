@extends('layout.layout')
@section('title', 'View Idea')
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-bar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        <div class="mt-3">
                <div>@include('ideas.shared.idea-card')</div>
        </div>

    </div>
    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>
@endsection
