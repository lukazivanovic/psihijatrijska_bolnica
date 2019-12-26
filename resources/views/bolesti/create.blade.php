@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<button class='linkDugme' data-link='/bolesti'>Povratak na listu</button>

<form action="/bolesti/store" method="POST">
        @csrf
        
        
        Šifra oboljenja<input type="text" name="sifra" value="" requred>
        Naziv oboljenja<input type="text" name="ime" value="" requred>
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection