@extends('layouts.app')

@section('title', 'Testrit-aanvragen')

@section('content')
<div class="admin-header">
    <h1>Testrit-aanvragen</h1>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="admin-table">
    <thead>
        <tr>
            <th>Klant</th>
            <th>Motor</th>
            <th>Gewenste datum</th>
            <th>Opmerking</th>
            <th>Status</th>
            <th>Aangevraagd</th>
            <th>Actie</th>
        </tr>
    </thead>
    <tbody>
        @forelse($requests as $req)
        <tr>
            <td>{{ $req->user->name }}<br><small>{{ $req->user->email }}</small></td>
            <td>{{ $req->motorcycle->name }}<br><small>{{ $req->motorcycle->brand->name }}</small></td>
            <td>{{ $req->desired_date->format('d-m-Y') }}</td>
            <td>{{ $req->comment ?? '—' }}</td>
            <td><span class="status-badge status-{{ $req->status }}">{{ ucfirst($req->status) }}</span></td>
            <td>{{ $req->created_at->format('d-m-Y') }}</td>
            <td>
                <form method="POST" action="{{ route('admin.testrequests.update', $req) }}" style="display:flex;gap:.4rem;flex-wrap:wrap;">
                    @csrf @method('PATCH')
                    <select name="status" class="status-select">
                        <option value="pending"   {{ $req->status === 'pending'   ? 'selected' : '' }}>Pending</option>
                        <option value="approved"  {{ $req->status === 'approved'  ? 'selected' : '' }}>Goedgekeurd</option>
                        <option value="rejected"  {{ $req->status === 'rejected'  ? 'selected' : '' }}>Afgewezen</option>
                    </select>
                    <button class="btn btn-small btn-primary">Opslaan</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7">Geen aanvragen gevonden.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
