@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/lekovi'>Nazad</button>

<form action="/lekovi/store" method="POST">
        @csrf
        
        
        Sifra <input type="text" name="sifra" value="" requred>
        Naziv <input type="text" name="ime" value="" requred>
        
        Kolicina <input type="number" name="kolicina" value="" requred>
       
        <input id='dugme' type="submit" value="Posalji">


    </form>
@endsection