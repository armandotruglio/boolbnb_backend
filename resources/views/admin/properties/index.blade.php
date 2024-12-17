@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="fw-bold">
                    My Properties: {{ count($properties) }}
                </h1>
            </div>

            @if (count($properties) === 0)
                <div class="col-12 text-center">
                    <h4 class="text-muted">
                        Sorry, {{ Auth::user()->name }}. You don't have any properties at the moment!
                    </h4>
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-success btn-lg mt-3 shadow-sm">
                        Insert a New Property!
                    </a>
                </div>
            @else
                <div class="col-12">
                    <div class="button-group d-flex justify-content-end">
                        <div class="d-flex mb-3 me-5">
                            <a href="{{ route('admin.sponsorships.index') }}" class="btn btn-success btn-lg shadow-sm">
                                Sponsor one of your Property!
                            </a>
                        </div>
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('admin.properties.create') }}" class="btn btn-primary btn-lg shadow-sm">
                                Insert a New Property!
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive shadow-sm rounded">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Title</th>
                                    <th>Address</th>
                                    <th>Sponsorship</th>
                                    <th>Visible</th>
                                    <th>Services</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                    <tr>
                                        <td id="apartment{{ $property->id }}">{{ $property->title }}</td>
                                        <td>{{ $property->address }}</td>
                                        <td>
                                            @forelse ($property->sponsorships as $sponsorship)
                                                <span class="badge bg-success">{{ $sponsorship->name }}</span>
                                                <small class="text-muted d-block"
                                                    style="font-size: 0.73rem; color: #000000;">
                                                    Expires on:
                                                    {{ \Carbon\Carbon::parse($sponsorship->pivot->end_date)->format('d/m/Y H:i') }}
                                                </small>
                                            @empty
                                                <span class="text-muted">No sponsorship available</span>
                                            @endforelse
                                        </td>
                                        <td>{{ $property->is_visible ? 'Yes' : 'No' }}</td>
                                        <td>
                                            @forelse ($property->services as $service)
                                                <span class="badge bg-info">{{ $service->name }}</span>
                                            @empty
                                                <span class="text-muted">No services available</span>
                                            @endforelse
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-info me-2 shadow-sm col-xxl-4 col-xl-5 col-lg-6"
                                                href="{{ route('admin.properties.show', $property->id) }}">
                                                Details
                                            </a>
                                            <a href="{{ route('admin.properties.edit', $property) }}"
                                                class="btn btn-warning btn-sm me-2 shadow-sm col-xxl-3 col-xl-4 col-lg-5">
                                                Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm shadow-sm col-xxl-4 col-xl-5 col-lg-6" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" data-id="{{ $property->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-message"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Confirm Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const modalMessage = document.getElementById('modal-message');

        // Animazione per mostrare il modal
        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const propertyId = button.getAttribute('data-id');
            const propertyName = document.getElementById('apartment' + propertyId).innerText;

            modalMessage.innerHTML =
                `<span>Are you sure you want to delete the <b>${propertyName}</b>?</span>`;
            deleteForm.action = `/admin/properties/${propertyId}`;
        });

        // Aggiungi un effetto di fade-in alla pagina
        document.body.style.opacity = 0;
        document.body.style.transition = "opacity 0.5s ease-in-out";
        setTimeout(() => {
            document.body.style.opacity = 1;
        }, 100);
    });
</script>

<style>
    /* Generale per rendere il layout responsive */
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    /* Pulsanti */
    .btn {
        transition: all 0.3s ease-in-out;
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Modale */
    .modal-content {
        transform: scale(0.8);
        transition: transform 0.3s ease-in-out;
    }

    .modal.show .modal-content {
        transform: scale(1);
    }

    /* Media query per schermi piccoli */
    @media (max-width: 768px) {
        .btn {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
        }

        .table thead {
            display: none;
        }

        .table tr {
            display: block;
            margin-bottom: 1rem;
        }

        .table td {
            display: flex;
            justify-content: center;
            padding: 0.5rem 1rem;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        .table td::before {
            content: attr(data-label);
            font-weight: bold;
            text-transform: uppercase;
        }
    }
</style>
