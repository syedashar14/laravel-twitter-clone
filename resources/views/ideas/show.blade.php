@extends('layout.layout')

@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-bar')
    </div>
    <div class="col-6">
        @include('shared.success-message')
        <div class="mt-3">
                <div>@include('shared.idea-card')</div>
        </div>

    </div>
    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>
@endsection
