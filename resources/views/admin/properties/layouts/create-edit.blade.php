@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="@yield('form-action')" method="POST" enctype="multipart/form-data" id="form">
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
                            <div id="title-error" class="mex invalid-feedback"></div>
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
                            <div id="description-error" class="mex invalid-feedback"></div>
                            @error('description')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>

                        <div class="mb-3 col-12">
                            <div class="address-property">
                                <label for="address" class=form-label>Property Address*:</label>
                                <div id="address-error" class="mex invalid-feedback"></div>
                            </div>
                        </div>

                        @error('address')
                            @include('partials.single-name-error-message')
                        @enderror

                        <div class="mb-3 col-3">
                            <label for="property-rooms" class="form-label">Property rooms*:</label>
                            <input type="number" name="rooms" id="property-rooms" class="form-control"
                                value="{{ old('rooms', $property->rooms) }}" min="1" max="15" required>
                            <div id="room-error" class="mex invalid-feedback"></div>
                            @error('rooms')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-beds" class="form-label">Property beds*:</label>
                            <input type="number" name="beds" id="property-beds" class="form-control"
                                value="{{ old('beds', $property->beds) }}" min="1" max="15" required>
                            <div id="bed-error" class="mex invalid-feedback"></div>
                            @error('beds')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-bathrooms" class="form-label">Property bathrooms*:</label>
                            <input type="number" name="bathrooms" id="property-bathrooms" class="form-control"
                                value="{{ old('bathrooms', $property->bathrooms) }}" min="1" max="15" required>
                            <div id="bathroom-error" class="mex invalid-feedback"></div>
                            @error('bathrooms')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>
                        <div class="mb-3 col-3">
                            <label for="property-square_meters" class="form-label">Property square_meters*:</label>
                            <input type="number" name="square_meters" id="property-square_meters" class="form-control"
                                value="{{ old('square_meters', $property->square_meters) }}" min="16" max="400"
                                required>
                            <div id="metres-error" class="mex invalid-feedback"></div>
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
                        <div class="mb-3 ">
                            <label for="property-servicves" class="form-label">Services:</label>
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input type="checkbox" name="services[]" id="property-servicves"
                                        class="form-check-input" value="{{ $service->id }}" @checked(in_array($service->id, old('services', $property->services->pluck('id')->toArray())))>
                                    <label type="checkbox" name="services[]" id="property-servicves"
                                        class="form-check-label">
                                        {{ $service->name }}
                                    </label>
                                </div>
                            @endforeach
                            @error('services')
                                @include('partials.single-name-error-message')
                            @enderror

                            @error('services.*')
                                @include('partials.single-name-error-message')
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="input-image mb-3">
                                <label for="property-thumb_url" class="form-label">Property thumb*:</label>
                                <input type="file" name="thumb_url" id="property-thumb_url" class="form-control"
                                    accept="image/*" @required(!isset($property->thumb_url))>
                                <div id="thumb-error" class="mex invalid-feedback"></div>
                            </div>
                            @if (isset($property->thumb_url))
                                <div class="image mb-3">
                                    <img src="{{ asset('/storage/' . $property->thumb_url) }}"
                                        alt="{{ $property->title }}" class="img-fluid rounded"
                                        style="height:100px; width:100px">
                                </div>
                                <span>Current image</span>
                            @endif
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

        //validation form
        const propertyForm = document.getElementById("form");

        propertyForm.addEventListener("submit", function(e) {

            let success = true;

            const mex = document.querySelectorAll("mex");
            mex.forEach(element => {
                mex.innerHTML = "";
            });

            //verify title
            const title = document.getElementById("property-title");
            const titleValue = title.value.trim();
            const titleError = document.getElementById("title-error");
            let titleErrorMessage = "";
            if (titleValue.length < 3 || titleValue.length > 255) {
                success = false;
                titleErrorMessage = "il titolo deve essere compreso tra 3 e 255 caratteri";
                title.classList.add("is-invalid");
            } else if (!/^[a-zA-Z0-9$_]+$/.test(titleValue)) {
                success = false;
                titleErrorMessage = "il titolo non può contenere caratteri speciali";
                title.classList.add("is-invalid");
            } else {
                title.classList.remove("is-invalid");
                title.classList.add("is-valid");
            }
            titleError.innerHTML = titleErrorMessage;

            //verify description
            const description = document.getElementById("property-description");
            const descriptionRule = document.getElementById("description-rule");
            const descriptionValue = description.value.trim();
            const descriptionError = document.getElementById("description-error");
            let descriptionErrorMessage = "";
            if (descriptionValue.length < 20 || descriptionValue.length > 250) {
                descriptionRule.hidden = true;
                success = false;
                descriptionErrorMessage = "la descrizione deve essere compresa tra 20 e 250 caratteri";
                description.classList.add("is-invalid");
            } else {
                descriptionRule.hidden = false;
                description.classList.remove("is-invalid");
                description.classList.add("is-valid");
            }
            descriptionError.innerHTML = descriptionErrorMessage;

            /*
                        //verify address
                        const address = document.getElementById("search-address");
                        const addressValue = address.value.trim();
                        const addressError = document.getElementById("address-error");
                        let addressErrorMessage = "";
                        if (addressValue.length < 5 || addressValue.length > 255) {
                            success = false;
                            addressErrorMessage = "l'indirizzo deve essere compreso tra 5 e 255 caratteri";
                            address.classList.add("is-invalid");
                        } else {
                            address.classList.remove("is-invalid");
                            address.classList.add("is-valid");
                        }
                        addressError.innerHTML = addressErrorMessage;
            */

            //verify rooms
            const rooms = document.getElementById("property-rooms");
            const roomsValue = rooms.value.trim();
            const roomsError = document.getElementById("room-error");
            let roomsErrorMessage = "";
            if (roomsValue < 1 || roomsValue > 15) {
                success = false;
                roomsErrorMessage = "non ci possono essere meno di 1 stanza o più di 15 stanze";
                rooms.classList.add("is-invalid");
            } else {
                rooms.classList.remove("is-invalid");
                rooms.classList.add("is-valid");
            }
            roomsError.innerHTML = roomsErrorMessage;

            //verify beds
            const beds = document.getElementById("property-beds");
            const bedsValue = beds.value.trim();
            const bedsError = document.getElementById("bed-error");
            let bedsErrorMessage = "";
            if (bedsValue < 1 || bedsValue > 15) {
                success = false;
                bedsErrorMessage = "non ci possono essere meno di 1 letto o più di 15 letti";
                beds.classList.add("is-invalid");
            } else {
                beds.classList.remove("is-invalid");
                beds.classList.add("is-valid");
            }
            bedsError.innerHTML = bedsErrorMessage;

            //verify bathrooms
            const bathrooms = document.getElementById("property-bathrooms");
            const bathroomsValue = bathrooms.value.trim();
            const bathroomsError = document.getElementById("bathroom-error");
            let bathroomsErrorMessage = "";
            if (bathroomsValue < 1 || bathroomsValue > 15) {
                success = false;
                bathroomsErrorMessage = "non ci possono essere meno di 1 bagno o più di 15 bagni";
                bathrooms.classList.add("is-invalid");
            } else {
                bathrooms.classList.remove("is-invalid");
                bathrooms.classList.add("is-valid");
            }
            bathroomsError.innerHTML = bathroomsErrorMessage;

            //verify square metres
            const squareMeters = document.getElementById("property-square_meters");
            const squareMetersValue = squareMeters.value.trim();
            const squareMetersError = document.getElementById("metres-error");
            let squareMetersErrorMessage = "";
            if (squareMetersValue < 16 || squareMetersValue > 400) {
                success = false;
                squareMetersErrorMessage = "non ci possono essere meno di 1 stanza o più di 15 stanze";
                squareMeters.classList.add("is-invalid");
            } else {
                squareMeters.classList.remove("is-invalid");
                squareMeters.classList.add("is-valid");
            }
            squareMetersError.innerHTML = squareMetersErrorMessage;

            //verify image
            const thumb = document.getElementById("property-thumb_url");
            const thumbValue = thumb.value.trim();
            const thumbError = document.getElementById("thumb-error");
            let thumbErrorMessage = "";
            if (!/\.(jpg|jpeg|gif|png)$/.test(thumbValue)) {
                success = false;
                thumbErrorMessage = "immagine è di un tipo di file non supportato";
                thumb.classList.add("is-invalid");
            } else {
                thumb.classList.remove("is-invalid");
                thumb.classList.add("is-valid");
            }
            thumbError.innerHTML = thumbErrorMessage;




            //prevent sending form
            if (!success) {
                e.preventDefault();
            }
        })
    </script>
@endsection
