@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="fw-bold text-center fst-italic">
                    Property Show
                </h1>
            </div>
            <div class="col-12">
                <table class="table table-hover border">
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
                        <tr>
                            <td>
                                ID: {{ $property->id }}
                            </td>
                            <td>
                                Title: {{ $property->title }}
                            </td>
                            <td>
                                Description:
                                {{ $property->description }}
                            </td>
                            <td>
                                Latitude: {{ $property->latitude }}
                            </td>
                            <td>
                                Longitude: {{ $property->longitude }}
                            </td>
                            <td>
                                Rooms: {{ $property->rooms }}
                            </td>
                            <td>
                                Beds: {{ $property->beds }}
                            </td>
                            <td>
                                Bathrooms: {{ $property->bathrooms }}
                            </td>
                            <td>
                                Square Meters: {{ $property->square_meters }}
                            </td>
                            <td>
                                Is Visible: {{ $property->is_visible }}
                            </td>
                            <td>
                                Thumb: {{ $property->thumb_url }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
