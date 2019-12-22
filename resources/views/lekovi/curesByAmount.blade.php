@extends('layouts.index')

@section('content')
        @php
            // var_dump($cures);
        @endphp
        @auth
            <div class="margin_20">
                <label for="filter">Pretraga: 
                    <input type="text" id="filter" class='filter'>
                </label>
            </div>
        @endauth

        @if (Auth::user()->role==1)
            <button class='linkDugme' data-link='/lekovi/create'>Dodaj</button>
            <button class='linkDugme' data-link='/lekovi'>lk</button>

        @endif
        

        <table>
            <tr>
                <th>Šifra</th>
                <th>Naziv</th>
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
                    <td><button class='linkDugme' data-link='/lekovi/edit/{{ $cure->id }}'>Izmeni</button></td>
                    <!-- <td><button class='obrisi' data-link='/lekovi/destroy/{{ $cure->id }}'>Obrisi</button></td> -->
                @endif
            </tr>
            @endforeach
        </table>
@endsection