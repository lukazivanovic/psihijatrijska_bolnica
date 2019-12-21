@extends('layouts.index')

@section('content')

<div class="flexRow">
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
</div>

@endsection