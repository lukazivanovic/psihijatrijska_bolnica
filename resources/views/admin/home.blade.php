@extends('layouts.index')

@section('content')

{{-- @php
    var_dump($users);
@endphp --}}
@auth
        <div class="margin_20">
            <label for="filter">
                <input type="text" id="filter" class='filter' style="background-image: url('/images/search.png')" placeholder="Pretraži...">
            </label>
        </div>
@endauth

<table>
    <tr>
        <th>Ime</th>
        <th>Email</th>
        <th>Uloga</th>
        <th>Promeni ulogu</th>
        <th>Otpusti</th>
        
    </tr>

    @foreach ($users as $user)
        @if ($user->role==1)
        {!! 
            "<tr>" .
    
                "<td>" .
                    $user->name
                    . "</td>".
    
                    "<td>" .
                    $user->email
                    . "</td>".
    
                    "<td>" .
                    "Osoblje"
                    . "</td>"
                    ."<td><button class='linkDugme srednjeDugme' data-link='/admin/roleChange/".$user->id."'>Promeni ulogu</button></td>"

                    ."<td><button class='obrisi srednjeDugme' data-link='/admin/delete/$user->id'>Otpusti</button></td>"
                    
             . "</tr>";
            !!}
        @elseif ($user->role==2)
        {!! 
            "<tr>" .
    
                "<td>" .
                    $user->name
                    . "</td>".
    
                    "<td>" .
                    $user->email
                    . "</td>".
    
                    "<td>" .
                    "Lekar"
                    . "</td>"
                    ."<td><button class='linkDugme srednjeDugme' data-link='/admin/roleChange/".$user->id."'>Promeni ulogu</button></td>"

                    ."<td><button class='obrisi srednjeDugme' data-link='/admin/delete/$user->id'>Otpusti</button></td>"
                    
             . "</tr>";
            !!}
        @elseif($user->role==3)
            {!! 
                "<tr>" .
        
                    "<td>" .
                        $user->name
                        . "</td>".
        
                        "<td>" .
                        $user->email
                        . "</td>".
        
                        "<td>" .
                        "Administrator"
                        . "</td>"
        
                        ."<td></td>"
        
                        
                        ."<td></td>"
                        
                . "</tr>";
                !!}
        @else
        {!! 
            "<tr>" .
    
                "<td>" .
                    $user->name
                    . "</td>".
    
                    "<td>" .
                    $user->email
                    . "</td>".
    
                    "<td>" .
                    $user->role
                    . "</td>"
                    ."<td><button class='linkDugme srednjeDugme' data-link='/admin/roleChange/".$user->id."'>Promeni ulogu</button></td>"

                    ."<td><button class='obrisi srednjeDugme' data-link='/admin/delete/$user->id'>Otpusti</button></td>"
                    
             . "</tr>";
            !!}
        @endif
        
    @endforeach
</table>

@endsection