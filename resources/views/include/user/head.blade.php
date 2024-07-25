<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($products->meta_title) ? $products->meta_title : 'Home' }}</title>
    <meta name="keywords" content="{{ isset($products->meta_keywords) ? $products->meta_keywords : '' }}">
    <meta name="description" content="{{ isset($products->meta_description) ? $products->meta_description : '' }}">


    @if (str_contains(url()->full(), 'home') || isset($price_filter) || isset($brand_filter))
        <ink rel = "canonical" href = "{{ route('products.home') }}">
        @elseif (isset($product_url))
            <link rel = "canonical" href = "{{ url()->current() }}">
    @endif


    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <style>
        html,
        body {
            height: 100%;
        }

        .d-flex {
            display: flex;
        }

        .flex-column {
            flex-direction: column;
        }

        .min-vh-100 {
            min-height: 100vh;
        }

        .flex-grow-1 {
            flex-grow: 1;
        }

        @media (max-width: 991.98px) {
            .navbar .form-inline {
                display: none;
            }
        }

        .container.d-lg-none {
            margin-top: 20px;
            /* Adjust the value as needed */
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333
        }

        .navbar-brand {
            font-size: 1.8rem
        }

        .card {
            border: none;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .1);
            margin-bottom: 20px
        }

        .product-image {
            width: 150px;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
            object-fit: cover
        }

        .card-title {
            font-size: 1.5rem;
            color: #333
        }

        .card-text {
            color: #555
        }

        .pros-cons h3 {
            color: #333
        }

        .navbar-custom {
            background-color: #2bb8ff
        }

        .navbar-nav .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0
        }

        .navbar-hidden {
            top: -100px;
            transition: top .3s
        }

        @media(max-width:767px) {
            .col-lg-3 {
                display: none
            }
        }

        .pros-cons ul {
            list-style-type: none;
            padding-left: 0
        }

        .pros-cons li {
            display: flex;
            align-items: center
        }

        .pros-cons i {
            margin-right: 8px
        }

        .footer {
            width: 100%;
            padding: 40px 0;
            background-color: #fff;
            color: #3d3d3d
        }

        .footer .container-fluid {
            max-width: 100%;
            padding-left: 15px;
            padding-right: 15px
        }

        .footer .row {
            margin-left: 0;
            margin-right: 0
        }

        .footer h5 {
            margin-bottom: 20px
        }

        .footer p,
        .footer ul,
        .footer li {
            margin: 0;
            padding: 0;
            color: #3d3d3d
        }

        .footer .list-inline-item {
            margin-right: 15px
        }

        .footer .list-inline-item a {
            font-size: 1.5em;
            color: #3d3d3d
        }

        .footer a {
            color: #3d3d3d
        }

        .footer a:hover {
            text-decoration: underline
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-family: Arial, sans-serif;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            border-color: #ddd;
            /* Ensure border color matches */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            width: 150px;
            /* Set a fixed width for all cells */
            height: 50px;
            /* Set a fixed height for all cells */
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .section-header {
            background-color: #e0e0e0;
            font-weight: bold;
            text-align: center;
        }

        #comparison_title_mobile {
            display: none;
        }

        @media (max-width: 767px) {
            #comparison_title_mobile {
                display: block;

            }

            #compareButton {
                /* Example mobile style */
                font-size: 14px;
            }

            #comparison_title_desktop {
                display: none;
            }
        }

        /* Default styles for larger screens */
        .placeholder-show {
            display: none;
            /* Hide mobile placeholders by default */
        }

        @media (max-width: 767.98px) {
            .placeholder-hide {
                display: none;
                /* Hide regular placeholders on mobile */

            }

            #compareButton {
                /* Example desktop style */
                font-size: 18px;
            }

            .placeholder-show {
                display: block;
                /* Show mobile-specific placeholders */
            }

            .mb-3 {
                margin-bottom: 10px !important;
                /* Reduce margin bottom on small screens */
            }

            .mt-2 {
                margin-top: 5px !important;
                /* Reduce margin top on small screens */
            }

            .d-block.d-md-none {
                display: block;
                /* Show submit button on mobile */
            }

            .d-none.d-md-block {
                display: none;
                /* Hide submit button on medium screens and above */
            }
        }

        /* Custom styles for autocomplete */
        .autocomplete-container {
            position: relative;
        }

        .form-control.sticky-search {
            background-color: #fff;
            transition: top 0.3s;
        }

        .suggestions-list {
            list-style-type: none;
            padding: 0;
            margin-top: 2px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: #fff;
            border: 1px solid #ccc;
            max-height: 200px;
            overflow-y: auto;
            display: none;
            /* Hide initially */
        }

        /* Default styling for suggestion boxes */
        .suggestion-box {
            max-width: 400px;
            /* Set a maximum width to prevent it from expanding too much */
            position: absolute;
            z-index: 1000;
            background-color: #fff;
        }

        /* Adjust width for desktop screens */
        @media (min-width: 992px) {
            .suggestion-box {
                width: 97%;
                /* Adjust width as needed */
            }
        }

        /* Adjust width for mobile screens */
        @media (max-width: 991px) {
            .suggestion-box {
                width: 100%;
                /* Adjust width as needed */
            }
        }




        .suggestion-item {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            background-color: #ebfbff;
        }

        .suggestion-item img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .suggestion-item:hover {
            background-color: #f2f2f2;
        }

        @media (max-width: 767.98px) {
            .autocomplete-container {
                position: relative;
            }

            .form-control.sticky-search.fixed {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1050;
            }

            .autocomplete-container {
                position: relative;
                transition: transform 0.3s ease-in-out;
            }

            .autocomplete-container.focused {
                transform: translateY(-100px);
                /* Adjust this value as needed */
            }

            .sticky-search {
                transition: transform 0.3s ease-in-out;
            }


            .suggestions-list {
                position: absolute;
                margin-top: 45px;
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                border-radius: 4px;
                top: 100%;
                /* Make sure it is always below the input */
                left: 0;
                width: 100%;
                z-index: 1000;
                background-color: #fff;
                border: 1px solid #ccc;
                max-height: 200px;
                overflow-y: auto;
                display: none;
                /* Hide initially */
            }

            
        }
    </style>

</head>
