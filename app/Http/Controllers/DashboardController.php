<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category; // Add Category model
use App\Models\OrderItem; // Add OrderItem model
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get order count
        $ordersCount = Order::count();

        // Get product count
        $productsCount = Product::count();

        // Get total order items count
        $totalOrderItems = OrderItem::count(); // Count total order items

        // Get revenue data for the last 30 days, grouped by date
        $revenueData = Order::select(
                DB::raw('DATE(date) as date'),
                DB::raw('SUM(total_price) as total_revenue')
            )
            ->where('date', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Calculate total revenue
        $totalRevenue = $revenueData->sum('total_revenue');

        // Format data for the chart
        $dates = $revenueData->pluck('date')->toArray();
        $revenues = $revenueData->pluck('total_revenue')->toArray();

        // Fetch categories with the count of products in each category
        $categories = Category::withCount('products')->get();

        return view('dashboard.index', [
            'orders' => $ordersCount,
            'products' => $productsCount,
            'totalOrderItems' => $totalOrderItems, // Pass total order items to the view
            'dates' => $dates,
            'revenues' => $revenues,
            'categories' => $categories, // Pass categories data
            'totalRevenue' => $totalRevenue, // Pass total revenue to the view
        ]);
    }
}
