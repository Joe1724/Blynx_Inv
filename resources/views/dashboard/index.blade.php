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
                <svg class="w-[43px] h-[43px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                  </svg>
                <!-- Customer Number -->
                <p class="text-4xl font-extrabold text-black dark:text-blue-400">{{ $orders }}</p>
            </div>
        </div>


        {{-- Products Count --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Products</h5>
            <div class="flex items-center space-x-3">
                <svg class="w-[37px] h-[37px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/>
                  </svg>
                <p class="text-4xl font-extrabold text-black dark:text-green-400">{{ $products }}</p>
            </div>
        </div>
         {{-- Total Order Items Card --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
        <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Order Items</h5>
        <div class="flex items-center space-x-3">
            <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
              </svg>
        <p class="text-4xl font-extrabold text-black dark:text-purple-400">{{ $totalOrderItems }}</p>
        </div>
        </div>

        {{-- Total Sale Amount --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white">Total Sale Amount</h5>
            <div class="flex items-center space-x-3">
                <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M8 7V6a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1M3 18v-7a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                  </svg>
                <!-- Total Sale Amount -->
                <p class="text-4xl font-extrabold text-black dark:text-red-400">₱{{ $totalSaleAmount }}</p>
            </div>
        </div>
    </div>



    {{-- Revenue and Category Pie Charts Side by Side --}}
    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2">
        {{-- Revenue Chart --}}
        <div class="p-6 transition duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
            <h5 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Revenue (Last 30 Days)</h5>
            <p class="mt-4 text-xl font-bold text-gray-900 dark:text-white">Total Revenue: ₱{{ number_format($totalRevenue, 2) }}</p>
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
    // Revenue Line Chart
    const ctxRevenue = document.getElementById('revenueChart').getContext('2d');
    const revenueData = {
        labels: @json($dates),  // Dates for the last 30 days
        datasets: [{
            label: 'Revenue',
            data: @json($revenues), // Revenue data
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

      // Category Bar Chart
      const ctxCategory = document.getElementById('categoryPieChart').getContext('2d');
    const categoryData = {
        labels: @json($categories->pluck('name')), // Category names
        datasets: [{
            label: 'Number of Products',
            data: @json($categories->pluck('products_count')), // Product counts
            backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A8', '#F1C40F'], // Bar colors
            borderColor: ['#C0392B', '#27AE60', '#2980B9', '#8E44AD', '#F39C12'], // Optional: Bar border colors
            borderWidth: 1 // Optional: Bar border width
        }]
    };
    const categoryOptions = {
        responsive: true,
        plugins: {
            legend: { display: false }, // Optionally hide legend for simplicity
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return tooltipItem.label + ': ' + tooltipItem.raw + ' products';
                    }
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Categories', // X-axis title
                    font: { size: 14 }
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Number of Products', // Y-axis title
                    font: { size: 14 }
                },
                beginAtZero: true // Ensures the Y-axis starts at 0
            }
        }
    };
    new Chart(ctxCategory, { type: 'bar', data: categoryData, options: categoryOptions });
});
</script>


