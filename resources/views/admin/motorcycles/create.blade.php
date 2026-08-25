@extends('layouts.app')

@section('title', 'Motor toevoegen')

@section('content')
<div class="admin-header">
    <h1>Motor toevoegen</h1>
    <a href="{{ route('admin.motorcycles.index') }}" class="btn btn-secondary">← Terug</a>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
    </div>
@endif

<form method="POST" action="{{ route('admin.motorcycles.store') }}" class="admin-form">
    @csrf
    @include('admin.motorcycles._form', ['motorcycle' => null])
    <button type="submit" class="btn btn-primary">Opslaan</button>
</form>
@endsection
