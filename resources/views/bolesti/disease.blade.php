@extends('layouts.index')

@section('content')
        @php
            // var_dump($cures);
        @endphp
        @auth
            <div class="margin_20">
                <label for="filter">Filter tabela: 
                    <input type="text" id="filter" class='filter'>
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
                    <th>Izmeni</th>
                    <!-- <th>Obrisi</th> -->
                @endif
            </tr>

            @foreach ($diseases as $disease)
            <tr>
                <td>{{ $disease->sifra_bolest }}</td>
                <td>{{ $disease->ime_bolest }}</td>
                @if (Auth::user()->role==1)
                    <td><button class='linkDugme' data-link='/bolesti/edit/{{ $disease->id }}'>Izmeni</button></td>
                    <!-- <td><button class='obrisi' data-link='/bolesti/destroy/{{ $disease->id }}'>Obrisi</button></td> -->
                @endif
            </tr>
            @endforeach
        </table>
@endsection