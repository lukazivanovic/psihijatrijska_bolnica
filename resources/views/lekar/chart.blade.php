        @extends('layouts.index')

        @section('content')
        @php
        $date=explode('-',$mainData->dat_rodjenja);
        $date=array_reverse($date);
        $mainData->dat_rodjenja=implode('.',$date).".";
        @endphp

        @auth
        <div class="margin_20">
            <label for="filter">
                <input type="text" id="filter" class='filter' style="background-image: url('/images/search.png')" placeholder="Pretraži...">
            </label>
        </div>
        @endauth


        <div class="karton">
            <!-- <div class="pacijent-info">
                <h1>{{ $mainData->ime }} {{ $mainData->prezime }}</h1>
                <h3>Id Kartona: K-{{ $mainData->id }}</h3>
            </div> -->
            <!-- <div class="izmeni-karton">
            
        <       /div> -->

            <div class="karton-info">
                <p>Datum Rodjenja: {{ $mainData->dat_rodjenja }}</p>
                <p>Pol: {{ $mainData->pol }}</p>
                <p>Istorija Bolesti: {{ $mainData->istorija_bolesti }}</p>
                <p>Alergija na lekove: {{ $mainData->alergija_lek }}</p>
            </div>
            <!-- <div class="dodaj-posetu"> -->
            <button class='linkDugme' data-link='/lekar/visit/{{ $mainData->id }}'>Dodaj Posetu</button>
            <button class='linkDugme' data-link='/lekar/editChart/{{ $mainData->id }}'>Izmeni Karton</button>
            <!-- </div> -->
            <!-- <div class="dodaj-posetu">
        <button class='linkDugme' data-link='/lekar/visit/{{ $mainData->id }}'>Dodaj Posetu</button>
    </div>
    <div class="izmeni-karton">
        <button class='linkDugme' data-link='/lekar/editChart/{{ $mainData->id }}'>Izmeni Karton</button>
    </div> -->
        </div>
        <div class="tabela-karton">
            <caption>Istorija dolazaka</caption>
            <table>

                <head>
                    <tr>
                        <th>Datum</th>
                        <th>Tip Posete</th>
                        <th>Dijagnoza</th>
                        <th>Terapija</th>
                        <th>Bolest/Lek/Prepisano</th>
                        <th>Lekar</th>
                        <th>Detaljnije</th>
                        {{-- <th>Izmeni</th>
                <th>Dodaj</th> --}}
                        <th>Obrisi</th>
                    </tr>
                </head>

                @foreach ($treatmants as $poseta)
                @php
                $date=explode('-',$poseta['datum']);
                $date=array_reverse($date);
                $poseta['datum']=implode('.',$date).".";

                ($poseta['prva_poseta']==1)? $tip="Prva poseta":$tip="Kontrolna poseta";

                $tracker=implode(',',$poseta['id_tracker']);
                @endphp
                <tr>
                    <td>{{ $poseta['datum'] }}</td>
                    <td>{{ substr($tip,0,4) }}</td>
                    <td><a href="#" onclick='swal.fire("Dijagnoza", "{{ htmlentities($poseta['dijagnoza'], ENT_COMPAT) }}")'>{{ substr($poseta['dijagnoza'], 0, 32) }}...</a></td>
                    <td><a href="#" onclick='swal.fire("Terapija", "{{ htmlentities($poseta['terapija'], ENT_COMPAT) }}")'>{{ substr($poseta['terapija'], 0, 32) }}...</a></td>
                    {{-- <td>{{ $poseta['terapija'] }}</td> --}}
                    <td>
                        @foreach ($poseta['lekovi'] as $item)
                        <div class='ugnjezdena_tabela'>
                            <div>{{ $item['sifra_bolest'] }}</div>
                            <div>{{ $item['sifra_lek'] }}</div>
                            <div>{{ $item['lek_prepisana_kol'] }}</div>
                            {{-- <div><button class='linkDugme' data-link='/lekar/editTreatmant/{{ $item['ind_tracer'] }}'>Izmeni<br>Lek</button>
                        </div> --}}
                        {{-- <button class='obrisi' data-link='/lekar/destroyVisit/{{ $item['ind_tracer'] }}'>Smanji<br>Lek</button> --}}
        </div>
        @endforeach
        </td>
        <td>{{ $poseta['id_lekar'] }}</td>
        <td><button class='openVisit' data-link='/lekar/showSingleVisitJSON/{{ $tracker }}'>Detaljnije</button></td>
        {{-- <td><button class='linkDugme' data-link='/lekar/editVisit/{{ $tracker }}'>Izmeni Dijagnozu</button></td> --}}
        {{-- <td><button class='linkDugme' data-link='/lekar/createTreatmant/{{ $tracker }}'>Dodaj<br>Lek</button></td> --}}
        <td><button class='obrisi' data-link='/lekar/destroyVisit/{{ $tracker }}'>Obrisi Posetu</button></td>

        </tr>
        @endforeach
        </table>
        </div>




        @endsection