@extends('layouts.index')

@section('content')
	<link rel="stylesheet" href="{{ url('/css/osobljeStyle.css') }}">

	<button class='linkDugme' data-link='/bolesti'>Povratak na listu</button>

	<form action="/bolesti/store" method="POST">
		@csrf
		
			<div class="okvir1">

				<div class="okvir11">
					<label>Šifra oboljenja</label>
				</div>
				<div class="okvir12">
					<input type="text" name="sifra" value="" requred>
				</div>

			</div>

			<div class="okvir1">

				<div class="okvir11">
					<label>Naziv oboljenja</label>
				</div>
				
				<div class="okvir12">
					<input type="text" name="ime" value="" requred>
				</div>

			</div>

			<input id='dugme' type="submit" value="Unesi">


	</form>
@endsection