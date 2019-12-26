@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

    @php
        // var_dump($pacijent);
    @endphp

        <button class='linkDugme' data-link='/osoblje'>Povratak na listu</button>

        <form action="/osoblje/update" method="POST">
            @csrf
            <div>
                ID<input type="text" name='id' value="{{ $pacijent->id }}" requred readonly>
            </div>
            <div>
                Ime <input type="text" name="ime" value="{{ $pacijent->ime }}" requred>
            </div>
            <div>
                Prezime <input type="text" name="prezime" value="{{ $pacijent->prezime }}" requred>
            </div>

            <!-- ovo je duplo zato da bi menjalo izgled datuma na naski -->
            <div>
                <label for="dateRodj" id="label1" >Datum Rodjenja <input type="date" name="dat_rodjenja" value="{{ $pacijent->dat_rodjenja }}" id="dateRodjEditChart" requred></label>
                <label for="dateRodj2" id="label2" class="disapear">Datum Rodjenja <input type="text" id="dateRodj2EditChart"></label>
            </div>

            <div>
                JMBG <input type="number" name="jmbg" value="{{ $pacijent->jmbg }}" requred>
            </div>
            
            <div>
                Pol 
                    <select name="pol" id="" value= {{ $pacijent->pol }} >
                        <option value="muski">muški</option>
                        <option value="zenski">ženski</option>
                        <option value="neopredeljen">neopredeljen</option>
                    </select>
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
@endsection