@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="fw-bold text-center fst-italic text-decoration-underline"> Properties list</h1>
            </div>
            @if (count($properties) === 0)
                <div class="col-12 pt-5 text-center">
                    <h4>Sorry {{ Auth::user()->name }} you don't have any properties at the moment!</h1>
                </div>
                <div class="col-12 text-center">
                    <div class="py-3">
                        <a href="{{ route('admin.properties.create') }}" class="btn btn-lg btn-success">Insert a new Property
                            !</a>
                    </div>
                </div>
            @else
                <div class="col-12">
                    <div class="col-12">
                        <div class="my-3">
                            <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Insert a new Property
                                !</a>
                        </div>
                    </div>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Address</th>
                                <th scope="col">Sponsorship</th>
                                <th scope="col">Visible</th>
                                <th scope="col">Services</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <th scope="row"> {{ $property->id }} </td>
                                    <td id="apartment {{ $property->id }}"> {{ $property->title }} </td>
                                    <td> {{ $property->address }} </td>
                                    <td>
                                        @forelse ($property->sponsorships as $sponsorship)
                                            <span>
                                                {{ $sponsorship->name }}
                                            </span>
                                        @empty
                                            <span>No sponsorship available</span>
                                        @endforelse
                                    </td>
                                    <td> {{ $property->is_visible ? 'yes' : 'no' }} </td>
                                    <td>
                                        @forelse ($property->services as $service)
                                            <span>
                                                {{ $service->name }}-
                                            </span>
                                        @empty
                                            <span>No services available</span>
                                        @endforelse
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-sm btn-info me-2"
                                            href="{{ route('admin.properties.show', $property->id) }}">Show</a>
                                        <a href="{{ route('admin.properties.edit', $property) }}"
                                            class="btn btn-warning btn-sm me-2">Edit</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" data-id="{{ $property->id }}">
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-message">

                </div>
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

    <script>
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');
        const modalMessage = document.getElementById('modal-message');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const propertyId = button.getAttribute('data-id');
            const propertyName = document.getElementById('apartment ' + propertyId).innerText;
            modalMessage.innerHTML = `<span>Are you sure you want to delete the <b>${propertyName}</b> ?</span>`;
            deleteForm.action = `/admin/properties/${propertyId}`;
        });
    </script>
@endsection
