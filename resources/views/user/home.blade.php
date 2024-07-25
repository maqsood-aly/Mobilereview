@extends('layouts.user.layout') @section('content')

    @if (request()->is('/') || request()->is('home'))
        <div class="card mb-3">
            <div class="card-body">{!! $welcome !!}</div>
        </div>
    @endif 
    
    <div class="card mb-3">
        <div class="card-body">
            <h2 class="card-title text-center mb-4 h4">{{ $card_title ?? 'Featured Reviews' }}</h2>
            @if ($products->isEmpty())
                <p class="text-center">No products found.</p>
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    @foreach ($products as $product)
                        <div class="col-md-2 mb-4">
                            <div class="card product-card h-100"><a href="{{ route('products.show', $product->slug) }}"
                                    class="d-flex justify-content-center"><img src="{{ $product->image_url }}"
                                        alt="Product" class="card-img-top product-image" style="width: 100%;"> </a>
                                <div class="card-body text-center pt-2">
                                    <h6 class="card-title mb-1 h6">{{ $product->name }}</h6>
                                    <p class="product-price mb-0">PKR {{ $product->price }}</p><a
                                        href="{{ route('products.show', $product->slug) }}"
                                        class="btn btn-primary btn-sm mt-2">Read Review</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
    
    <section class="latest-reviews">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title text-center mb-4 h4">Latest Reviews</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                    @foreach ($latestProducts as $product)
                        <div class="col-md-2 mb-4">
                            <div class="card product-card h-100"><a href="#"
                                    class="d-flex justify-content-center"><img src="" alt="Product"
                                        class="card-img-top product-image" style="height: 200px; width: 300px;"></a>
                                <div class="card-body text-center pt-2">
                                    <h5 class="card-title mb-1 h6">{{ $product->name }}</h5>
                                    <p class="product-price mb-0">PKR {{ $product->price }}</p><a href="#"
                                        class="btn btn-primary btn-sm mt-2">Read Review</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</section> @stop
