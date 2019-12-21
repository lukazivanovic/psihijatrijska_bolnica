<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>psi_bolnica</title>

    {{-- Bootstrap --}}

    {{-- <link rel="stylesheet" href="{{ url('/css/bootstrap.css') }}">
    <script src="{{ asset('/js/bootstrap.js') }}" defer></script> --}}

    {{-- CSS --}}

    <link rel="stylesheet" href="{{ url('/css/mainStyle.css') }}">
    <link rel="stylesheet" href="{{ url('/css/reactKarton.css') }}">
    <link rel="stylesheet" href="{{ url('/css/detalji.css') }}">

    {{-- JS --}}

    <script src="{{ asset('/js/biblioteka.js') }}" defer></script>
    <script src={{ asset('/js/mainJS.js') }} defer></script>

    {{-- Vue --}}

    {{-- -develpment version --}}
    <script src="{{ asset('/js/vue.js') }}" defer></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js" defer></script> --}}

    {{-- prodaction version --}}
    {{-- <script src="{{ asset('/js/vue.min.js') }}" defer></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.0" defer></script> --}}

    {{-- React --}}
    {{-- <script src="{{ asset('/js/app.js') }}" defer></script> --}}
    
    
</head>
<body>
    <div class="container">
        <div class="header"> 
            <div class="logo">
                <img src="/images/logoNoviDva.jpg" alt="logo">
            </div>
            <div class="divider">
                <div class="login">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                                    <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                                @else
                                    <a href="{{ route('login') }}">Login</a>
        
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>  
        </div>

        

        <div class="prazan"></div>

        <div class="flexRow">
            <aside>
                    <div class="nav-btn">
                        <a href="/glavna"><i class="fas fa-user-md"></i>Glavna</a>
                    </div>
                    @auth
                    @if (Auth::user()->role==3)
                    <div class="nav-btn">
                        <a href="/admin"><i class="fas fa-user-md"></i>Spisak korisnika</a>
                    </div>
                    @endif
                    @if (Auth::user()->role==1)
                    <div class="nav-btn">
                        <a href="/osoblje"><i class="fas fa-user-md"></i>Svi Pacijenti</a>
                    </div>
                    @endif
                    @if (Auth::user()->role==2)
                    <div class="nav-btn">
                        <a href="/kartoniStranica"><i class="fas fa-user-md"></i>Kartoni</a>
                    </div>            
                    @endif
                    @if (Auth::user()->role==1 or Auth::user()->role==2)
                    <div class="nav-btn">
                        <a href="/bolesti"><i class="fas fa-pills"></i>Spisak bolesti</a>
                    </div> 
                    <div class="nav-btn">
                        <a href="/lekovi"><i class="fas fa-pills"></i>Spisak lekova</a>
                    </div>            
                    @endif
                    {{-- <li><a href="/test">Test</a></li> --}}
                    {{-- <li><a href="/createDataJSON" target="_blank">JSON</a></li> --}}
                    {{-- <li><a href="/reactAPI">ReactAPI</a></li> --}}
                @endauth

            </aside>
            <div class="glavna">
                @section('content')
                    
                @show
            </div>
        </div>
        

        <div class="footer">
            <div class="info">
                <span class="icons">
                    <span>
                        <img src="/images/clock.png" alt="radno vreme">00 - 24
                    </span>
                    <span>
                        <img src="/images/location.png" alt="adresa">Savski Nasip 1
                    </span>
                    <span>
                        <img src="/images/phone.png" alt="telefon">011 222 3333
                    </span>
                </span>
            </div>
        </div>

            
        
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</body>
</html>