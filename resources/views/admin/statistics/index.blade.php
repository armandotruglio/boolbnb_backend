@extends('layouts.app')

@section('content')
<div class="container-fluid">

        <div class="row text-center pb-5 pt-3">
            <div class="col-12">
                <h3 class="text-primary">Stats for:</h1>
                <span class="fw-bold fs-2">{{$property->title}}</span>
            </div>
        </div>

        <div class="row justify-content-center text-center">

            <div class="col-lg-4 mb-4">
                <div class="card p-4 border border-primary border-3">
                    <h2 class="text-xl font-semibold mb-4">Messages by month</h2>
                    <canvas id="messagesChart" width="400" height="200"></canvas>
                </div>
            </div>

            <div class="col-lg-4 mb-4">
                <div class="card p-4 border border-primary border-3">
                    <h2 class="text-xl font-semibold mb-4">Views by month</h2>
                    <canvas id="viewsChart" width="400" height="200"></canvas>
                </div>
            </div>

        </div>

        <div class="row justify-content-center text-center pb-5">

            <div class="col-lg-4 mb-4">
                <div class="card p-4 border border-primary border-3">
                    <h2 class="text-xl font-semibold mb-4">Messages by year</h2>
                    <canvas id="messagesYearChart" width="400" height="200"></canvas>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card p-4 mb-4 border border-primary border-3">
                    <h2 class="text-xl font-semibold mb-4">Views by year</h2>
                    <canvas id="viewsYearChart" width="400" height="200"></canvas>
                </div>
            </div>

        </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data for Messages Chart
        const messagesLabels = {!! json_encode($messagesLabels) !!};
        const messagesData = {!! json_encode($messagesData) !!};
        const messagesYearLabels = {!! json_encode($messagesYearLabels) !!};
        const messagesYearData = {!! json_encode($messagesYearData) !!};

        const messagesConfig = {
            type: 'bar',
            data: {
                labels: messagesLabels,
                datasets: [{
                    label: 'Messages by month',
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

        const messagesYearConfig = {
            type: 'bar',
            data: {
                labels: messagesYearLabels,
                datasets: [{
                    label: 'Messages by year',
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
        const messagesYearChart = new Chart(
            document.getElementById('messagesYearChart'),
            messagesYearConfig
        );

        // Data for Views Chart
        const viewsLabels = {!! json_encode($viewsLabels) !!};
        const viewsData = {!! json_encode($viewsData) !!};
        const viewsYearLabels = {!! json_encode($viewsYearLabels) !!};
        const viewsYearData = {!! json_encode($viewsYearData) !!};

        const viewsConfig = {
            type: 'line',
            data: {
                labels: viewsLabels,
                datasets: [{
                    label: 'Views by month',
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

        const viewsYearConfig = {
            type: 'line',
            data: {
                labels: viewsYearLabels,
                datasets: [{
                    label: 'Views by year',
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
        const viewsYearChart = new Chart(
            document.getElementById('viewsYearChart'),
            viewsYearConfig
        );
    });
</script>
@endsection
