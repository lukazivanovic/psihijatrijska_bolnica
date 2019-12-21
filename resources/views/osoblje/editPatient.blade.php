@extends('layouts.index')

@section('content')

    @php
        // var_dump($pacijent);
    @endphp

        <button class='linkDugme' data-link='/osoblje'>Nazad</button>

        <form action="/osoblje/update" method="POST">
            @csrf
            <input type="text" name='id' value="{{ $pacijent->id }}" requred readonly>
            Ime <input type="text" name="ime" value="{{ $pacijent->ime }}" requred>
            Prezime <input type="text" name="prezime" value="{{ $pacijent->prezime }}" requred>

            <!-- ovo je duplo zato da bi menjalo izgled datuma na naski -->
            <label for="dateRodj" id="label1" >Datum Rodjenja <input type="date" name="dat_rodjenja" value="{{ $pacijent->dat_rodjenja }}" id="dateRodjEditChart" requred></label>
            <label for="dateRodj2" id="label2" class="disapear">Datum Rodjenja <input type="text" id="dateRodj2EditChart"></label>
            
            Pol <select name="pol" id="" value= {{ $pacijent->pol }} >
                <option value="muski">Muski</option>
                <option value="zenski">Zenski</option>
                <option value="neopredeljen">Neopredeljen</option>
            </select>
            
            
            Grad <input type="text" name="grad" value="{{ $pacijent->grad }}" requred>
            Ulica <input type="text" name="ulica" value="{{ $pacijent->ulica }}" requred>
            Broj <input type="text" name="broj" value="{{ $pacijent->broj }}" requred>
            JMBG <input type="number" name="jmbg" value="{{ $pacijent->jmbg }}" requred>
            Ime Doktora:
                <select name="lekar" id="" value= {{ $pacijent->lekar }} >
                    @foreach ($doctorList as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            
            <!-- Mozda treba dodati i neki kontakt u tabelu sa pacijentom. Pitati Vilusa.  -->
            <input id='dugme' type="submit" value="Posalji">


        </form>
@endsection