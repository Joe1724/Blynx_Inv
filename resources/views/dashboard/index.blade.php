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
            <div class="flex items-center space-x-3">
                <!-- Icon -->
                <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                  </svg>
                <!-- Customer Number -->
                <p class="text-4xl font-extrabold text-blue-600 dark:text-blue-400">{{ $orders }}</p>
            </div>
        </div>


        {{-- Products Count --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Products</h5>
            <div class="flex items-center space-x-3">
                <svg class="w-[32px] h-[32px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z" clip-rule="evenodd"/>
                  </svg>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                  </svg>
                <p class="text-4xl font-extrabold text-green-600 dark:text-green-400">{{ $products }}</p>
            </div>
        </div>
         {{-- Total Order Items Card --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
        <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Order Items</h5>
        <div class="flex items-center space-x-3">
            <svg class="w-[35px] h-[35px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
              </svg>
        <p class="text-4xl font-extrabold text-purple-600 dark:text-purple-400">{{ $totalOrderItems }}</p>
        </div>
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
