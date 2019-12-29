@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

@php
    // var_dump($pacijent);
@endphp
@auth
    <div class="margin_20">
        <div class="bolestiNaslov">
            <h1>Pacijent - promena podataka</h1>
        </div>
    </div>
@endauth

<button class='linkDugme' data-link='/osoblje'>Povratak na listu</button>
<div>
    <form action="/osoblje/update" method="POST">
        @csrf
                    
        <div class="okvir1">
            <div class="okvir11">
                <label for="id">ID</label>
            </div>
            <div class="okvir12">
                <input type="text" name='id' value="{{ $pacijent->id }}" requred readonly>
            </div>
        </div>
        
        <div class="okvir1">
            <div class="okvir11">
                <label for="ime">Ime</label>
            </div>
            <div class="okvir12">
                <input type="text" name="ime" value="{{ $pacijent->ime }}" requred>
            </div>
        </div>

        <div class="okvir1">
            <div class="okvir11">
                <label for="prezime">Prezime</label>
            </div>
            <div class="okvir12">
                <input type="text" name="prezime" value="{{ $pacijent->prezime }}" requred>
            </div>
        </div>

        <!-- ovo je duplo zato da bi menjalo izgled datuma na formi -->
        <!-- DEO SA DATUMOM OSTAVITI KAKO JE KREIRAN ZBOG SAKRIVANJA NEPOTREBNOG -->
        <div class="okvir1">
            <div class="okvir11">
                <label for="">Datum rođenja</label>
            </div>
            <div class="okvir12">
                <label for="dateRodj" id="label1" ><input type="date" name="dat_rodjenja" value="{{ $pacijent->dat_rodjenja }}" id="dateRodjEditChart" requred></label>
                <label for="dateRodj2" id="label2" class="disapear"><input type="text" id="dateRodj2EditChart"></label>
            </div>
        </div>
        <!-- KRAJ DELA SA DATUMOM -->

        <div class="okvir1">
            <div class="okvir11">
                <label for="jmbg">JMBG</label>
            </div>
            <div class="okvir12">
            <input type="number" name="jmbg" value="{{ $pacijent->jmbg }}" requred>
            </div>
        </div>

        <div class="okvir1">
            <div class="okvir11">
                <label for="pol">Pol</label>
            </div>
            <div class="okvir12">
                <select class="formaIzbor" name="pol" id="" value= {{ $pacijent->pol }} >
                    <option value="muski">muški</option>
                    <option value="zenski">ženski</option>
                    <option value="neopredeljen">neopredeljen</option>
                </select>
            </div>
        </div>

        
        <div> 
                
        </div>
        <br>
        <div>
            Adresa stanovanja
        </div>
        <div>
            Grad <input type="text" name="grad" value="{{ $pacijent->grad }}" requred>
        </div>
        <div>
            Ulica <input type="text" name="ulica" value="{{ $pacijent->ulica }}" requred>
        </div>
        <div>
            Broj <input type="text" name="broj" value="{{ $pacijent->broj }}" requred>
        </div>
        
        <div>
            Glavni doktor
                <select name="lekar" id="" value= {{ $pacijent->lekar }} >
                    @foreach ($doctorList as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
        </div>
        
        <!-- Mozda treba dodati i neki kontakt u tabelu sa pacijentom. Pitati Vilusa.  -->
        <input id='dugme' type="submit" value="Unesi">


    </form>
</div>
@endsection