@extends('layouts.app')

@section('title', $motorcycle->name)

@section('content')
<div class="motor-detail">
    <a href="{{ route('motors.index') }}" class="back-link">← Terug naar overzicht</a>

    <div class="motor-detail-grid">
        <div class="motor-detail-img">
            @if($motorcycle->image_url)
                <img src="{{ $motorcycle->image_url }}" alt="{{ $motorcycle->name }}">
            @else
                <div class="motor-card-img-placeholder large">Motor</div>
            @endif
        </div>

        <div class="motor-detail-info">
            <span class="badge">{{ ucfirst($motorcycle->type) }}</span>
            <h1>{{ $motorcycle->name }}</h1>
            <p class="brand-name">{{ $motorcycle->brand->name }}
                @if($motorcycle->brand->country)
                    &mdash; {{ $motorcycle->brand->country }}
                @endif
            </p>

            <table class="specs-table">
                <tr><th>Prijs</th><td>€ {{ number_format($motorcycle->price, 0, ',', '.') }}</td></tr>
                <tr><th>Cilinderinhoud</th><td>{{ $motorcycle->cc }} cc</td></tr>
                <tr><th>Type</th><td>{{ ucfirst($motorcycle->type) }}</td></tr>
                <tr><th>Voorraad</th><td>{{ $motorcycle->stock > 0 ? $motorcycle->stock . ' beschikbaar' : 'Niet op voorraad' }}</td></tr>
            </table>

            @if($motorcycle->description)
                <p class="moto-desc">{{ $motorcycle->description }}</p>
            @endif
        </div>
    </div>

    {{-- Testrit aanvragen --}}
    <div class="testrit-section">
        <h2>Testrit aanvragen</h2>

        @auth
            @if(auth()->user()->isAdmin())
                <p class="info-text">Admins kunnen geen testrit aanvragen.</p>
            @else
                @if($motorcycle->stock > 0)
                    @if($errors->any())
                        <div class="alert alert-error">
                            @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{ route('testrides.store', $motorcycle) }}" class="testrit-form">
                        @csrf
                        <div class="form-group">
                            <label for="desired_date">Gewenste datum</label>
                            <input type="date" id="desired_date" name="desired_date"
                                   min="{{ now()->addDay()->toDateString() }}"
                                   value="{{ old('desired_date') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Opmerking (optioneel)</label>
                            <textarea id="comment" name="comment" rows="3">{{ old('comment') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Aanvraag indienen</button>
                    </form>
                @else
                    <p class="alert alert-error">Deze motor is momenteel niet beschikbaar voor een testrit.</p>
                @endif
            @endif
        @else
            <p class="info-text">
                <a href="{{ route('login') }}">Log in</a> of <a href="{{ route('register') }}">registreer</a>
                om een testrit aan te vragen.
            </p>
        @endauth
    </div>
</div>
@endsection
