@extends('layouts.user.layout')
@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <h1 class="card-title">{{ ucwords($products->name) }}</h1>
            <img src=" {{ $products->image_url }}" alt="Samsung Galaxy S21" class="product-image" style="width: 300px;">
        </div>
    </div>
    <!-- Key features -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-text">
                <div class="mb-4">
                    <h2 style="font-size: 1.5em; color: #333; margin-bottom: 1em;"><i class="fas fa-circle"
                            style="color: green; font-size: 0.8em; margin-right: 0.5em;"></i> Key Features
                    </h2>
                    <ul style="list-style-type: none; padding-left: 0;">
                        @foreach ($features as $feature)
                            <li><i class=" {{ $feature->feature->feature_icon }}"
                                    style="color: #007bff; margin-right: 0.5em;"></i>
                                {{ $feature->feature->feature_key }}: {{ $feature->feature->feature_value }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Review section -->
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-text">
                <div class="mb-4">
                    <span>{!! $products->review_section !!}</span>
                    <div class="row pros-cons">
                        <div class="col">
                            <h3>
                                Pros
                                <span class="like-icon" style="color: green;"><i class="fas fa-thumbs-up"></i></span>
                            </h3>
                            <ul>
                                @foreach ($products->pros as $pros)
                                    <li><i class="far fa-check-circle" style="color: lightgreen;"></i>
                                        {{ $pros->pro }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col">
                            <h3>
                                Cons
                                <span class="dislike-icon" style="color: red;"><i class="fas fa-thumbs-down"></i></span>
                            </h3>
                            <ul>
                                @foreach ($products->cons as $con)
                                    <li><i class="fas fa-times-circle" style="color: red;"></i> {{ $con->con }} </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="card-text">
                <div class="mb-4">
                    <span>{!! $products->overview_section !!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-text">
                <div class="mb-4">
                    <h2>Specifications</h2>

                    <div class="row">
                        <div class="col-md-6">
                            <h3>General</h3>
                            <ul>
                                <li><strong>Brand:</strong>{{ $products->brand->name }}</li>
                                <li><strong>Model:</strong> {{ $products->model->name }}</li>
                                <li><strong>Price in Pakistan:</strong> {{ $products->price }} </li>
                                <li><strong>Release Date:</strong> {{ date('F d, Y', strtotime($products->release_date)) }}
                                <li><strong>Launched in Pakistan:</strong>
                                    {{ $products->launched_in_pakistan ? 'Yes' : 'No' }}</li>
                                <li><strong>Dimensions (in):</strong> {{ $products->dimensions }}</li>
                                <li><strong>SIM:</strong> {{ $products->sim_type }}</li>
                                <li><strong>Colours:</strong> {{ $products->colours }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Display</h3>
                            <ul>
                                <li><strong>Screen Size (inches):</strong> {{ $products->screen_size }}</li>
                                <li><strong>Type:</strong> {{ $products->type }}</li>
                                <li><strong>Resolution:</strong> {{ $products->resolution }}</li>
                                <li><strong>Pixel Density (PPI):</strong> {{ $products->pixel_density }} </li>
                                <li><strong>Refresh Rate (Hz):</strong> {{ $products->refresh_rate }}</li>
                                <li><strong>Quality:</strong> {{ $products->quality }}</li>
                                <li><strong>Glass Protection:</strong>
                                    {{ $products->glass_protection  }}</li>
                                <li><strong>Display Colors:</strong> {{ $products->display_colours }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Hardware</h3>
                            <ul>
                                <li><strong>SoC:</strong> {{ $products->soc }}</li>
                                <li><strong>GPU:</strong> {{ $products->gpu }}</li>
                                <li><strong>CPU:</strong> {{ $products->cpu }}</li>
                                <li><strong>RAM:</strong> {{ $products->ram }}</li>
                                <li><strong>Storage:</strong> {{ $products->storage }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Software</h3>
                            <ul>
                                <li><strong>Operating System:</strong> {{ $products->operating_system }} </li>
                                <li><strong>UI:</strong> {{ $products->ui }} </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Cameras</h3>
                            <ul>
                                <li><strong>No of Rear Cameras:</strong> {{ $products->no_of_rear_cameras }}</li>
                                <li><strong>Rear Camera(s):</strong> {{ $products->rear_cameras }}</li>
                                <li><strong>Rear Flash:</strong> {{ $products->rear_flash ? 'Yes' : 'No' }}</li>
                                <li><strong>Periscope:</strong> {{ $products->periscope ? 'Yes' : 'No' }}</li>
                                <li><strong>No of Front Cameras:</strong> {{ $products->no_of_front_cameras }}</li>
                                <li><strong>Front Camera:</strong> {{ $products->front_camera }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Battery</h3>
                            <ul>
                                <li><strong>Capacity:</strong> {{ $products->battery_capacity }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Sensors</h3>
                            <ul>
                                <li><strong>Accelerometer:</strong> {{ $products->accelerometer ? 'Yes' : 'No' }}
                                </li>
                                <li><strong>Gyroscope:</strong>{{ $products->gyroscope ? 'Yes' : 'No' }}</li>
                                <li><strong>Compass:</strong> {{ $products->compass ? 'Yes' : 'No' }}</li>
                                <li><strong>Fingerprint:</strong> {{ $products->fingerprint ? 'Yes' : 'No' }}</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h3>Connectivity</h3>
                            <ul>
                                <li><strong>Bluetooth:</strong>{{ $products->bluetooth }}</li>
                                <li><strong>Wi-Fi:</strong> {{ $products->wifi }}</li>
                                <li><strong>NFC:</strong> {{ $products->nfc ? 'Yes' : 'No' }}</li>
                                <li><strong>2G:</strong> {{ $products->_2g ? 'Yes' : 'No' }}</li>
                                <li><strong>3G:</strong> {{ $products->_3g ? 'Yes' : 'No' }}</li>
                                <li><strong>4G/LTE:</strong> {{ $products->_4g ? 'Yes' : 'No' }}
                                </li>
                                <li><strong>5G:</strong> {{ $products->_5g ? 'Yes' : 'No' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Popular Comparisons section -->
    <section class="popular-comparisons">
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="card-title text-center mb-4 h4">Popular Comparisons</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

                    @foreach ($relatedProducts as $item)
                        <div class="col-md-2 mb-4">
                            <div class="card product-card h-100">
                                <a href="#" class="d-flex justify-content-center">
                                    <img src="{{ asset('mobile/' . $item->image_url) }}" alt="{{$item->image_alt}}"
                                        class="card-img-top product-image mt-2" style="width: 100px">
                                </a>
                                <div class="card-body text-center pt-2">
                                    <h5 class="card-title mb-1 h6">{{ $item->name }}</h5>
                                    <p class="product-price mb-0">{{ $item->price }}</p>
                                    <a href="{{ route('compare', ['device1' => $item->slug, 'device2' => $products->slug ]) }}" class="btn btn-primary btn-sm mt-2">Read Review</a>
                                </div>                                
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    
    <script type="application/ld+json">
        {
          "@context": "https://schema.org/",
          "@type": "Product",
          "name": "{{ $products->name }}",
          "description": "{!! $products->meta_description !!}",
          "brand": {
            "@type": "Brand",
            "name": "{{ $products->brand->name }}"
          },
          "model": "{{ $products->model->name }}",
          "url": "{{ url()->current() }}",
          "image": "{{ asset($products->image_url) }}"
          "additionalProperty": [
            {
              "@type": "PropertyValue",
              "name": "RAM",
              "value": "{{ $products->ram }}"
            },
            {
              "@type": "PropertyValue",
              "name": "Storage",
              "value": "{{ $products->storage }}"
            },
            {
              "@type": "PropertyValue",
              "name": "Processor",
              "value": "{{ $products->cpu }}"
            },
            {
              "@type": "PropertyValue",
              "name": "Display",
              "value": "{{ $products->type }},{{ $products->screen_size }}"
            },
            {
              "@type": "PropertyValue",
              "name": "Camera",
              "value": "{{ $products->rear_cameras }}"
            },
            {
              "@type": "PropertyValue",
              "name": "Operating System",
              "value": "{{ $products->operating_system }}"
            }
          ]
        }
        </script>


@stop
