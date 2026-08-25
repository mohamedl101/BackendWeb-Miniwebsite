@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="admin-header">
    <h1>Admin Dashboard</h1>
    <p>Welkom, {{ auth()->user()->name }}</p>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <span class="stat-number">{{ $stats['motorcycles'] }}</span>
        <span class="stat-label">Motors</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $stats['brands'] }}</span>
        <span class="stat-label">Merken</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $stats['requests'] }}</span>
        <span class="stat-label">Aanvragen totaal</span>
    </div>
    <div class="stat-card highlight">
        <span class="stat-number">{{ $stats['pending'] }}</span>
        <span class="stat-label">In behandeling</span>
    </div>
    <div class="stat-card">
        <span class="stat-number">{{ $stats['customers'] }}</span>
        <span class="stat-label">Klanten</span>
    </div>
</div>

<div class="admin-actions">
    <a href="{{ route('admin.motorcycles.index') }}" class="btn btn-primary">Motors beheren</a>
    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">Merken beheren</a>
    <a href="{{ route('admin.testrequests.index') }}" class="btn btn-secondary">Aanvragen beheren</a>
</div>

@if($latestRequests->isNotEmpty())
<h2 style="margin-top:2rem;">Laatste aanvragen</h2>
<table class="admin-table">
    <thead>
        <tr>
            <th>Klant</th>
            <th>Motor</th>
            <th>Datum</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($latestRequests as $req)
        <tr>
            <td>{{ $req->user->name }}</td>
            <td>{{ $req->motorcycle->name }}</td>
            <td>{{ $req->desired_date->format('d-m-Y') }}</td>
            <td><span class="status-badge status-{{ $req->status }}">{{ ucfirst($req->status) }}</span></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
