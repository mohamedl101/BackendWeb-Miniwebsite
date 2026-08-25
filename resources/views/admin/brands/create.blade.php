@extends('layouts.app')

@section('title', 'Merk toevoegen')

@section('content')
<div class="admin-header">
    <h1>Merk toevoegen</h1>
    <a href="{{ route('admin.brands.index') }}" class="btn btn-secondary">← Terug</a>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
    </div>
@endif

<form method="POST" action="{{ route('admin.brands.store') }}" class="admin-form">
    @csrf
    @include('admin.brands._form', ['brand' => null])
    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>
@endsection
