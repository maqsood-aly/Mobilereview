<!DOCTYPE html>
@extends('layouts.admin-layout.app')
@section('content')
    <div class="content-wrapper">
        <!-- Success and Error Messages -->
        @if (session('status'))
            <div class="alert alert-success alert-dismissible" id="status-message">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible" id="error-message">
                {{ session('error') }}
            </div>
        @endif

        <div class="card p-2">
            <form action="{{ route('add.price.range') }}" method="post">
                @csrf
                <label for="price_range">Enter new Price range</label>
                <input type="text" id="price_range" name="price_range" placeholder="Enter new price"
                    class="form-control mt-2">
                <br>
                <button type="submit" class="btn btn-gradient-success me-2">Save</button>
            </form>
        </div>
        <br>
        <div class="card p-2">
            <form action="{{ route('add.new.brand') }}" method="post">
                @csrf
                <label for="brand">Add new Brand</label>
                <input type="text" id="brand" name="brand" placeholder="Create new Brand"
                    class="form-control mt-2">
                <br>
                <button type="submit" class="btn btn-gradient-success me-2">Save</button>
            </form>
        </div>
    </div>
@stop


<!-- Include jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Check if status message exists and slide up after 3 seconds
        if ($('#status-message').length) {
            setTimeout(function() {
                $('#status-message').slideUp('slow');
            }, 3000);
        }

        // Check if error message exists and slide up after 3 seconds
        if ($('#error-message').length) {
            setTimeout(function() {
                $('#error-message').slideUp('slow');
            }, 3000);
        }
    });
</script>
