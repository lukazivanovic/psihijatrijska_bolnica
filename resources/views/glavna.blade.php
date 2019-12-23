@extends('layouts.index')

@section('content')

<div class="mainContent">
    <div class="contentOptions">
        <div class="contentItems">
            @auth
            @if (Auth::user()->role==2)
            <div class="optionsItems">
                <a href="/kartoniStranica">
                    <div class="nav-btn btn-icons btn-icons">
                        <p class="records">Kartoni</p>
                        <img src="/images/medical-report.png" alt="report">
                    </div>  
                </a>
            </div>          
            @endif
            @if (Auth::user()->role==3)
            <div class="optionsItems">
                <a href="/admin">
                    <div class="nav-btn btn-icons">
                        <p class="records">Spisak korisnika</p>
                        <i class="fas fa-user-md"></i>
                    </div>
                </a>
            </div>
            @endif
            @if (Auth::user()->role==1)
            <div class="optionsItems">
                <a href="/osoblje">
                    <div class="nav-btn btn-icons">
                        <i class="fas fa-user-nurse"></i>Svi Pacijenti
                    </div>
                </a>
            </div>
            @endif
            @if (Auth::user()->role==1 or Auth::user()->role==2)
            <div class="optionsItems">
                <a href="/bolesti">
                    <div class="nav-btn btn-icons">
                        <p class="records">Knjiga bolesti</p>
                        <img src="/images/medical-notes.png" alt="medical-notes">
                    </div> 
                </a>
            </div>
            <div class="optionsItems">
                <a href="/lekovi">
                    <div class="nav-btn btn-icons">
                        <p class="records">Spisak lekova</p>
                        <img src="/images/medical-pills.png" alt="pills">
                    </div>    
                </a>
            </div>        
            @endif  
            @endauth
        </div>
        <div class="weather">
        <div class="weatherItems">
            <div class="margin_20">
                <div id="vreme"></div>
                <script src="/js/app.js"></script>
            </div>
        </div>
        </div>
    </div>
    <!-- <div class="weather">
        <div class="weatherItems">
            <div class="margin_20">
                <div id="vreme"></div>
                <script src="/js/app.js"></script>
            </div>
        </div>
    </div> -->
</div>


<!-- <div class="flexRow">
    <div class="margin_20">
        <h3>Vue</h3>
        <div class="vueApi">
            <div class="vreme"><p>@{{ time }}</p></div>
            <div class="grid-weather"> 
                <div class="city">
                    <p>@{{ name }}</p>
                    <select name="" id="" v-model="grad" @change='setFetch'>
                        <option value="Europe/Belgrade/rs" selected>Belgrade</option>
                        <option value="Europe/Paris/fr">Paris</option>
                        <option value="Europe/London/uk">London</option>
                        <option value="Asia/Tokyo/jp">Tokyo</option>
                    </select>
                    <p>@{{ datum }}</p>
                    <span><img src="/images/humidity.png" alt="vlaznost">@{{ humidity }} %</span>
                    <span><img src="/images/pressure.png" alt="pressure">@{{ pressure }}mb</span>
                </div>
                <div class="weather">
                    <span><img src="/images/weather.png" alt="weather"><p>@{{ temp }} C</p></span>
                </div>
            </div>
        </div>
        <script src="{{ asset('/js/vueApi.js') }}" defer></script>
    </div>
    <div class="margin_20">
        <h3>React</h3>
        <div id="vreme"></div>
        <script src="/js/app.js"></script>
    </div>
</div> -->

@endsection