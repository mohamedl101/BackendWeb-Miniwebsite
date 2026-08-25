@extends('layouts.app')

@section('title', 'Motor bewerken')

@section('content')
<div class="admin-header">
    <h1>Motor bewerken: {{ $motorcycle->name }}</h1>
    <a href="{{ route('admin.motorcycles.index') }}" class="btn btn-secondary">← Terug</a>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $e)<p>{{ $e }}</p>@endforeach
    </div>
@endif

<form method="POST" action="{{ route('admin.motorcycles.update', $motorcycle) }}" class="admin-form">
    @csrf @method('PUT')
    @include('admin.motorcycles._form', ['motorcycle' => $motorcycle])
    <button type="submit" class="btn btn-primary">Bijwerken</button>
</form>
@endsection
