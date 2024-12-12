@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center pb-4">
            <h1 class="display-5 text-primary font-weight-bold">Message Details</h1>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5>Message from: {{ $message->sender_name }} {{ $message->sender_last_name }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Email:</strong> <a href="mailto:{{ $message->sender_email }}" class="text-decoration-none text-primary">{{ $message->sender_email }}</a></p>
                    <p><strong>Property:</strong> {{ $message->property->title }}</p>
                    <p><strong>Address:</strong> {{ $message->property->address }}</p>
                    <p><strong>Received on:</strong> {{ $message->created_at->format('d/m/Y H:i') }}</p>
                    <hr>
                    <p class="fs-5">{{ $message->message }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('messages.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        <i class="fa-solid fa-arrow-left"></i> Back to Messages
                    </a>
                    <a href="mailto:{{ $message->sender_email }}" class="btn btn-success rounded-pill px-4 py-2">
                        <i class="fa-solid fa-reply"></i> Reply
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Container */
    .container {
        max-width: 900px;
    }

    /* Header title */
    h1 {
        font-size: 2.5rem;
        font-weight: 600;
        color: #004085;
    }

    /* Card styling */
    .card {
        border-radius: 15px;
        border: none;
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Card header */
    .card-header {
        font-size: 1.25rem;
        background-color: #007bff;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 1rem;
    }

    /* Card body text */
    .card-body {
        font-size: 1.1rem;
        line-height: 1.6;
        color: #495057;
    }

    .fs-5 {
        font-size: 1.2rem;
    }

    /* Card footer */
    .card-footer {
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
    }

    /* Button styles */
    .btn {
        font-size: 1rem;
        font-weight: 500;
        border-radius: 25px;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-success:hover {
        background-color: #218838;
        color: #fff;
    }

    /* Link styling */
    a {
        color: inherit;
        text-decoration: none;
        transition: color 0.3s;
    }

    a:hover {
        color: #007bff;
        text-decoration: underline;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .card {
            margin-top: 15px;
        }
    }
</style>
