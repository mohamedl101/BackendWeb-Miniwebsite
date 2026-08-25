@extends('layouts.app')

@section('title', 'Merken')

@section('content')
<h1>Bekende Motormerken</h1>
<p>De motorwereld heeft een rijke verscheidenheid aan merken, elk met een eigen identiteit, geschiedenis en specialiteit.</p>

<table>
    <thead>
        <tr>
            <th>Merk</th>
            <th>Land</th>
            <th>Opgericht</th>
            <th>Bekend om</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Honda</td>
            <td>Japan</td>
            <td>1948</td>
            <td>Betrouwbaarheid, wereldwijd #1 producent</td>
        </tr>
        <tr>
            <td>Yamaha</td>
            <td>Japan</td>
            <td>1955</td>
            <td>Sportmotoren & MT-serie</td>
        </tr>
        <tr>
            <td>Kawasaki</td>
            <td>Japan</td>
            <td>1954</td>
            <td>Ninja-serie, prestaties</td>
        </tr>
        <tr>
            <td>Ducati</td>
            <td>Italië</td>
            <td>1926</td>
            <td>Italiaans design, V2-motoren</td>
        </tr>
        <tr>
            <td>BMW Motorrad</td>
            <td>Duitsland</td>
            <td>1923</td>
            <td>GS Adventure, boxer-motor</td>
        </tr>
    </tbody>
</table>
@endsection
