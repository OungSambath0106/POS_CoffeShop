@extends('layouts.master')
@section('title', 'Hidden')
@section('content')

    <h1>{{ session('test') }}</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @include('partials.customer.hidden')

@endsection
