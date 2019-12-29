@extends('layouts.index')

@section('content')
<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">


<div class="row  text-center">
    <div class="col-md-12">
        @foreach ($errors->all() as $error)
        <p class="text-danger">{{ $error }}</p>
        @endforeach
    </div>

    <div class="margin_20 flexColumn">
        <div class="bolestiNaslov">
            <h1>
                <div>
                    {{ __('Promena podataka') }}
                </div>
            </h1>
        </div>
    </div>


    <div class="promenaLoz">
        <form method="POST" action="/madeChangeUser">
            @csrf

            <input type="text" name="id" value="{{ Auth::user()->id }}" requered hidden>

            <div class="okvir1">
                <div class="okvir11">
                    <label for="name" class="col-md-4 col-form-label text-md-right">
                        Username
                    </label>
                </div>

                <div class="okvir12">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="okvir1">
                <div class="okvir11">
                    <label for="email" class="col-md-4 col-form-label text-md-right">  
                        Email
                    </label>
                </div>

                <div class="okvir12">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- 
            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">
                    Telefon
                </label>
            </div>

            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" required >

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            --}}

            <div class="divPrijava">
                <button type="submit" class="dugmePrijava" style="background-image: url('/images/check_32.png')">
                </button>
            </div>
        </form>
    </div>
</div>
@endsection