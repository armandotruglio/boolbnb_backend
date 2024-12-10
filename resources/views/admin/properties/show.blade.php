@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bold text-center fst-italic">
                    Property Show
                </h1>
            </div>
            <div class="col-8 m-auto">

                <div class="card text-center">
                    <img src="{{ asset('/storage/' . $property->thumb_url) }}" class="card-img-top img-fluid"
                        alt=" {{ $property->title }} ">
                    <div class="card-body">
                        <h2 class="card-title fw-bold">
                            #{{ $property->id }} Title: {{ $property->title }}
                        </h2>
                        <p class="card-text">
                            {{ $property->description }}
                        </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Latitude: {{ $property->latitude }} | Longitude: {{ $property->longitude }}
                        </li>
                        <li class="list-group-item">
                            Address: {{ $property->address }}
                        </li>
                        <li class="list-group-item">
                            Rooms: {{ $property->rooms }} | Beds: {{ $property->beds }} | Bathrooms:
                            {{ $property->bathrooms }}
                        </li>
                        <li class="list-group-item">
                            Square Meters: {{ $property->square_meters }}
                        </li>
                        <li class="list-group-item">
                            Is Visible: {{ $property->is_visible ? 'yes' : 'no' }}
                        </li>
                        <li>
                            @forelse ($property->services as $service)
                                <span class="badge text-bg-dark">
                                    {{ strtolower($service->name) }}
                                    {{ strtolower($service->icon_url) }}

                                </span>
                            @empty
                                <span>No Services available</span>
                            @endforelse
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection
