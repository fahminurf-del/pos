@extends('layouts.app')
@section('content_title', 'Dashboard')
@section('content')
<div class="body">
    <div class="card-body">
        Welcome, <strong class="capitalize">{{ auth()->user()->name }}</strong>
    </div>
</div>
@endsection