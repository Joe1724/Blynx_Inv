<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic counts
        $ordersCount = Order::count();
        $productsCount = Product::count();
        $totalOrderItems = OrderItem::count();
        $totalSaleAmount = Order::sum('total_price');

        // Revenue data for the last 30 days
        $revenueData = Order::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_price) as total_revenue')
            )
            ->where('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get()
            ->pluck('total_revenue', 'date')
            ->toArray();

        // Fill gaps in revenue data
        $dates = [];
        $revenues = [];
        foreach (range(0, 29) as $day) {
            $currentDate = Carbon::now()->subDays(29 - $day)->toDateString();
            $dates[] = $currentDate;
            $revenues[] = $revenueData[$currentDate] ?? 0;
        }

        // Fetch categories with product counts
        $categories = Category::withCount('products')->get();

        // Total revenue using OrderItem model
        $totalRevenue = OrderItem::revenueLast30Days();

        return view('dashboard.index', [
            'orders' => $ordersCount,
            'products' => $productsCount,
            'totalOrderItems' => $totalOrderItems,
            'dates' => $dates,
            'revenues' => $revenues,
            'categories' => $categories,
            'totalRevenue' => $totalRevenue,
            'totalSaleAmount' => $totalSaleAmount,
        ]);
    }
}
