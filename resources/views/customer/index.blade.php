@extends('layouts.master')
@section('title', 'Index Customer')
@section('content')

    <h1>{{ session('test') }}</h1>
    @if (session('success'))
        <div id="success-alert" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif


    @include('partials.customer.index')


    <script>
        // Wait for the document to load
        document.addEventListener('DOMContentLoaded', function() {
            // Get the success alert element
            var successAlert = document.getElementById('success-alert');

            // Check if the success alert element exists
            if (successAlert) {
                // Hide the success alert after 1.1 seconds
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 1100); // 1100 milliseconds = 1.1 seconds
            }
        });
    </script>


@endsection
