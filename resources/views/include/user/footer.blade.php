<footer class="footer mt-auto py-3 bg-white text-dark" style="color: #3d3d3d;" >
    {{-- <div class="container-fluid">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5>About Us</h5>
                <p>We provide in-depth reviews and analysis of the latest mobile phones to help you make informed decisions.</p>
            
            </div>
            
            <!-- Contact Information Section -->
            <div class="col-lg-4 col-md-12 mb-4">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li>Email: <a href="mailto:info@mobilereviews.com" class="text-secondary">info@mobilereviews.com</a></li>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <!-- Copyright Notice -->
            <div class="col-12 text-center">
                <p>&copy; 2024 Mobile Reviews. All rights reserved.</p>
                <p><a href="/privacy-policy" class="text-secondary">Privacy Policy</a> | <a href="/terms-of-service" class="text-secondary">Terms of Service</a></p>
            </div>
        </div>
    </div> --}}




    {!! $footer !!}


</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" defer></script>

<script>
    window.addEventListener('load', (event) => {
        // Ensure dropdown menus work on hover and hide when not hovered
        $(document).ready(function() {

            // Add 'show' class on hover to display the dropdown menu
            $('.navbar-nav .dropdown').hover(

                function() {
                    $(this).addClass('show');
                    $(this).find('.dropdown-menu').addClass('show');
                },
                function() {
                    $(this).removeClass('show');
                    $(this).find('.dropdown-menu').removeClass('show');
                }
            );

            // Variable to store the last scroll position
            let lastScrollTop = 0;
            // Handle scroll event
            $(window).on('scroll', function() {
                let scrollTop = $(this).scrollTop();
                if (scrollTop > lastScrollTop) {
                    // Scrolling down: hide the navbar
                    $('.navbar').addClass('navbar-hidden');
                } else {
                    // Scrolling up: show the navbar
                    $('.navbar').removeClass('navbar-hidden');
                }
                lastScrollTop = scrollTop;
            });
        });
    });
</script>
</body>

</html>
