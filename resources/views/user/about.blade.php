@extends('layouts.user.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card mt-4">
                <div class="card-header">About Us</div>

                <div class="card-body">
                    <h2>Welcome to Our Mobile Specs Website</h2>
                    <p>
                        At Mobile Specs, we are dedicated to providing you with the most accurate and up-to-date information about the latest mobile devices. Our mission is to help you make informed decisions when choosing your next smartphone.
                    </p>
                    <h3>Our Story</h3>
                    <p>
                        Founded in 2024, Mobile Specs was created by a team of tech enthusiasts who saw a need for a comprehensive resource for mobile device specifications. We have grown to become a trusted source for mobile tech reviews, comparisons, and news.
                    </p>
                    <h3>What We Offer</h3>
                    <ul>
                        <li>Detailed specifications for the latest smartphones</li>
                        <li>Expert reviews and ratings</li>
                        <li>Side-by-side device comparisons</li>
                        <li>Up-to-date news and updates on the mobile industry</li>
                    </ul>
                    <h3>Our Team</h3>
                    <p>
                        Our team consists of experienced writers, reviewers, and tech enthusiasts who are passionate about mobile technology. We are committed to delivering quality content that you can rely on.
                    </p>
                    <h3>Contact Us</h3>
                    <p>
                        Have any questions or feedback? Feel free to <a href="{{ route('contact') }}">contact us</a>. We'd love to hear from you!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
