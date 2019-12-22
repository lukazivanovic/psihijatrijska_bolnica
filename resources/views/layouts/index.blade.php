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
    <link rel="stylesheet" href="{{ url('/css/all.min.css') }}">

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
    <div class="kontenjer">
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

        <div class="main">
            <aside>
                    <a href="/glavna">
                        <div class="nav-btn">
                            <i class="fas fa-hospital"></i>Glavna
                        </div>
                    </a>
                    @auth
                    @if (Auth::user()->role==3)
                    <a href="/admin">
                        <div class="nav-btn">
                            <i class="fas fa-user-md"></i>Spisak korisnika
                        </div>
                    </a>
                    @endif
                    @if (Auth::user()->role==1)
                    <a href="/osoblje">
                        <div class="nav-btn">
                            <i class="fas fa-user-nurse"></i>Svi Pacijenti
                        </div>
                    </a>
                    @endif
                    @if (Auth::user()->role==2)
                    <a href="/kartoniStranica">
                        <div class="nav-btn">
                            <i class="fas fa-id-card-alt"></i>Kartoni
                        </div>  
                    </a>          
                    @endif
                    @if (Auth::user()->role==1 or Auth::user()->role==2)
                    <a href="/bolesti">
                        <div class="nav-btn">
                            <i class="fas fa-pills"></i>Spisak bolesti
                        </div> 
                    </a>
                    <a href="/lekovi">
                        <div class="nav-btn">
                            <i class="fas fa-pills"></i>Spisak lekova
                        </div>    
                    </a>        
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
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
</body>
</html>