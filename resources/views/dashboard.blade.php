@extends('layout.layout')

@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-bar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        @include('shared.share-idea')
        @foreach ($ideas as $idea)
        <div class="mt-3">

                <div>@include('shared.idea-card')</div>

        </div>
        @endforeach
        <div class="mt-3"?>
            {{$ideas->links()}}
        </div>

    </div>
    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>
@endsection
