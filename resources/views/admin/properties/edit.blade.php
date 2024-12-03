@extends("admin.properties.layouts.create-edit")

@section("form-action")
    {{ route("admin.properties.update", $property)}}
@endsection

@section("form-method")
    @method("PUT")
@endsection

@section("form-title")
    Updating {{ $property->title }}
@endsection
