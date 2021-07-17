@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<style type="text/css">
	.form-control{
		height: 50px;
	}
	#contact {
		background-color: #EBF2FA;
	}
	.sendBtn {
	background: white;
	color: #545C5E;
	border-color: #359dc9;
	border-radius: 14px; 
	}
	.sendBtn:hover {
    background: #359dc9;
    color: white;
	border-color: #359dc9;
	}
</style>


<section class="contact py-5" id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@if(Session::has('success'))
					<div class="alert alert-success" >
						{{Session::get('success')}}
					</div>
				@endif
				<h4>Contacteaza-ne</h4>
				<hr style="border: 2px solid #359dc9;">
			</div>
			<div class="col-md-6">
				<div class="address">
					<h5>Adresa noastra</h5>
					<ul class="list-unstyled" style="color:#359dc9">
						<li> Strada 13 Decembrie 1998 nr. 10</li>
						<li> Brasov, Romania</li>
					</ul>
					<p>Printr-un simplu formular pe care il completezi cu numele si prenumele, adresa de email, numarul de telefon si un mesaj de tip text, un membru al echipei SweetSpot te va contacta si iti va raspunde nevoilor tale in mai putin de 2 ore!</p>
					<p>Indiferent daca este o intrebare despre: o viitoare comanda, o comanda in curs, o cerere de retur pentru un anumit produs, mai multe detalii despre un anumit produs, sau orice alta intrebare, suntem aici sa iti raspundem cu multa placere.</p>
					<p>Totodata, ne poti contacta la adresa de email sau numarul de telefon din josul paginii.</p>
				</div>
				<div class="email">
					<h5>Email:</h5>
					<ul class="list-unstyled" style="color:#359dc9">
						<li> SweetSpot@gmail.com</li>
					</ul>
				</div>
				<div class="phone">
					<h5>Numar de telefon:</h5>
					<ul class="list-unstyled" style="color:#359dc9">
						<li> +40 752 897 527</li>
					</ul>
				</div>
				<hr style="border: 2px solid #359dc9;">
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<h3>Trimite-ne un mesaj</h3><br>
						<form action="insert-contact-us" method="post">
							@csrf 
							<div class="form-row">
								<div class="form-group col-md-12">
									<input id="Full Name" name="name"  required="" placeholder="Nume Prenume" class="form-control" type="text">
								</div>
								<div class="form-group col-md-12">
									<input type="email"   required="" name="email" class="form-control" id="inputEmail4" placeholder="Email">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<input id="Mobile No." name="mobile_no"   required="" placeholder="Numar de telefon" class="form-control" required="required" type="text">
								</div>
								<div class="form-group col-md-12">
									<textarea id="comment" name="comment" cols="40"   required="" rows="5" placeholder="Mesajul tau"class="form-control"></textarea>
								</div>
							</div>
							<div class=" col-md-12 text-center">
								<button type="submit" class="sendBtn btn btn-secondary btn-lg">Trimite</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection('content')