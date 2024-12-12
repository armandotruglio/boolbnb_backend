@extends('layouts.app')

@section('content')

<div class="property-container">
    <img src="{{ asset('/storage/' . $property->thumb_url) }}" class="property-image" alt="{{ $property->title }}">

    <h1 class="property-title">
        #{{ $property->id }} - {{ $property->title }}
    </h1>

    <div class="property-details">
        <p>
            <strong>Description:</strong> {{ $property->description }}
        </p>
        <ul class="list-unstyled">
            <li class="list-item">
                <strong>Latitude:</strong> {{ $property->latitude }} | <strong>Longitude:</strong> {{ $property->longitude }}
            </li>
            <li class="list-item">
                <strong>Address:</strong> {{ $property->address }}
            </li>
            <li class="list-item">
                <strong>Rooms:</strong> {{ $property->rooms }} | <strong>Beds:</strong> {{ $property->beds }} | <strong>Bathrooms:</strong> {{ $property->bathrooms }}
            </li>
            <li class="list-item">
                <strong>Square Meters:</strong> {{ $property->square_meters }}
            </li>
            <li class="list-item">
                <strong>Is Visible:</strong> {{ $property->is_visible ? 'Yes' : 'No' }}
            </li>
            <li class="list-item">
                <strong>Services:</strong>
                @forelse ($property->services as $service)
                    <span class="badge">{{ $service->name }}</span>
                @empty
                    <span>No services available</span>
                @endforelse
            </li>
            <li class="list-item">
                <strong>Sponsorships:</strong>
                @forelse ($property->sponsorships as $sponsorship)
                    <div>
                        {{ $sponsorship->name }} for <strong>{{ $sponsorship->duration }}</strong> hours at <strong>{{ $sponsorship->price }}€</strong>
                    </div>
                @empty
                    <span>No sponsorships available</span>
                @endforelse
            </li>
        </ul>
    </div>
</div>
@endsection

<style>
    body {
        background-color: #f4f4f4;
        font-family: Arial, sans-serif;
    }

    .property-container {
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        max-width: 900px;
    }

    .property-image {
        width: 100%;
        border-radius: 8px;
        margin-bottom: 20px;
        object-fit: cover;
        max-height: 400px;
    }

    .property-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .property-details {
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .badge {
        font-size: 0.9rem;
        margin-right: 5px;
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .list-item {
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .list-item:last-child {
        border-bottom: none;
    }
</style>
