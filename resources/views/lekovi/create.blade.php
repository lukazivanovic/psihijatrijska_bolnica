@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/lekovi'>Povratak na listu</button>
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<form action="/lekovi/store" method="POST">
        @csrf
        
        
        Šifra medikamenta<input type="text" name="sifra" value="" requred>
        Naziv medikamenta<input type="text" name="ime" value="" requred>
        
        Količina <input type="number" name="kolicina" value="" requred>
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection