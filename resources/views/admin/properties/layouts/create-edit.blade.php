@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="@yield('form-action')" method="POST" enctype="multipart/form-data">
                    @yield('form-method')
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-12">
                            <h1 class="text-center fw-bold">
                                @yield('form-title')
                            </h1>
                        </div>

                        <div class="mb-3 col-12">
                            <label for="property-title" class="form-label">Property Title*:</label>
                            <input type="text" name="title" id="property-title" class="form-control"
                                value="{{ old('title', $property->title) }}" required>
                            @error('title')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <label for="property-description" class="form-label">Property Description*:</label>
                            <textarea name="description" id="property-description" cols="30" rows="5" class="form-control" required>{{ old('description', $property->description) }}</textarea>
                            <div id="description-rule" class="form-text">The description must be between 20 and 250
                                characthers
                            </div>
                            @error('description')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <div class="address-property">
                                <label for="address" class=form-label>Property Address*:</label>
                            </div>
                        </div>

                        @error('address')
                            @include('partials.single-name-error-message')
                        @enderror

                        <div class="mb-3 col-3">
                            <label for="property-rooms" class="form-label">Property rooms*:</label>
                            <input type="number" name="rooms" id="property-rooms" class="form-control"
                                value="{{ old('rooms', $property->rooms) }}" min="1" max="15" required>
                            @error('rooms')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-beds" class="form-label">Property beds*:</label>
                            <input type="number" name="beds" id="property-beds" class="form-control"
                                value="{{ old('beds', $property->beds) }}" min="1" max="15" required>
                            @error('beds')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-bathrooms" class="form-label">Property bathrooms*:</label>
                            <input type="number" name="bathrooms" id="property-bathrooms" class="form-control"
                                value="{{ old('bathrooms', $property->bathrooms) }}" min="1" max="15" required>
                            @error('bathrooms')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-square_meters" class="form-label">Property square_meters*:</label>
                            <input type="number" name="square_meters" id="property-square_meters" class="form-control"
                                value="{{ old('square_meters', $property->square_meters) }}" min="16" max="400"
                                required>
                            @error('square_meters')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-is_visible" class="form-label">Property visiblility:</label>
                            <input type="checkbox" name="is_visible" id="property-is_visible" class="form-check-input"
                                value="1" @checked(old('is_visible', $property->is_visible))>
                            @error('is_visible')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="property-thumb_url" class="form-label">Property thumb*:</label>
                            <input type="file" name="thumb_url" id="property-thumb_url" class="form-control"
                                value="{{ old('thumb_url', $property->thumb_url) }}" required>
                            @error('thumb_url')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="col-12 d-flex justify-content-center gap-5 mb-5">
                            <button type="submit" class="btn btn-lg btn-primary col-3">@yield('form-title')</button>
                            <button type="reset" class="btn btn-lg btn-warning col-3">Reset fields</button>
                        </div>
                    </div>
                    <div class="required text-center">
                        <span class="text-secondary mt-5">The fields marked with * are required</span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var options = {
            searchOptions: {
                key: "{{ env('TOMTOM_KEY') }}",
                language: "it-IT",
                limit: 5
            },
            autocompleteOptions: {
                key: "{{ env('TOMTOM_KEY') }}",
                language: "it-IT",
            },
        }
        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();

        // Get the div where to locate the input
        const addressInput = document.querySelector(".address-property");
        addressInput.appendChild(searchBoxHTML);

        //get the input
        const searchInput = document.querySelector("input.tt-search-box-input");

        //set the all the necessary value
        searchInput.type = "text";
        searchInput.name = "address";
        searchInput.id = "search-address";
        searchInput.value = "{{ old('address', $property->address) }}";
        searchInput.autocomplete = "off";
        searchInput.required = true;

        //get search container
        const searchContainer = document.querySelector(".tt-search-box-input-container");

        //style search container
        searchContainer.style.border = "var(--bs-border-width) solid var(--bs-border-color)";
        searchContainer.style.borderRadius = "var(--bs-border-radius)";
        searchContainer.style.backgroundColor = "var(--bs-body-bg)";
    </script>
@endsection
