@extends("admin.properties.layouts.create-edit")

@section("form-action")
    {{ route("admin.properties.store")}}
@endsection

@section("form-method")
    @method("POST")
@endsection

@section("form-title")
    Create Property
@endsection
