@extends('layouts.app')

@section('title', 'Motorcatalogus')

@section('content')
<div class="page-header">
    <h1>Motorcatalogus</h1>
    <p>Ontdek ons aanbod — filter op type of merk.</p>
</div>

<form method="GET" action="{{ route('motors.index') }}" class="filter-bar">
    <select name="type">
        <option value="">Alle types</option>
        @foreach($types as $type)
            <option value="{{ $type }}" {{ request('type') === $type ? 'selected' : '' }}>
                {{ ucfirst($type) }}
            </option>
        @endforeach
    </select>

    <select name="brand">
        <option value="">Alle merken</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Filteren</button>
    @if(request()->hasAny(['type','brand']))
        <a href="{{ route('motors.index') }}" class="btn btn-secondary">Wissen</a>
    @endif
</form>

@if($motorcycles->isEmpty())
    <p class="empty-state">Geen motors gevonden voor deze filters.</p>
@else
    <div class="motorcycle-grid">
        @foreach($motorcycles as $moto)
        <a href="{{ route('motors.show', $moto) }}" class="motor-card">
            @if($moto->image_url)
                <img src="{{ $moto->image_url }}" alt="{{ $moto->name }}">
            @else
                <div class="motor-card-img-placeholder">Motor</div>
            @endif
            <div class="motor-card-body">
                <span class="badge">{{ ucfirst($moto->type) }}</span>
                <h3>{{ $moto->name }}</h3>
                <p class="brand-name">{{ $moto->brand->name }}</p>
                <p class="price">€ {{ number_format($moto->price, 0, ',', '.') }}</p>
                <p class="cc">{{ $moto->cc }} cc</p>
            </div>
        </a>
        @endforeach
    </div>

    <div class="pagination-wrap">
        {{ $motorcycles->links() }}
    </div>
@endif
@endsection
