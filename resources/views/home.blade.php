@extends('layouts.app')

@section('content')
<div class="container-fluid bg-primary py-5 section ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-dark text-white text-center fs-3">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2 class="fw-bold text-primary my-3">Welcome to your Dashboard!</h2>
                    <p class="lead text-muted">
                        {{ __('You have successfully entered the system!') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Aggiungi un'animazione JavaScript per l'animazione di benvenuto -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let welcomeText = document.querySelector('h2');
        welcomeText.classList.add('animate__animated', 'animate__fadeIn');
    });
</script>

<style>
    .section{
        height: 512px;
    }
</style>

@endsection
