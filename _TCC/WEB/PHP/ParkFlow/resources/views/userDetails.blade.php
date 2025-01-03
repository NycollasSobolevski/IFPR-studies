@extends('layouts.main')
@section('title', 'Users Details - ParkFlow')

@section('header')
    @vite(['resources/css/userDetails.css'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('content')

<div class="chart-container">
    <canvas id="myChart"></canvas>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function () {
        const cities = @php
                echo json_encode($cities);
            @endphp
        ;
        const userCounts = @php
                echo json_encode($userCounts);
            @endphp
        ;

        const ctx = document.getElementById('myChart').getContext('2d');
        const usersByCityChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: cities,
                datasets: [{
                    label: 'Usuários por cidade',
                    data: userCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

</script>

@endsection
