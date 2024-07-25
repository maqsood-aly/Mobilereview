<!DOCTYPE html>
@extends('layouts.admin-layout.app')
@section('content')
    <!-- partial -->
    <div class="content-wrapper">
        @if (session('success'))
        <div class="alert alert-success" id="successMessage">
            {{ session('success') }}
        </div>
    @endif
        <div class="card p-2 mt-2">
         
            <form action="{{ route('welcome.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="welcome_text" class="mb-2">Edit welcome section </label>
                <textarea id="welcome_section" name="welcome_section" rows="10" cols="50" id="editor1"
                    class="form-control mt-2">

                {!! $welcome !!}

                </textarea>
                <button type="submit" class="btn btn-gradient-success my-2">Save</button>
            </form>
        </div>



        <div class="card p-2 mt-2">
            <form action="" method="post">
                @csrf
                <label for="featured_review" class="mt-4">Number of Featured Review products</label>

                <input type="number" name="featured_review" id="featured_review" class="form-control mt-2">
                <button type="submit" class="btn btn-gradient-success my-2">Save</button>
            </form>
        </div>


        <div class="card p-2 mt-2">
            <form action="" method="post">
                @csrf
                <label for="latest_review" class="mt-4">Number of Latest Review products</label>

                <input type="number" name="latest_review" id="latest_review" class="form-control mt-2">
                <button type="submit" class="btn btn-gradient-success my-2">Save</button>
            </form>
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
