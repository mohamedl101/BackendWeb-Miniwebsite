<?php

namespace App\Http\Controllers;

use App\Models\TestRideRequest;
use App\Models\Motorcycle;
use Illuminate\Http\Request;

class TestRideController extends Controller
{
    public function store(Request $request, Motorcycle $motorcycle)
    {
        $data = $request->validate([
            'desired_date' => ['required', 'date', 'after_or_equal:tomorrow'],
            'comment'      => ['nullable', 'string', 'max:500'],
        ]);

        TestRideRequest::create([
            'user_id'       => auth()->id(),
            'motorcycle_id' => $motorcycle->id,
            'desired_date'  => $data['desired_date'],
            'comment'       => $data['comment'] ?? null,
            'status'        => 'pending',
        ]);

        return redirect()->route('motors.show', $motorcycle)
            ->with('success', 'Je testrit-aanvraag is ingediend! We nemen spoedig contact op.');
    }

    public function index()
    {
        $requests = TestRideRequest::with('motorcycle.brand')
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->get();

        return view('testrequests.index', compact('requests'));
    }
}
