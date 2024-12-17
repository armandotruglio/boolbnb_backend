@extends('layouts.app')

@section('content')
<div class="property-container py-0 mt-3 mx-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <div class="col-12 mt-3 text-center">
                <h1 class="property-title fw-bold mb-4">{{ $property->title }}</h1>
            </div>
            <img src="{{ asset('/storage/' . $property->thumb_url) }}" class="property-image img  rounded shadow-sm col-xxl-6 col-xl-7 col-lg-7 col-md-8 col-sm-12 col-12" alt="{{ $property->title }}">
        </div>
        <div class="col-12 mt-4">
            <div class="property-details">
                <p class="text-muted fs-6">
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
                        <strong>Is Visible:</strong> <span class="badge {{ $property->is_visible ? 'bg-success' : 'bg-danger' }}">{{ $property->is_visible ? 'Yes' : 'No' }}</span>
                    </li>
                    <li class="list-item">
                        <strong>Services:</strong>
                        @forelse ($property->services as $service)
                            <span class="badge bg-primary shadow-sm">{{ $service->name }}</span>
                        @empty
                            <span class="text-muted">No services available</span>
                        @endforelse
                    </li>
                    <li class="list-item">
                        <strong>Sponsorships:</strong>
                        @forelse ($property->sponsorships as $sponsorship)
                            <div class="mt-2">
                                <span class="badge bg-info text-dark">{{ $sponsorship->name }}</span>
                                <span class="text-muted">for <strong>{{ $sponsorship->duration }}</strong> hours at <strong>{{ $sponsorship->price }}€</strong></span>
                            </div>
                        @empty
                            <span class="text-muted">No sponsorships available</span>
                        @endforelse
                    </li>
                </ul>
            </div>
        </div>
        <div class="d-flex colmn justify-content-center">
            <a class="btn btn-lg btn-info me-2 shadow-sm col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-5 col-9"
                href="{{ route('admin.property.messages', $property->id) }}">
                Property messages
            </a>
            <a class="btn btn-lg btn-info me-2 shadow-sm col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-5 col-9"
                    href="{{ route('admin.property.statistics', $property->id) }}">
                    Property stats
            </a>
        </div>


    </div>
</div>
@endsection

<style>
body {
    background: #f8f9fa;
    font-family: 'Roboto', sans-serif;
    color: #333;
}

.property-container {
    /* padding: 100px; */
    overflow: hidden;
}

.property-image {
    max-width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    transition: transform 0.5s ease;
}

.property-title {
    font-size: 2rem;
    color:black;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
}

.property-details {
    font-size: 0.95rem;
    line-height: 1.6;
}

.list-item {
    padding: 8px 0;
    border-bottom: 1px solid #ddd;
}

.list-item:last-child {
    border-bottom: none;
}

.list-item:hover {
    background-color: #f1f1f1;
}

.badge {
    font-size: 0.85rem;
    padding: 4px 8px;
    border-radius: 5px;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .property-title {
        font-size: 1.8rem;
    }

    .list-item {
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .property-container {
        padding: 15px;
    }

    .property-title {
        font-size: 1.6rem;
    }

    .property-image {
        /* max-width: 90%; */
    }

    .list-item {
        font-size: 0.85rem;
    }
    .colmn{
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }
}
</style>
