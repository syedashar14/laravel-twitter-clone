@extends('layout.layout')
@section('title', $user->name)
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-bar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        <div class="mt-3">
                <div>@include('users.shared.user-card')</div>
        </div>
        @forelse ($ideas as $idea)
            <div class="mt-3">

                    <div>@include('ideas.shared.idea-card')</div>

            </div>
        @empty
            <p class="text-center mt-4"> No search result </p>
        @endforelse
        <div class="mt-3">
            {{$ideas->withQueryString()->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>
@endsection
