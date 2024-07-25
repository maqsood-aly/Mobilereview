@extends('layouts.user.layout')
@section('content')
    <div class="container-fluid" style="margin-bottom: 20px">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                <div class="autocomplete-container">
                    <input id="searchFirst" type="text" class="form-control placeholder-hide sticky-search"
                        placeholder="Search First Product">
                    <div id="searchFirstSuggestions" class="suggestions-list"></div>
                </div>
                <input id="searchFirstMobile" type="text" class="form-control placeholder-show  mt-sm-0"
                    placeholder="Search First Mobile">
            </div>
            <div class="col-md-4 col-sm-6 mb-3 mb-sm-0">
                <div class="autocomplete-container">
                    <input id="searchSecond" type="text" class="form-control placeholder-hide sticky-search"
                        placeholder="Search Second Product">
                    <div id="searchSecondSuggestions" class="suggestions-list"></div>
                </div>
                <input id="searchSecondMobile" type="text" class="form-control placeholder-show mt-2 mt-sm-0"
                    placeholder="Search Second Mobile">
            </div>
            <div class="col-md-2 col-sm-6">
                <button id="compareButton" type="button" class="btn btn-primary btn-block">Compare</button>
            </div>
        </div>
    </div>
    <div id="comparisonContainer">
        @if (isset($product1) && !empty($product1) && isset($product2) && !empty($product2))
            <hr class="my-4">
            <!-- Mobile Version -->
            <h1 class="text-center" id="comparison_title_mobile" style="color: rgb(34, 34, 33); font-size: 24px;">
                {{ $product1->name }} VS {{ $product2->name }}<br>Comparison
            </h1>

            <!-- Desktop Version -->
            <h1 class="text-center" id="comparison_title_desktop" style="color: rgb(41, 40, 40); font-size: 30px;">
                {{ $product1->name }} VS {{ $product2->name }} <br> Comparison
            </h1>
            {{-- General Section --}}
            <table>
                <d2 style="font-family: Arial, sans-serif; font-size: 25px;">General</h2>
                    <thead>
                        <tr>
                            <th>Specification</th>
                            <th><a href="{{ route('products.show', $product1->slug) }}">{{ $product1->name }}</a></th>
                            <th><a href="{{ route('products.show', $product2->slug) }}">{{ $product2->name }}</a></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Brand</td>
                            <td>{{ $product1->brand->name }}</td>
                            <td>{{ $product2->brand->name }}</td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>{{ $product1->model->name }}</td>
                            <td>{{ $product2->model->name }}</td>
                        </tr>
                        <tr>
                            <td>Price in Pakistan</td>
                            <td>{{ $product1->price }}</td>
                            <td>{{ $product2->price }}</td>
                        </tr>
                        <tr>
                            <td>Release Date</td>
                            <td>{{ $product1->release_date }}</td>
                            <td>{{ $product2->release_date }}</td>
                        </tr>
                        <tr>
                            <td>Launched in Pakistan</td>
                            <td>{{ $product1->launched_in_pakistan ? 'Yes' : NO }}</td>
                            <td>{{ $product2->launched_in_pakistan ? 'Yes' : NO }}</td>
                        </tr>
                        <tr>
                            <td>Dimensions (in)</td>
                            <td>{{ $product1->dimensions }}</td>
                            <td>{{ $product2->dimensions }}</td>
                        </tr>
                        <tr>
                            <td>SIM</td>
                            <td>{{ $product1->sim_type }}</td>
                            <td>{{ $product2->sim_type }}</td>
                        </tr>
                        <tr>
                            <td>Colours</td>
                            <td>{{ $product1->colours }}</td>
                            <td>{{ $product2->colours }}</td>
                        </tr>
                    </tbody>
            </table>
            {{-- Screen Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Screen</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Screen Size (inches)</td>
                        <td>{{ $product1->screen_size }}</td>
                        <td>{{ $product2->screen_size }}</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>{{ $product1->type }}</td>
                        <td>{{ $product2->type }}</td>
                    </tr>
                    <tr>
                        <td>Resolution</td>
                        <td>{{ $product1->resolution }}</td>
                        <td>{{ $product2->resolution }}</td>
                    </tr>
                    <tr>
                        <td>Pixel Density (PPI)</td>
                        <td>{{ $product1->pixel_density }}</td>
                        <td>{{ $product2->pixel_density }}</td>
                    </tr>
                    <tr>
                        <td>Refresh Rate (Hz)</td>
                        <td>{{ $product1->refresh_rate }}</td>
                        <td>{{ $product2->refresh_rate }}</td>
                    </tr>
                    <tr>
                        <td>Quality</td>
                        <td>{{ $product1->quality }}</td>
                        <td>{{ $product2->quality }}</td>
                    </tr>
                    <tr>
                        <td>Glass Protection</td>
                        <td>{{ $product1->glass_protection }}</td>
                        <td>{{ $product2->glass_protection }}</td>
                    </tr>
                    <tr>
                        <td>Display Colors</td>
                        <td>{{ $product1->display_colours }}</td>
                        <td>{{ $product2->display_colours }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Hardware Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Hardware</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>SoC</td>
                        <td>{{ $product1->soc }}</td>
                        <td>{{ $product2->soc }}</td>
                    </tr>
                    <tr>
                        <td>GPU</td>
                        <td>{{ $product1->gpu }}</td>
                        <td>{{ $product2->gpu }}</td>
                    </tr>
                    <tr>
                        <td>CPU</td>
                        <td>{{ $product1->cpu }}</td>
                        <td>{{ $product2->cpu }}</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>{{ $product1->ram }}</td>
                        <td>{{ $product2->ram }}</td>
                    </tr>
                    <tr>
                        <td>Storage</td>
                        <td>{{ $product1->storage }}</td>
                        <td>{{ $product2->storage }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Software Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Software</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Operating System</td>
                        <td>{{ $product1->operating_system }}</td>
                        <td>{{ $product2->operating_system }}</td>
                    </tr>
                    <tr>
                        <td>UI</td>
                        <td>{{ $product1->ui }}</td>
                        <td>{{ $product2->ui }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Cameras Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Cameras</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>No of Rear Cameras</td>
                        <td>{{ $product1->no_of_rear_cameras }}</td>
                        <td>{{ $product2->no_of_rear_cameras }}</td>
                    </tr>
                    <tr>
                        <td>Rear Camera(s)</td>
                        <td>{{ $product1->rear_cameras }}</td>
                        <td>{{ $product2->rear_cameras }}</td>
                    </tr>
                    <tr>
                        <td>Rear Flash</td>
                        <td>{{ $product1->rear_flash ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->rear_flash ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Periscope</td>
                        <td>{{ $product1->periscope ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->periscope ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>No of Front Cameras</td>
                        <td>{{ $product1->no_of_front_cameras }}</td>
                        <td>{{ $product2->no_of_front_cameras }}</td>
                    </tr>
                    <tr>
                        <td>Front Camera</td>
                        <td>{{ $product1->front_camera }}</td>
                        <td>{{ $product2->front_camera }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Battery Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Battery</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Capacity</td>
                        <td>{{ $product1->battery_capacity }}</td>
                        <td>{{ $product2->battery_capacity }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Sensors Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Sensors</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Accelerometer</td>
                        <td>{{ $product1->accelerometer ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->accelerometer ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Gyroscope</td>
                        <td>{{ $product1->gyroscope ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->gyroscope ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Compass</td>
                        <td>{{ $product1->compass ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->compass ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <td>Fingerprint</td>
                        <td>{{ $product1->fingerprint ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->fingerprint ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
            {{-- Connectivity Section --}}
            <table>
                <h2 style="font-family: Arial, sans-serif; font-size: 25px;" class="mt-4">Connectivity</h2>
                <thead>
                    <tr>
                        <th>Specification</th>
                        <th>{{ $product1->name }}</th>
                        <th>{{ $product2->name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bluetooth</td>
                        <td>{{ $product1->bluetooth }}</td>
                        <td>{{ $product2->bluetooth }}</td>
                    </tr>

                    <tr>
                        <td>Wi-Fi</td>
                        <td>{{ $product1->wifi }}</td>
                        <td>{{ $product2->wifi }}</td>
                    </tr>

                    <tr>
                        <td>NFC</td>
                        <td>{{ $product1->nfc ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->nfc ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>2G</td>
                        <td>{{ $product1->_2g ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->_2g ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>3G</td>
                        <td>{{ $product1->_3g ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->_3g ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>4G/LTE</td>
                        <td>{{ $product1->_4g ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->_4g ? 'Yes' : 'No' }}</td>
                    </tr>

                    <tr>
                        <td>5G</td>
                        <td>{{ $product1->_5g ? 'Yes' : 'No' }}</td>
                        <td>{{ $product2->_5g ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@stop
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- jQuery UI (with autocomplete module) -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>


<script>
    $(document).ready(function() {
        var globalData = {
            products: []
        };
        var selectedFirstProductId, selectedSecondProductId;
        function performProductSearch(callback) {
            var firstProduct = $('#searchFirst').val().trim(),
                secondProduct = $('#searchSecond').val().trim(),
                firstProductMobile = $('#searchFirstMobile').val().trim(),
                secondProductMobile = $('#searchSecondMobile').val().trim();
            if (firstProduct !== '' || secondProduct !== '' || firstProductMobile !== '' ||
                secondProductMobile !== '') {
                var url = '/getdevice',
                    data = {
                        first_product: firstProduct || firstProductMobile,
                        second_product: secondProduct || secondProductMobile
                    };
                $.ajax({
                    url: url,
                    method: 'GET',
                    data: data,
                    success: function(response) {
                        globalData.products = response.data;
                        if (typeof callback === 'function') {
                            callback();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        }

        function fetchData(query, callback) {
            const filteredData = globalData.products.filter(product => product.name.toLowerCase().includes(query
                .toLowerCase()));
            const data = filteredData.map(product => ({
                id: product.id,
                name: product.name,
                image: product.image_url
            }));
            setTimeout(function() {
                callback(data);
            }, 0);
        }

        function handleAutocomplete(input, suggestionsList, isFirstProduct) {
            input.on('input', function() {
                const query = $(this).val();
                if (!query) {
                    suggestionsList.empty().hide();
                    return;
                }
                performProductSearch(function() {
                    fetchData(query, function(data) {
                        suggestionsList.empty();
                        if (data.length > 0) {
                            data.forEach(item => {
                                const imagePath = `/${item.image}`,
                                    suggestionItem = $('<div>').addClass(
                                        'suggestion-item')
                                    .append($('<img>').attr('src', imagePath))
                                    .append($('<span>').text(item.name));
                                suggestionItem.on('click', function() {
                                    input.val(item.name);
                                    suggestionsList.empty().hide();
                                    console.log('Selected Item ID:',
                                        item.id
                                    ); // Log the selected item's ID
                                    if (isFirstProduct) {
                                        selectedFirstProductId = item
                                            .id;
                                    } else {
                                        selectedSecondProductId = item
                                            .id;
                                    }
                                });
                                suggestionsList.append(suggestionItem);
                            });
                            suggestionsList.show();
                        } else {
                            suggestionsList.hide();
                        }
                    });
                });
            });
            $(document).on('click', function(e) {
                if (!input.is(e.target) && input.has(e.target).length === 0 && !suggestionsList.is(e
                        .target) && suggestionsList.has(e.target).length === 0) {
                    suggestionsList.hide();
                }
            });
        }

        function setupStickySearch(inputs) {
            inputs.forEach(function(input) {
                input.addEventListener('focus', function() {
                    inputs.forEach(function(i) {
                        i.classList.remove('fixed');
                    });
                    input.classList.add('fixed');
                });
            });
            document.addEventListener('click', function(event) {
                if (!event.target.classList.contains('sticky-search')) {
                    inputs.forEach(function(input) {
                        input.classList.remove('fixed');
                    });
                }
            });
            document.addEventListener('DOMContentLoaded', function() {
                inputs.forEach(input => {
                    input.addEventListener('focus', function() {
                        this.parentElement.classList.add('focused');
                    });
                    input.addEventListener('blur', function() {
                        this.parentElement.classList.remove('focused');
                    });
                });
            });
        }

        setupStickySearch(document.querySelectorAll('.form-control.sticky-search'));
        handleAutocomplete($('#searchFirst'), $('#searchFirstSuggestions'), true);
        handleAutocomplete($('#searchSecond'), $('#searchSecondSuggestions'), false);
        handleAutocomplete($('#searchFirstMobile'), $('#searchFirstSuggestions'), true);
        handleAutocomplete($('#searchSecondMobile'), $('#searchSecondSuggestions'), false);

        function validateSelections() {
            if (!selectedFirstProductId || !selectedSecondProductId) {
                alert('Please select both products before comparing.');
                return false;
            }
            return true;
        }
        $('#compareButton').click(function() {
            // Mobile
            if (validateSelections()) {
                // Proceed with compare logic
                $.ajax({
                    url: '/compare-data', // Replace with your server endpoint
                    method: 'GET',
                    data: {
                        firstProductId: selectedFirstProductId,
                        secondProductId: selectedSecondProductId
                    },
                    success: function(response) {
                        $('#comparisonContainer').html(response.comparison_html);
                        // Handle the response data here
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle the error here
                    }
                });
            }
        });
        document.getElementById('compareButton').addEventListener('click', function() {
            this.blur(); // Remove focus to reset the border color
        });
    });
</script>
