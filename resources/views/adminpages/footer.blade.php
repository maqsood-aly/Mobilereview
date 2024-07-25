<!DOCTYPE html>
@extends('layouts.admin-layout.app')

@section('content')
    <div class="content-wrapper">
        @if (session('success'))
            <div class="alert alert-success" id="successMessage">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.footer') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="footerText">Footer Text</label>
                        <textarea class="form-control" id="footerText" name="footerText" rows="4">
                            @foreach ($footer as $footer)
                               {!! $footer['data'] !!}
                            @endforeach
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@stop

<script src="{{ asset('script.js') }}"></script>
<script src="{{ asset('tinymce/tinymce.min.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Slide up the success message after 4 seconds
        setTimeout(function() {
            $('#successMessage').slideUp();
        }, 3000); // 4000 milliseconds = 4 seconds
    });
</script>
