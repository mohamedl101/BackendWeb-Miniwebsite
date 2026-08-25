@extends('layouts.app')

@section('title', 'Motors beheren')

@section('content')
<div class="admin-header">
    <h1>Motors beheren</h1>
    <a href="{{ route('admin.motorcycles.create') }}" class="btn btn-primary">+ Motor toevoegen</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="admin-table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Prijs</th>
            <th>CC</th>
            <th>Stock</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @forelse($motorcycles as $moto)
        <tr>
            <td>{{ $moto->name }}</td>
            <td>{{ $moto->brand->name }}</td>
            <td>{{ ucfirst($moto->type) }}</td>
            <td>€ {{ number_format($moto->price, 0, ',', '.') }}</td>
            <td>{{ $moto->cc }}</td>
            <td>{{ $moto->stock }}</td>
            <td class="actions">
                <a href="{{ route('admin.motorcycles.edit', $moto) }}" class="btn btn-small">Bewerken</a>
                <form method="POST" action="{{ route('admin.motorcycles.destroy', $moto) }}" onsubmit="return confirm('Verwijderen?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-small btn-danger">Verwijderen</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="7">Geen motors gevonden.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
