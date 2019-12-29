@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">
@php
// var_dump($cures);
@endphp
@auth
<div class="margin_20 flexColumn">

    <div class="bolestiNaslov">
        <h1>Medikamenti</h1>
    </div>

    <label for="filter">
        <input type="text" id="filter" class='kartonInput' style="background-image: url('/images/search.png')" placeholder="Pretraži...">
    </label>
</div>
@endauth
@if (Auth::user()->role==1)
<button class='linkDugme' data-link='/lekovi/create'>Dodaj novi medikament</button>
<button class='linkDugme' data-link='/lekovi/curesByAmount'>Izlistaj po količini</button>
@endif


<table>
    <tr>
        <th>Šifra medikamenta</th>
        <th>Naziv medikamenta</th>
        <th>Količina</th>
        @if (Auth::user()->role==1)
        <th>Izmeni</th>
        <!-- <th>Obrisi</th> -->
        @endif
    </tr>

    @foreach ($cures as $cure)
    <tr>
        <td>{{ $cure->sifra_lek }}</td>
        <td>{{ $cure->ime_lek }}</td>
        <td>{{ $cure->kolicina_lek }}</td>
        @if (Auth::user()->role==1)
        <td><button class='linkDugme linkDugmeIzmeni' data-link='/lekovi/edit/{{ $cure->id }}' style="background-image: url('/images/pencil.png')"></button></td>
        <!-- <td><button class='obrisi' data-link='/lekovi/destroy/{{ $cure->id }}'>Obrisi</button></td> -->
        @endif
    </tr>
    @endforeach
</table>
@endsection