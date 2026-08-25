@extends('layouts.app')

@section('title', 'Soorten Motors')

@section('content')
<h1>Soorten Motorfietsen</h1>
<p>Er zijn veel verschillende types motorfietsen, elk met hun eigen karakter en rijstijl. Hier is een overzicht van de populairste categorieën.</p>

<div class="cards">
    <div class="card">
        <div class="icon">SP</div>
        <h2>Sportmotor</h2>
        <p>Ontworpen voor snelheid en prestaties. Aerodynamisch, licht en ideaal voor het circuit. Voorbeelden: Kawasaki Ninja, Honda CBR.</p>
    </div>
    <div class="card">
        <div class="icon">AD</div>
        <h2>Adventure / Enduro</h2>
        <p>Gebouwd voor zowel asfalt als onverhard terrein. Perfect voor lange reizen. Voorbeelden: BMW GS-serie, KTM Adventure.</p>
    </div>
    <div class="card">
        <div class="icon">TR</div>
        <h2>Touring</h2>
        <p>Comfortabel en groot, voor lange ritten op de snelweg. Veel opbergruimte en windscherm. Voorbeelden: Honda Gold Wing, Yamaha FJR.</p>
    </div>
    <div class="card">
        <div class="icon">CR</div>
        <h2>Cruiser</h2>
        <p>Lage zit, relaxte rijhouding en Amerikaans karakter. Voorbeelden: Harley-Davidson Sportster, Indian Scout.</p>
    </div>
    <div class="card">
        <div class="icon">NK</div>
        <h2>Naked / Streetfighter</h2>
        <p>Geen kuip, hoge stuurpen en agressief design. Sterk motorblok zichtbaar. Voorbeelden: Yamaha MT-07, KTM Duke.</p>
    </div>
    <div class="card">
        <div class="icon">SC</div>
        <h2>Scrambler</h2>
        <p>Retro-look met moderne technologie. Licht offroad-gebruik mogelijk. Voorbeelden: Ducati Scrambler, Triumph Scrambler.</p>
    </div>
</div>
@endsection
