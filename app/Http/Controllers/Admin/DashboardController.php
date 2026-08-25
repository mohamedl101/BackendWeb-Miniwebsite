<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorcycle;
use App\Models\TestRideRequest;
use App\Models\Brand;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'motorcycles'   => Motorcycle::count(),
            'brands'        => Brand::count(),
            'requests'      => TestRideRequest::count(),
            'pending'       => TestRideRequest::where('status', 'pending')->count(),
            'customers'     => User::where('role', 'customer')->count(),
        ];

        $latestRequests = TestRideRequest::with('user', 'motorcycle')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'latestRequests'));
    }
}
