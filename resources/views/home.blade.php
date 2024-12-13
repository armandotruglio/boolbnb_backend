@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 section">
    <div class="row justify-content-center bar">
        <div class="col-md-15">
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

                    <h2 class="fw-bold text-primary my-3" id="welcome-text">Welcome to your Dashboard!</h2>
                    <p class="lead text-muted" id="welcome-description">
                        {{ __('You have successfully entered the system!') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const welcomeText = document.getElementById('welcome-text');
        const welcomeDescription = document.getElementById('welcome-description');


        welcomeText.style.opacity = 0;
        welcomeDescription.style.opacity = 0;


        setTimeout(() => {
            welcomeText.style.transition = 'opacity 1.5s ease, transform 1.5s ease';
            welcomeText.style.opacity = 1;
            welcomeText.style.transform = 'translateY(0)';
        }, 200);


        setTimeout(() => {
            welcomeDescription.style.transition = 'opacity 1.5s ease';
            welcomeDescription.style.opacity = 1;
        }, 1000);
    });
</script>

<style>
    .section {
        height: 512px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #welcome-text {
        transform: translateY(-20px); /* Partenza animazione */
    }

    .bar{
        width: 600px;
    }
</style>
@endsection
