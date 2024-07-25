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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="page-header">
            <h3 class="page-title"> Create New Post Page </h3>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add New Post</h4>
                    <form class="form-sample" action="{{ route('store.post','dummy data') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">Please fill below fields</p>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Meta Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="meta_title" value="{{ old('meta_title', 'uut7','dummy data') }}"
                                    required placeholder="iPhone 15 Pro Max overview, review, and price in Pakistan" />

                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Meta Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="meta_description" required rows="5">{{ old('meta_description','dummy data') }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Review Section</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="review_text" required rows="10">{{ old('review_text','dummy data') }}</textarea>
                                @error('review_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>





                        {{-- Pros and Cons Section --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pros</label>
                            <div class="col-sm-9" id="pros">
                                @foreach (old('pros', ['']) as $index => $pro)
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control @error('pros.' . $index) is-invalid @enderror"
                                            name="pros[]" value="{{ $pro }}" required placeholder="Enter a Pro">
                                        @if ($index == 0)
                                            <button type="button" class="btn btn-success btn-add"
                                                onclick="addField('pros')">Add More</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-remove"
                                                onclick="removeField(this)">Remove</button>
                                        @endif
                                        @error('pros.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Cons</label>
                            <div class="col-sm-9" id="cons">
                                @foreach (old('cons', ['']) as $index => $con)
                                    <div class="input-group mb-3">
                                        <input type="text"
                                            class="form-control @error('cons.' . $index) is-invalid @enderror"
                                            name="cons[]" value="{{ $con }}" required placeholder="Enter a Con">
                                        @if ($index == 0)
                                            <button type="button" class="btn btn-danger btn-add"
                                                onclick="addField('cons')">Add More</button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-remove"
                                                onclick="removeField(this)">Remove</button>
                                        @endif
                                        @error('cons.' . $index)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Overview section</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="overview_text" required rows="10">{{ old('overview_text','dummy data') }}</textarea>
                                @error('overview_text')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="product_name" required
                                            value="{{ old('product_name','dummy data') }}"
                                            placeholder="Enter name (e.g., iPhone 15 Pro Max)" />
                                        @error('product_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Price</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="price" required
                                            value="{{ old('price','10000') }}" placeholder="Enter price (e.g., 100000.00)" />
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" required name="image"
                                            id="imageInput">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" id="altFieldContainer" style="display: none;">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alt Text</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="altText"
                                            placeholder="Enter alt text for the image">
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Model</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="model" required
                                            value="{{ old('model','dummy data') }}" placeholder="Example: iPhone 15 Pro Max" />
                                        @error('model')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Brand</label>
                                    <div class="col-sm-9">
                                        <select class="form-control @error('brand_id') is-invalid @enderror"
                                            id="brand_select" name="brand_id" required>
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Base Model</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="model_select" required name="base_model">
                                            <option value="">Select Base Model</option>
                                        </select>
                                        @error('model_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Launched in Pakistan</label>
                                <div class="col-sm-9">
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label
                                            class="btn btn-outline-success {{ old('launched_in_pakistan') == '1' ? 'active' : '' }}">
                                            <input type="radio" required name="launched_in_pakistan" id="launched_yes"
                                                value="1" {{ old('launched_in_pakistan') == '1' ? 'checked' : '' }}>
                                            Yes
                                        </label>
                                        <label
                                            class="btn btn-outline-danger {{ old('launched_in_pakistan') == '0' ? 'active' : '' }}">
                                            <input type="radio" required name="launched_in_pakistan" id="launched_no"
                                                value="0" {{ old('launched_in_pakistan') == '0' ? 'checked' : '' }}>
                                            No
                                        </label>
                                    </div>
                                    @error('launched_in_pakistan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Release date</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" required name="release_date"
                                            value="{{ old('release_date','dummy data') }}">
                                        @error('release_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Dimensions</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="dimension" required
                                            value="{{ old('dimension','dummy data') }}"
                                            placeholder="Enter dimensions (e.g., 10x15x20)" />
                                        @error('dimension')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Sim Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sim_type" required
                                            value="{{ old('sim_type','dummy data') }}"
                                            placeholder="Enter SIM type (e.g., Nano SIM, eSIM, Dual SIM)" />
                                        @error('sim_type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Colour</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="colour" required
                                            value="{{ old('colour','dummy data') }}"
                                            placeholder="Enter color (e.g., Red, Blue, Green)" />
                                        @error('colour')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Weight</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="weight" required
                                            value="{{ old('weight','180') }}"
                                            placeholder="Enter weight in grams (e.g., 180)" />
                                        @error('weight')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Specifications section --}}
                        <h4 class="card-title">Specifications</h4>
                        <div class="row">
                            <p class="card-description">Display</p>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Screen Size (inches)</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                            class="form-control @error('screen_size') is-invalid @enderror"
                                            name="screen_size" value="{{ old('screen_size','12') }}" required
                                            placeholder="Enter screen size (e.g., 15.6 inches)" />

                                        @error('screen_size')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Type</label>
                                    <div class="col-sm-9">
                                        <input type="text" required
                                            class="form-control @error('type') is-invalid @enderror" name="type"
                                            value="{{ old('type','dummy data') }}" placeholder="Type (e.g., AMOLED)" />
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Resolution</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('resolution') is-invalid @enderror"
                                            name="resolution" value="{{ old('resolution','dummy data') }}" required
                                            placeholder="Resolution (e.g., 1920x1080)">

                                        @error('resolution')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Pixel Density (PPI)</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                            class="form-control @error('pixel_density') is-invalid @enderror"
                                            name="pixel_density" value="{{ old('pixel_density','22') }}" required
                                            placeholder="Pixel Density (e.g., 400 pixels per inch (ppi))">

                                        @error('pixel_density')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Refresh Rate (Hz)</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                            class="form-control @error('refresh_rate') is-invalid @enderror"
                                            name="refresh_rate" value="{{ old('refresh_rate','60') }}" required
                                            placeholder="Refresh Rate (e.g., 60 Hz)">

                                        @error('refresh_rate')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Quality</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('quality') is-invalid @enderror"
                                            name="quality" value="{{ old('quality','dummy data') }}" required
                                            placeholder="Quality (e.g., High, Medium, Low)">

                                        @error('quality')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Glass Protection</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('glass_protection') is-invalid @enderror"
                                            name="glass_protection" value="{{ old('glass_protection','dummy data') }}" required
                                            placeholder="Glass Protection (e.g., Gorilla Glass)">

                                        @error('glass_protection')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Display Colors</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('display_colours') is-invalid @enderror"
                                            name="display_colours" value="{{ old('display_colours','dummy data') }}" required
                                            placeholder="Display Colors (e.g., 16 million)">

                                        @error('display_colours')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-description">Hardware</p>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">SoC</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('soc') is-invalid @enderror"
                                            name="soc" value="{{ old('soc','dummy data') }}" required
                                            placeholder="SOC (e.g., Snapdragon 888)">

                                        @error('soc')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">GPU</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('gpu') is-invalid @enderror"
                                            name="gpu" value="{{ old('gpu','dummy data') }}" required
                                            placeholder="GPU (e.g., Adreno 650)">

                                        @error('gpu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">CPU</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('cpu') is-invalid @enderror"
                                            name="cpu" value="{{ old('cpu','dummy data') }}" required
                                            placeholder="CPU (e.g., Snapdragon 865)">

                                        @error('cpu')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">RAM</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('ram') is-invalid @enderror"
                                            name="ram" value="{{ old('ram','dummy data') }}" required
                                            placeholder="RAM (e.g., 8 GB)">

                                        @error('ram')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Storage</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('storage') is-invalid @enderror"
                                            name="storage" value="{{ old('storage','dummy data') }}" required
                                            placeholder="Storage (e.g., 256 GB)">

                                        @error('storage')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <p class="card-description">Software & Battery</p>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Operating System</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('operating_system') is-invalid @enderror"
                                            name="operating_system" value="{{ old('operating_system','dummy data') }}" required
                                            placeholder="Operating System (e.g., Android 12)">

                                        @error('operating_system')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">UI</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('ui') is-invalid @enderror"
                                            name="ui" value="{{ old('ui','dummy data') }}" required
                                            placeholder="UI (e.g., HyperOS)">

                                        @error('ui')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Battery</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('battery') is-invalid @enderror"
                                            name="battery" value="{{ old('battery','dummy data') }}" required
                                            placeholder="Battery (e.g., 4000 mAh)">

                                        @error('battery')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="card-description">Cameras</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No of Rear Cameras</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                            class="form-control @error('no_of_rear_cameras') is-invalid @enderror"
                                            name="no_of_rear_cameras" value="{{ old('no_of_rear_cameras','3') }}" required
                                            placeholder="Number of Rear Cameras (e.g., 3)">

                                        @error('no_of_rear_cameras')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rear Camera(s)</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('rear_cameras') is-invalid @enderror"
                                            name="rear_cameras" value="{{ old('rear_cameras','dummy data') }}" required
                                            placeholder="Rear Cameras (e.g., 48 MP + 8 MP + 2 MP)">

                                        @error('rear_cameras')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Rear Flash</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('rear_flash') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="rear_flash" id="rear_flash_yes"
                                                    value="1" {{ old('rear_flash') == '1' ? 'checked' : '' }}>
                                                Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('rear_flash') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="rear_flash" id="rear_flash_no"
                                                    value="0" {{ old('rear_flash') == '0' ? 'checked' : '' }}>
                                                No
                                            </label>
                                        </div>

                                        @if (!old('rear_flash') && $errors->has('rear_flash'))
                                            <div class="invalid-feedback d-block">Please select an option for Rear Flash.
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">No of Front Cameras</label>
                                    <div class="col-sm-9">
                                        <input type="number"
                                            class="form-control @error('no_of_front_cameras') is-invalid @enderror"
                                            name="no_of_front_cameras" required value="{{ old('no_of_front_cameras','1') }}"
                                            placeholder="Number of Front Cameras (e.g., 1)">

                                        @error('no_of_front_cameras')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Front Camera</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('front_camera') is-invalid @enderror"
                                            name="front_camera" value="{{ old('front_camera','dummy data') }}" required
                                            placeholder="Front Camera (e.g., 20 MP)">

                                        @error('front_camera')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Periscope</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('periscope') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="periscope" id="periscope_yes"
                                                    autocomplete="off" value="1"
                                                    {{ old('periscope') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('periscope') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="periscope" id="periscope_no"
                                                    autocomplete="off" value="0"
                                                    {{ old('periscope') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @if (!old('periscope') && $errors->has('periscope'))
                                            <div class="invalid-feedback d-block">Please select an option for Periscope.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <p class="card-description">Sensors</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Accelerometer</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('accelerometer') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="accelerometer" id="accelerometerYes"
                                                    autocomplete="off" value="1"
                                                    {{ old('accelerometer') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('accelerometer') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="accelerometer" id="accelerometerNo"
                                                    autocomplete="off" value="0"
                                                    {{ old('accelerometer') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('accelerometer')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Gyroscope</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('gyroscope') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="gyroscope" id="gyroscopeYes"
                                                    autocomplete="off" value="1"
                                                    {{ old('gyroscope') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('gyroscope') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="gyroscope" id="gyroscopeNo"
                                                    autocomplete="off" value="0"
                                                    {{ old('gyroscope') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('gyroscope')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="compass" class="col-sm-3 col-form-label">Compass</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('compass') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="compass" id="compass_yes"
                                                    autocomplete="off" value="1"
                                                    {{ old('compass') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('compass') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="compass" id="compass_no"
                                                    autocomplete="off" value="0"
                                                    {{ old('compass') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('compass')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fingerprint" class="col-sm-3 col-form-label">Fingerprint</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('fingerprint') == '1' ? 'active' : '' }}">
                                                <input type="radio" name="fingerprint" id="fingerprint_yes"
                                                    autocomplete="off" value="1"
                                                    {{ old('fingerprint') == '1' ? 'checked' : '' }} required> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('fingerprint') == '0' ? 'active' : '' }}">
                                                <input type="radio" name="fingerprint" id="fingerprint_no"
                                                    autocomplete="off" value="0"
                                                    {{ old('fingerprint') == '0' ? 'checked' : '' }} required> No
                                            </label>
                                        </div>
                                        @error('fingerprint')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>


                        <p class="card-description">Connectivity</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bluetooth</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('bluetooth') is-invalid @enderror"
                                            name="bluetooth" value="{{ old('bluetooth','dummy data') }}" required
                                            placeholder="Bluetooth (e.g., Bluetooth 5.0)">

                                        @error('bluetooth')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Wi-Fi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('wifi') is-invalid @enderror"
                                            name="wifi" value="{{ old('wifi','dummy data') }}" required
                                            placeholder="Wi-Fi (e.g., Wi-Fi 802.11ac)">

                                        @error('wifi')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NFC</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('nfc') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="nfc" id="nfc_yes"
                                                    autocomplete="off" value="1"
                                                    {{ old('nfc') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('nfc') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="nfc" id="nfc_no"
                                                    autocomplete="off" value="0"
                                                    {{ old('nfc') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('nfc')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">2G</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('2g') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="2g" autocomplete="off"
                                                    value="1" {{ old('2g') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label class="btn btn-outline-danger {{ old('2g') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="2g" autocomplete="off"
                                                    value="0" {{ old('2g') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('2g')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">3G</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('3g') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="3g" autocomplete="off"
                                                    value="1" {{ old('3g') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label class="btn btn-outline-danger {{ old('3g') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="3g" autocomplete="off"
                                                    value="0" {{ old('3g') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('3g')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">4G/LTE</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('4g_lte') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="4g_lte" autocomplete="off"
                                                    value="1" {{ old('4g_lte') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label
                                                class="btn btn-outline-danger {{ old('4g_lte') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="4g_lte" autocomplete="off"
                                                    value="0" {{ old('4g_lte') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('4g_lte')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">5G</label>
                                    <div class="col-sm-9">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label
                                                class="btn btn-outline-success {{ old('5g') == '1' ? 'active' : '' }}">
                                                <input type="radio" required name="5g" autocomplete="off"
                                                    value="1" {{ old('5g') == '1' ? 'checked' : '' }}> Yes
                                            </label>
                                            <label class="btn btn-outline-danger {{ old('5g') == '0' ? 'active' : '' }}">
                                                <input type="radio" required name="5g" autocomplete="off"
                                                    value="0" {{ old('5g') == '0' ? 'checked' : '' }}> No
                                            </label>
                                        </div>
                                        @error('5g')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="draft">Draft</option>
                                <option value="published">Published</option>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-gradient-success me-2">Save</button>
                    </form>
                </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('imageInput').addEventListener('change', function() {
            var altFieldContainer = document.getElementById('altFieldContainer');
            if (this.files && this.files.length > 0) {
                altFieldContainer.style.display = 'block';
            } else {
                altFieldContainer.style.display = 'none';
            }
        });
    });

    // Function to add a new Pros or Cons entry
    function addField(section) {
        const container = document.getElementById(section); // Get the container div
        const div = document.createElement('div'); // Create a new div for each entry
        div.className = 'input-group mb-3'; // Set class for styling

        const input = document.createElement('input'); // Create a new input element
        input.type = 'text';
        input.className = 'form-control'; // Set class for styling
        input.name = `${section}[]`; // Set name attribute for Laravel array handling
        input.placeholder = `Enter a ${section.slice(0, -1)}`; // Set placeholder text

        const removeBtn = document.createElement('button'); // Create a remove button
        removeBtn.type = 'button';
        removeBtn.className = 'btn btn-danger ms-2'; // Set class for styling
        removeBtn.textContent = 'Remove'; // Set button text

        div.appendChild(input); // Append input to the div
        div.appendChild(removeBtn); // Append remove button to the div

        container.appendChild(div); // Append the div to the container

        // Event listener for remove button
        removeBtn.addEventListener('click', function() {
            div.remove(); // Remove the parent div when remove button is clicked
        });
    }

    // Event listener for adding new Pros entry
    document.getElementById('btn-add-pros').addEventListener('click', function() {
        addField('pros'); // Call addField function for Pros
    });

    // Event listener for adding new Cons entry
    document.getElementById('btn-add-cons').addEventListener('click', function() {
        addField('cons'); // Call addField function for Cons
    });
</script>
