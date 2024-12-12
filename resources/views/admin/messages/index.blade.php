@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center pb-5">
            <h1 class="animate__animated animate__fadeIn">MESSAGES</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
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
                            <a href="{{ route('messages.show', $message->id) }}" class="btn btn-primary view-btn">View</a>
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

<!-- Animazioni JS -->
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
    /* Animazioni per le righe della tabella */
    .message-row {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    /* Aggiungi un'ombra e ingrandisci la riga al passaggio del mouse */
    .message-row:hover {
        transform: scale(1.02);
        background-color: #f1f1f1;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Bottone 'View' effetto hover */
    .view-btn {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .view-btn:hover {
        background-color: #0056b3; /* Cambia il colore al passaggio del mouse */
        transform: scale(1.05); /* Ingrandimento bottone */
    }

    /* Aggiungi animazione di ingresso per la pagina */
    h1 {
        opacity: 0;
        animation: fadeIn 1s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Personalizza la classe hover per il bottone */
    .btn-hover {
        background-color: #0069d9;
        transform: scale(1.1); /* Ingrandisci al passaggio del mouse */
    }
</style>

@endsection
