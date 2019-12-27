@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">
        @php
            // var_dump($cures);
        @endphp
        @auth
            <div class="margin_20">
                <div class="bolestiNaslov">
                    <h1>Knjiga oboljenja</h1>
                </div>

                <label class="osobFilter" for="filter">
                    <input type="text" id="filter" class='filter' style="background-image: url('/images/search.png')" placeholder="Pretraži...">
                </label>
            </div>
        @endauth

@if (Auth::user()->role==1)
<button class='linkDugme' data-link='/bolesti/create'>Dodaj</button>
@endif


<table>
    <tr>
        <th>Šifra</th>
        <th>Naziv</th>
        @if (Auth::user()->role==1)
            <button class='linkDugme' data-link='/bolesti/create' >Dodaj novo oboljenje</button>
        @endif
    </tr>

            @foreach ($diseases as $disease)
            <tr>
                <td>{{ $disease->sifra_bolest }}</td>
                <td>{{ $disease->ime_bolest }}</td>
                @if (Auth::user()->role==1)
                    <td><button class='linkDugmeIzmeni' data-link='/bolesti/edit/{{ $disease->id }}'style="background-image: url('/images/pencil.png')"></button></td>
                    <!-- <td><button class='obrisi' data-link='/bolesti/destroy/{{ $disease->id }}'>Obrisi</button></td> -->
                @endif
            </tr>
            @endforeach
        </table>
@endsection