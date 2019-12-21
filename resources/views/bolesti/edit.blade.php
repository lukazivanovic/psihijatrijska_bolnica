@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/bolesti'>Nazad</button>

<form action="/bolesti/update" method="POST">
        @csrf
        
        ID <input type="number" name='id' value="{{ $disease->id }}" readonly required>

        Sifra <input type="text" name="sifra" value="{{ $disease->sifra_bolest }}" requred>
        Naziv <input type="text" name="ime" value="{{ $disease->ime_bolest }}" requred>
        
       
        <input id='dugme' type="submit" value="Posalji">


    </form>
@endsection