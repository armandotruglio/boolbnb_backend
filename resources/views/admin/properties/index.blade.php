@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bold text-center fst-italic text-decoration-underline"> Properties list</h1>
            </div>
            <div class="col-12">
                <div class="my-3">
                    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">Insert a new Property !</a>
                </div>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Address</th>
                            <th>Rooms</th>
                            <th>Beds</th>
                            <th>Bathrooms</th>
                            <th>Square Meters</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($properties as $property)
                            <tr>
                                <td> {{ $property->id }} </td>
                                <td id="apartment {{$property->id}}"> {{ $property->title }} </td>
                                <td> {{ $property->address }} </td>
                                <td> {{ $property->rooms }} </td>
                                <td> {{ $property->beds }} </td>
                                <td> {{ $property->bathrooms }} </td>
                                <td> {{ $property->square_meters }}</td>
                                <td class="d-flex">
                                    <a class="btn btn-sm btn-info me-2"
                                        href="{{ route('admin.properties.show', $property->id) }}">Show</a>
                                    <a href="{{ route('admin.properties.edit', $property) }}"
                                        class="btn btn-warning btn-sm me-2">Edit</a>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-id="{{ $property->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>No properties available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
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

        deleteModal.addEventListener('show.bs.modal', function (event) {
            modalMessage.textContent = '';
            const button = event.relatedTarget;
            const propertyId = button.getAttribute('data-id');
            const propertyName = document.getElementById('apartment ' + propertyId).innerText;
            modalMessage.append("Are you sure you want to delete the " + propertyName + "?");
            deleteForm.action = `/admin/properties/${propertyId}`;
        });
        </script>
@endsection
