@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

<button class='linkDugme' data-link='/lekovi'>Povratak na listu</button>

<form action="/lekovi/update" method="POST">
        @csrf
        
        <div>
            ID medikamenta<input type="number" name='id' value="{{ $cure->id }}" readonly required>
        </div>
        <div>
            Šifra medikamenta<input type="text" name="sifra" value="{{ $cure->sifra_lek }}" requred>
        </div>
        <div>
            Naziv medikamenta<input type="text" name="ime" value="{{ $cure->ime_lek }}" requred>
        </div>
        <div>
            Količina <input type="number" name="kolicina" value="{{ $cure->kolicina_lek }}" requred>
        </div>
       
        <input id='dugme' type="submit" value="Unesi">


    </form>
@endsection