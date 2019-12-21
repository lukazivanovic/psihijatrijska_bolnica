@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/bolesti'>Nazad</button>

<form action="/bolesti/store" method="POST">
        @csrf
        
        
        Sifra <input type="text" name="sifra" value="" requred>
        Naziv <input type="text" name="ime" value="" requred>
       
        <input id='dugme' type="submit" value="Posalji">


    </form>
@endsection