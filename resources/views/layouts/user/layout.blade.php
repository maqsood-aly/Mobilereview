<!DOCTYPE html>
<html lang="en">
@include('include.user.head')

<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Start Header/Navigation -->
        @include('include.user.navbar')
        <!-- End Header/Navigation -->

        <div class="container mt-5 mb-4 flex-grow-1">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- Start Footer Section -->
        @include('include.user.footer')
        <!-- End Footer Section -->
    </div>
</body>

</html>
