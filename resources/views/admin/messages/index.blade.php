@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pb-5">
            <h1>MESSAGES</h1>
        </div>
    </div>

    <div class="row">
        @forelse ($messages as $message)
        <div class="col">
            <ul class="list-unstyled">
                    <li class="mb-3">
                        <div class="message card p-3">
                            <div class="name">
                                <span class="fs-4 me-2">Sender full name:</span>
                                <span class="fs-3 fw-bold">{{ $message->sender_name }}</span>
                                <span class="fs-3 fw-bold">{{ $message->sender_last_name }}</span>
                            </div>
                            <div class="email">
                                <span class="fs-4 me-2">Sender email:</span>
                                <span class="fs-3 fw-bold">{{ $message->sender_email }}</span>
                            </div>
                            <div class="object mb-5">
                                <span class="fs-4 me-2">About:</span>
                                <span class="fs-3 fw-bold">{{ $message->property->title }}</span>
                                <address>Address: {{ $message->property->address }}</address>
                            </div>
                            <p class="text-center fs-3">
                                {{ $message->message }}
                            </p>
                        </div>
                    </li>
            </ul>
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
