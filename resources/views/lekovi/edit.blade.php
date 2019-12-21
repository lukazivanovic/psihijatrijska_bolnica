@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/lekovi'>Nazad</button>

<form action="/lekovi/update" method="POST">
        @csrf
        
        ID <input type="number" name='id' value="{{ $cure->id }}" readonly required>

        Sifra <input type="text" name="sifra" value="{{ $cure->sifra_lek }}" requred>
        Naziv <input type="text" name="ime" value="{{ $cure->ime_lek }}" requred>
        
        Kolicina <input type="number" name="kolicina" value="{{ $cure->kolicina_lek }}" requred>
       
        <input id='dugme' type="submit" value="Posalji">


    </form>
@endsection