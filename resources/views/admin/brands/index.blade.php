@extends('layouts.app')

@section('title', 'Merken beheren')

@section('content')
<div class="admin-header">
    <h1>Merken beheren</h1>
    <a href="{{ route('admin.brands.create') }}" class="btn btn-primary">+ Merk toevoegen</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="admin-table">
    <thead>
        <tr>
            <th>Naam</th>
            <th>Land</th>
            <th>Aantal motors</th>
            <th>Acties</th>
        </tr>
    </thead>
    <tbody>
        @forelse($brands as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->country ?? '—' }}</td>
            <td>{{ $brand->motorcycles_count }}</td>
            <td class="actions">
                <a href="{{ route('admin.brands.edit', $brand) }}" class="btn btn-small">Bewerken</a>
                <form method="POST" action="{{ route('admin.brands.destroy', $brand) }}" onsubmit="return confirm('Verwijderen?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-small btn-danger">Verwijderen</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="4">Geen merken gevonden.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
