@extends('layout')
@section('title', 'Edit Transaction')
@section('content')
<canvas id="monthlyGraph"></canvas>
<canvas id="dailyProfitGraph"></canvas>

<script src="{{ asset('js/chart.min.js') }}"></script>
<script>
    // Generate the monthly sales and purchase graph
    var monthlyCanvas = document.getElementById('monthlyGraph').getContext('2d');
    new Chart(monthlyCanvas, {
        type: 'bar',
        data: {
            labels: {!! json_encode($monthlyData['labels']) !!},
            datasets: [
                {
                    label: 'Sales',
                    data: {!! json_encode($monthlyData['sales']) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Purchase',
                    data: {!! json_encode($monthlyData['purchases']) !!},
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            // Customize the options as needed
        }
    });

    // Generate the daily profit graph
    var dailyProfitCanvas = document.getElementById('dailyProfitGraph').getContext('2d');
    new Chart(dailyProfitCanvas, {
        type: 'line',
        data: {
            labels: {!! json_encode($dailyProfitData['labels']) !!},
            datasets: [
                {
                    label: 'Daily Profit',
                    data: {!! json_encode($dailyProfitData['profits']) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            // Customize the options as needed
        }
    });
</script>
@endsection