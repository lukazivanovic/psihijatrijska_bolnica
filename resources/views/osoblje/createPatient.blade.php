@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

    @php
        // var_dump($doctorList);
    @endphp

        <button class='linkDugme' data-link='/osoblje'>Povratak na listu</button>

        <form action="/osoblje/store" method="POST">
            @csrf
            Ime <input type="text" name="ime" value="" requred>
            Prezime <input type="text" name="prezime" value="" requred>

            <!-- ovo je duplo zato da bi menjalo izgled datuma na naski -->
            <label for="dateRodj" id="label1">Datum Rodjenja <input type="date" name="dat_rodjenja" value="" id="dateRodj" requred></label>
            <label for="dateRodj2" id="label2" class="disapear">Datum Rodjenja <input type="text" id="dateRodj2"></label>
            
            Pol <select name="pol" id="">
                <option value="muski">Muski</option>
                <option value="zenski">Zenski</option>
                <option value="neopredeljen">Neopredeljen</option>
            </select>
            
            
            Grad <input type="text" name="grad" value="" requred>
            Ulica <input type="text" name="ulica" value="" requred>
            Broj <input type="text" name="broj" value="" requred>
            JMBG <input type="number" name="jmbg" value="" requred>
            Ime Doktora:
                <select name="lekar" id="">
                    @foreach ($doctorList as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
                </select>
            
            <!-- Mozda treba dodati i neki kontakt u tabelu sa pacijentom. Pitati Vilusa.  -->
            <input id='dugme' type="submit" value="Posalji">


        </form>

        <script src="biblioteka.js"></script>
        <script>
                let dateStartLabel=document.querySelector('#label1');
                let dateStartLabel2=document.querySelector('#label2');
                let dateStartInput=document.querySelector('#dateRodj');
                let dateStartInput2=document.querySelector('#dateRodj2');
            
                function changeVisibilityStart()
                {
                    dateStartLabel.classList.toggle('disapear');
                    dateStartLabel2.classList.toggle('disapear');
                }
            
                //dogadjaji
                dateStartInput.addEventListener('change',function()
                {
                    changeVisibilityStart();
                    dateStartInput2.value=pf.dateToSerbianFormat(dateStartInput.value);
                })
            
                dateStartInput2.addEventListener('click',function()
                {
                    changeVisibilityStart();
                    dateStartInput.value="";
                    dateStartInput.focus();
                })

        </script>
@endsection