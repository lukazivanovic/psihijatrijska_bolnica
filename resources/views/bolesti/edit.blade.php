@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<button class='linkDugme' data-link='/bolesti'>Povratak na listu</button>

<form action="/bolesti/update" method="POST">
        @csrf
        

        <div class="okvir1">

            <div class="okvir11">
                <label for="id">ID</label>
            </div>
            <div class="okvir12">
                <input type="number" name='id' value="{{ $disease->id }}" readonly required>
            </div>

        </div>

        <div class="okvir1">

            <div class="okvir11">
                <label for="sifra">Šifra oboljenja</label>
            </div>
            <div class="okvir12">
                <input type="text" name="sifra" value="{{ $disease->sifra_bolest }}" requred>
            </div>

        </div>

        <div class="okvir1">

            <div class="okvir11">
                <label for="">Naziv oboljenja</label>
            </div>
            <div class="okvir12">
                <input type="text" name="ime" value="{{ $disease->ime_bolest }}" requred>
            </div>

        </div>        
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection