<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">Product Detail</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.home') }}">Home</a>
                </li>
                <!-- Filter by Price -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPrice" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By Price
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownPrice">
                        <!-- Adjusted to show prices dynamically -->
                        @foreach ($prices as $item)
                            <a class="dropdown-item" href="{{ route('sort.price', ['price' => $item['price']]) }}">
                                Under {{ $item['price'] }} PKR
                            </a>
                        @endforeach
                    </div>
                </li>
                <!-- Filter by Brand -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBrand" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filter By Brand
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownBrand">
                        <!-- Adjusted to show brands dynamically -->
                        @foreach ($brands as $brand)
                            <a class="dropdown-item" href="{{ route('sort.brand', ['brand' => $brand['name']]) }}">
                                {{ $brand['name'] }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <!-- Compare Devices -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('compare.devices') }}">Compare Devices</a>
                </li>
            </ul>

            <!-- Search form for desktop -->
            <form class="form-inline my-2 my-lg-0 ml-auto">
                <div class="position-relative">
                    <input id="desktop-product-search" class="form-control mr-sm-2" type="search" placeholder="Search"
                        aria-label="Search" style="width: 300px;">
                    <div id="desktop-search-results" class="suggestion-box"></div>
                </div>
            </form>
        </div>
    </div>
</nav>

<!-- Search form for mobile -->
<div class="container d-lg-none">
    <div class="position-relative">
        <input class="form-control mr-sm-2" id="mobile-product-search" type="search" placeholder="Search"
            aria-label="Search">
        <div id="mobile-search-results" class="suggestion-box"></div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript for handling search -->
<script>
    $(document).ready(function() {
        function handleSearch(inputId, resultsContainerId) {
            $(`#${inputId}`).on('input', function() {
                let query = $(this).val();
                if (query.length > 0) {
                    $.ajax({
                        url: '/search-products', // Change to your search endpoint
                        method: 'GET',
                        data: { query: query },
                        success: function(response) {
                            let results = response.products; // Adjust according to your response structure
                            let resultsContainer = $(`#${resultsContainerId}`);
                            resultsContainer.empty();

                            if (results.length > 0) {
                                let list = $('<ul class="list-group"></ul>');
                                results.forEach(function(product) {
                                    list.append(`
                                        <li class="list-group-item suggestion-item" data-slug="${product.slug}">
                                            ${product.name}
                                        </li>
                                    `);
                                });
                                resultsContainer.append(list);

                                // Handle clicking on suggestion items
                                $('.suggestion-item').on('click', function() {
                                    let slug = $(this).data('slug');
                                    window.location.href = '/' + slug;
                                });
                            } else {
                                resultsContainer.append('<div class="alert alert-warning" role="alert">No products found</div>');
                            }
                        }
                    });
                } else {
                    $(`#${resultsContainerId}`).empty();
                }
            });
        }

        // Call function for desktop search
        handleSearch('desktop-product-search', 'desktop-search-results');

        // Call function for mobile search
        handleSearch('mobile-product-search', 'mobile-search-results');

        // Hide search results when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('#desktop-product-search, #desktop-search-results, #mobile-product-search, #mobile-search-results').length) {
                $('#desktop-search-results').empty();
                $('#mobile-search-results').empty();
            }
        });
    });
</script>
