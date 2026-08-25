@extends('layouts.app')

@section('title', 'Merk bewerken')

@section('content')
<div class="admin-header">
    <h1>Merk bewerken: {{ $brand->name }}</h1>
    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">← Terug</a>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
    </div>
@endif

<form method="POST" action="{{ route('admin.brands.update', $brand) }}" class="admin-form">
    @csrf @method('PUT')
    @include('admin.brands._form', ['brand' => $brand])
    <button type="submit" class="btn btn-primary">Bijwerken</button>
</form>
@endsection
