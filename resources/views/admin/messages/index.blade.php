@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center pb-5">
            <h1 class="fw-bold">Messages</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Sender Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Property</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                    <tr class="message-row">
                        <td>{{ $message->sender_name }} {{ $message->sender_last_name }}</td>
                        <td>{{ $message->sender_email }}</td>
                        <td>{{ $message->property->title ?? 'N/A' }}</td>
                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-outline-primary btn-sm view-btn">View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No messages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.message-row');
        rows.forEach(row => {
            row.addEventListener('mouseover', function() {
                this.classList.add('animate__animated', 'animate__pulse');
            });
            row.addEventListener('mouseout', function() {
                this.classList.remove('animate__animated', 'animate__pulse');
            });
        });

        const buttons = document.querySelectorAll('.view-btn');
        buttons.forEach(button => {
            button.addEventListener('mouseover', function() {
                this.classList.add('btn-hover');
            });
            button.addEventListener('mouseout', function() {
                this.classList.remove('btn-hover');
            });
        });
    });
</script>

<style>

    .message-row {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .message-row:hover {
        transform: scale(1.02);
        background-color: #f9f9f9;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    /* Bottone 'View' effetto hover */
    .view-btn {
        transition: background-color 0.3s ease, transform 0.3s ease;
        padding: 5px 15px;
        font-size: 0.9rem;
    }

    .view-btn:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-hover {
        background-color: #0069d9;
        transform: scale(1.1);
    }


    h1 {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }


    @media (max-width: 768px) {
        .view-btn {
            font-size: 0.8rem;
            padding: 5px 10px;
        }

        h1 {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 576px) {
        .view-btn {
            font-size: 0.8rem;
            padding: 4px 10px;
        }

        h1 {
            font-size: 1.5rem;
        }
    }
</style>

@endsection
