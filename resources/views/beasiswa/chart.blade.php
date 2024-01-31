@extends('layouts.master')

@section('content')

    {{-- navbar start --}}
    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand text-light" href="#" style="font-size: 24px; font-weight: bold;">Beasiswa</a>
            <ul class="navbar-nav d-flex flex-row">
                <li class="nav-item me-4">
                    <a href="/" class="nav-link text-light py-2">Home</a>
                </li>
            </ul>
        </div>
    </nav>
    {{-- navbar end --}}

    <div class="container mt-4 text-center">
        <h1 class="mb-4">Grafik Semester yang mengikuti program Beasiswa</h1>
        <div class="chart-container d-flex justify-content-center align-items-center" style="position: relative; height: 300px; width: 80vw;">
            <canvas id="beasiswaChart"></canvas>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('beasiswaChart').getContext('2d');
            var data = @json($data);

            var chart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(data),
                    datasets: [{
                        label: 'Jumlah Beasiswa',
                        data: Object.values(data),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
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