<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stats = [
            'total_products'  => Product::count(),
            'active_products' => Product::where('is_active', true)->count(),
            'total_users'     => User::count(),
            'total_orders'    => Order::count(),
            'pending_orders'  => Order::where('status', 'pending')->count(),
            'total_revenue'   => Order::whereIn('status', ['completed', 'delivered'])->sum('total') ?? 0,
        ];

        $recent_users    = User::latest()->take(6)->get();
        $recent_products = Product::latest()->take(5)->get();

        // Last 7 months data for charts
        $months = [];
        for ($i = 6; $i >= 0; $i--) {
            $d = now()->subMonths($i);
            $months[] = [
                'label'   => $d->format('M Y'),
                'orders'  => Order::whereYear('created_at', $d->year)->whereMonth('created_at', $d->month)->count(),
                'revenue' => (float) Order::whereYear('created_at', $d->year)->whereMonth('created_at', $d->month)->sum('total'),
                'users'   => User::whereYear('created_at', $d->year)->whereMonth('created_at', $d->month)->count(),
            ];
        }

        return view('dashboard.index', compact('stats', 'recent_users', 'recent_products', 'months'));
    }
}
