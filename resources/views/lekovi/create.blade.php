@extends('layouts.index')

@section('content')

<button class='linkDugme' data-link='/lekovi'>Povratak na listu</button>
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<form action="/lekovi/store" method="POST">
        @csrf
        
        
        <div>
            Šifra medikamenta<input type="text" name="sifra" value="" requred>
        </div>
        <div>
            Naziv medikamenta<input type="text" name="ime" value="" requred>
        </div>
        <div>
            Količina <input type="number" name="kolicina" value="" requred>
        </div>
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection