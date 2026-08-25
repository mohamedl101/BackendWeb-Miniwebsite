@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero">
    <h1>Welkom bij MotorSite</h1>
    <p>Jouw complete gids over motorfietsen — van sportmotoren tot cruisers, merken, onderhoud en meer.</p>
    <a href="{{ route('motors.index') }}" class="btn btn-primary" style="margin-top:1.2rem;">Bekijk onze motors</a>
</div>

<h2 style="margin-top:2rem;">Ontdek de wereld van motoren</h2>
<p>Of je nu een ervaren rijder bent of net begint, motorfietsen bieden vrijheid, avontuur en pure rijplezier.</p>

<div class="cards">
    <div class="card">
        <div class="icon">SM</div>
        <h2>Soorten Motors</h2>
        <p>Van sportmotoren tot adventure-bikes — leer de verschillen kennen.</p>
        <a href="{{ route('soorten') }}" class="btn" style="margin-top:10px;">Bekijk soorten</a>
    </div>
    <div class="card">
        <div class="icon">BM</div>
        <h2>Bekende Merken</h2>
        <p>Honda, Yamaha, Ducati en meer — ontdek de topmerken.</p>
        <a href="{{ route('merken') }}" class="btn" style="margin-top:10px;">Bekijk merken</a>
    </div>
    <div class="card">
        <div class="icon">OV</div>
        <h2>Onderhoud & Veiligheid</h2>
        <p>Houd je motor in topconditie en rijd veilig op de weg.</p>
        <a href="{{ route('onderhoud') }}" class="btn" style="margin-top:10px;">Lees tips</a>
    </div>
    <div class="card">
        <div class="icon">MC</div>
        <h2>Motorcatalogus</h2>
        <p>Blader door ons volledige aanbod en vraag een testrit aan.</p>
        <a href="{{ route('motors.index') }}" class="btn" style="margin-top:10px;">Naar catalogus</a>
    </div>
</div>
@endsection
