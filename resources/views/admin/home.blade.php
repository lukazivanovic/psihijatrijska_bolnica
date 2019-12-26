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
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Change Role</th>
        <th>Remove</th>
        
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
                    ."<td><button class='linkDugme' data-link='/admin/roleChange/".$user->id."'>Change Role</button></td>"

                    ."<td><button class='obrisi' data-link='/admin/delete/$user->id'>Remove</button></td>"
                    
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
                    ."<td><button class='linkDugme' data-link='/admin/roleChange/".$user->id."'>Change Role</button></td>"

                    ."<td><button class='obrisi' data-link='/admin/delete/$user->id'>Remove</button></td>"
                    
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
                    ."<td><button class='linkDugme' data-link='/admin/roleChange/".$user->id."'>Change Role</button></td>"

                    ."<td><button class='obrisi' data-link='/admin/delete/$user->id'>Remove</button></td>"
                    
             . "</tr>";
            !!}
        @endif
        
    @endforeach
</table>

@endsection