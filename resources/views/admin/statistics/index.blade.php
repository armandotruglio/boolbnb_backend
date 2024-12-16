@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-4">
                <div class="mb-8">
                    <h2 class="text-xl font-semibold mb-4">Messages Received</h2>
                    <canvas id="messagesChart" width="400" height="200"></canvas>
                </div>
            </div>

            <div class="col-4">
                <div>
                    <h2 class="text-xl font-semibold mb-4">Views</h2>
                    <canvas id="viewsChart" width="400" height="200"></canvas>
                </div>
            </div>

        </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data for Messages Chart
        const messagesLabels = {!! json_encode($messagesLabels) !!};
        const messagesData = {!! json_encode($messagesData) !!};

        const messagesConfig = {
            type: 'bar',
            data: {
                labels: messagesLabels,
                datasets: [{
                    label: 'Messages',
                    data: messagesData,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }],
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                },
            },
        };

        // Render Messages Chart
        const messagesChart = new Chart(
            document.getElementById('messagesChart'),
            messagesConfig
        );

        // Data for Views Chart
        const viewsLabels = {!! json_encode($viewsLabels) !!};
        const viewsData = {!! json_encode($viewsData) !!};

        const viewsConfig = {
            type: 'line',
            data: {
                labels: viewsLabels,
                datasets: [{
                    label: 'Views',
                    data: viewsData,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    fill: true,
                }],
            },
            options: {
                scales: {
                    y: { beginAtZero: true },
                },
            },
        };

        // Render Views Chart
        const viewsChart = new Chart(
            document.getElementById('viewsChart'),
            viewsConfig
        );
    });
</script>
@endsection
