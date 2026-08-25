@extends('layouts.app')

@section('title', 'Mijn Testrit-aanvragen')

@section('content')
<div class="page-header">
    <h1>Mijn aanvragen</h1>
</div>

@if($requests->isEmpty())
    <p class="empty-state">Je hebt nog geen testrit-aanvragen ingediend.
        <a href="{{ route('motors.index') }}">Bekijk onze motors</a>.
    </p>
@else
    <table class="admin-table">
        <thead>
            <tr>
                <th>Motor</th>
                <th>Merk</th>
                <th>Gewenste datum</th>
                <th>Opmerking</th>
                <th>Status</th>
                <th>Aangevraagd</th>
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $req)
            <tr>
                <td><a href="{{ route('motors.show', $req->motorcycle) }}">{{ $req->motorcycle->name }}</a></td>
                <td>{{ $req->motorcycle->brand->name }}</td>
                <td>{{ $req->desired_date->format('d-m-Y') }}</td>
                <td>{{ $req->comment ?? '—' }}</td>
                <td><span class="status-badge status-{{ $req->status }}">{{ ucfirst($req->status) }}</span></td>
                <td>{{ $req->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
