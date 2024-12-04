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
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>Rooms</th>
                        <th>Beds</th>
                        <th>Bathrooms</th>
                        <th>Square Meters</th>
                        <th>Is visible</th>
                        <th>Thumb url</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($properties as $property)
                        <tr>
                            <td> {{ $property->id }} </td>
                            <td> {{ $property->title }} </td>
                            <td> {{ $property->description }} </td>
                            <td> {{ $property->latitude }} </td>
                            <td> {{ $property->longitude }} </td>
                            <td> {{ $property->rooms }} </td>
                            <td> {{ $property->beds }} </td>
                            <td> {{ $property->bathrooms }} </td>
                            <td> {{ $property->square_meters }}</td>
                            <td> {{ $property->is_visible }} </td>
                            <td> {{ $property->thumb_url }} </td>
                            <td>
                                <a class="btn btn-sm btn-info"
                                    href="{{ route('admin.properties.show', $property->id) }}">Show</a>
                                <a href="{{ route('admin.properties.edit', $property) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
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


    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this property?
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

        deleteModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const propertyId = button.getAttribute('data-id');
            deleteForm.action = `/admin/properties/${propertyId}`;
        });
    </script>
@endsection
