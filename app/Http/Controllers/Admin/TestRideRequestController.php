<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestRideRequest;
use Illuminate\Http\Request;

class TestRideRequestController extends Controller
{
    public function index()
    {
        $requests = TestRideRequest::with('user', 'motorcycle.brand')
            ->orderByDesc('created_at')
            ->get();

        return view('admin.testrequests.index', compact('requests'));
    }

    public function update(Request $request, TestRideRequest $testRideRequest)
    {
        $request->validate([
            'status' => ['required', 'in:pending,approved,rejected'],
        ]);

        $testRideRequest->update(['status' => $request->status]);

        return back()->with('success', 'Status bijgewerkt.');
    }
}
