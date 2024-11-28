<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;

class RevenueController extends Controller
{
    public function showRevenue()
    {
        $revenue = OrderItem::revenueLast30Days();

        return response()->json([
            'success' => true,
            'revenue' => $revenue,
        ]);
    }
}
