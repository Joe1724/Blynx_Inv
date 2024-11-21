@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('title-header')
    <h1 class="mb-6 text-3xl font-bold text-gray-800">Dashboard Overview</h1>
@endsection

@section('content')
    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-2 lg:grid-cols-4">
        {{-- Orders Count --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Customers</h5>
            <p class="text-4xl font-extrabold text-blue-600 dark:text-blue-400">{{ $orders }}</p>
        </div>

        {{-- Products Count --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Products</h5>
            <p class="text-4xl font-extrabold text-green-600 dark:text-green-400">{{ $products }}</p>
        </div>
         {{-- Total Order Items Card --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
        <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Order Items</h5>
        <p class="text-4xl font-extrabold text-purple-600 dark:text-purple-400">{{ $totalOrderItems }}</p>
        </div>
    </div>



    {{-- Revenue and Category Pie Charts Side by Side --}}
    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2">
        {{-- Revenue Chart --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Revenue (Last 30 Days)</h5>
            <p class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Total Revenue: ${{ number_format($totalRevenue, 2) }}</p>
            <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
                <canvas id="revenueChart"></canvas>
            </div>

        </div>

        {{-- Category Pie Chart --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Category Product Distribution</h5>
            <div class="relative" style="height: 300px; width: 100%;">
                <canvas id="categoryPieChart"></canvas>
            </div>
        </div>
    </div>

@endsection

{{-- Include Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Revenue Chart
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueData = {
        labels: @json($dates),
        datasets: [{
            label: 'Revenue',
            data: @json($revenues),
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
            fill: true,
        }]
    };
    const revenueOptions = {
        responsive: true,

    };
    new Chart(ctxRevenue, { type: 'line', data: revenueData, options: revenueOptions });

    // Category Pie Chart
    const ctxCategory = document.getElementById('categoryPieChart').getContext('2d');
    const categoryData = {
        labels: @json($categories->pluck('name')), // Category names
        datasets: [{
            data: @json($categories->pluck('products_count')), // Product counts
            backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#F1C40F'], // Pie slice colors
            hoverOffset: 4
        }]
    };
    const categoryOptions = {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + ' products';
                    }
                }
            }
        }
    };
    new Chart(ctxCategory, { type: 'pie', data: categoryData, options: categoryOptions });
});
</script>
