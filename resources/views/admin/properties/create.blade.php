@extends("admin.properties.layouts.create-edit.blade.php")

@section("form-action")
    {{ route("admin.properties.store", $property)}}
@endsection

@section("form-method")
    @method("POST")
@endsection

@section("form-title")
    Creating {{ $property->title }}
@endsection
