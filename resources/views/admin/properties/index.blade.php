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
                                <form action="{{ route('admin.properties.destroy', $property) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
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
@endsection
