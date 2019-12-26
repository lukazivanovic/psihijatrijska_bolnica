@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

@php
// var_dump($doctorList);
@endphp

<button class='linkDugme' data-link='/osoblje'>Povratak na listu</button>
<div>
    <form action="/osoblje/store" method="POST">
        @csrf
        <div>
            Ime <input type="text" name="ime" value="" requred>
        </div>
        <div>
            Prezime <input type="text" name="prezime" value="" requred>
        </div>
        <!-- ovo je duplo zato da bi menjalo izgled datuma na naski -->
        <div>
            <label for="dateRodj" id="label1">Datum rođenja <input type="date" name="dat_rodjenja" value="" id="dateRodj" requred></label>
            <label for="dateRodj2" id="label2" class="disapear">Datum rođenja <input type="text" id="dateRodj2"></label>
        </div>

        <div>
            JMBG <input type="number" name="jmbg" value="" requred>
        </div>

        <div>
            Pol
            <select name="pol" id="">
                <option value="muski">muški</option>
                <option value="zenski">ženski</option>
                <option value="neopredeljen">neopredeljen</option>
            </select>
            <div>

                <div>
                    Adresa stanovanja
                </div>

                <div>
                    Grad <input type="text" name="grad" value="" requred>
                </div>
                <div>
                    Ulica <input type="text" name="ulica" value="" requred>
                </div>
                <div>
                    Broj <input type="text" name="broj" value="" requred>
                </div>
                Glavni doktor
                <select name="lekar" id="">
                    @foreach ($doctorList as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>

                <!-- Mozda treba dodati i neki kontakt u tabelu sa pacijentom. Pitati Vilusa.  -->
                <input id='dugme' type="submit" value="Unesi">


    </form>
</div>


<script src="biblioteka.js"></script>
<script>
    let dateStartLabel = document.querySelector('#label1');
    let dateStartLabel2 = document.querySelector('#label2');
    let dateStartInput = document.querySelector('#dateRodj');
    let dateStartInput2 = document.querySelector('#dateRodj2');

    function changeVisibilityStart() {
        dateStartLabel.classList.toggle('disapear');
        dateStartLabel2.classList.toggle('disapear');
    }

    //dogadjaji
    dateStartInput.addEventListener('change', function() {
        changeVisibilityStart();
        dateStartInput2.value = pf.dateToSerbianFormat(dateStartInput.value);
    })

    dateStartInput2.addEventListener('click', function() {
        changeVisibilityStart();
        dateStartInput.value = "";
        dateStartInput.focus();
    })
</script>
@endsection