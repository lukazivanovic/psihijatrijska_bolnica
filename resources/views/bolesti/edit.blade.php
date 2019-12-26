@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<button class='linkDugme' data-link='/bolesti'>Povratak na listu</button>

<form action="/bolesti/update" method="POST">
        @csrf
        
        ID <input type="number" name='id' value="{{ $disease->id }}" readonly required>

        Šifra oboljenja<input type="text" name="sifra" value="{{ $disease->sifra_bolest }}" requred>
        Naziv oboljenja<input type="text" name="ime" value="{{ $disease->ime_bolest }}" requred>
        
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection