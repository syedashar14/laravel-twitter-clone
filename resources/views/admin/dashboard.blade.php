@extends('layout.layout')
@section('title', 'Admin Panel')
@include('layout.nav')
@section('content')
<div class="row">
    <div class="col-3">
        @include('admin.shared.left-bar')
    </div>
    <div class="col-9">
        <h1> Admin Dashboard </h1>
    </div>
</div>
@endsection
