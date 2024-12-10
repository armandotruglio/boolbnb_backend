@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h1>MESSAGES</h1>
        </div>
    </div>

    <ul class="list-unstyled">
        @forelse ($messages as $message)
            <li class="mb-3">
                <div class="message card p-3">
                    <div class="name fs-3 fw-bold">
                        <span>{{ $message->sender_name }}</span>
                        <span>{{ $message->sender_last_name }}</span>
                    </div>
                    <div class="email mb-3">
                        <span>{{ $message->sender_email }}</span>
                    </div>
                    <p>
                        {{ $message->message }}
                    </p>
                </div>
            </li>
        @empty

        @endforelse
    </ul>
</div>
@endsection
