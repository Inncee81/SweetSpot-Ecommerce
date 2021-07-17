@extends('layouts.header')
@extends('layouts.footer')
@section('content')
 
<div class="container py-5">
    <div class="col-lg-5 m-auto">
        <h1 class="">Resetează parola</h1>
        <p class="signup-link recovery">Introduceți o parolă nouă contului dumneavoastră</p>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <div class="form">
                <input type="hidden" name="token" value="{{ $token }}">
                <div id="email-field" class="field-wrapper input ">
                    <div class="d-flex justify-content-between">
                        <label for="email">Email</label>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" readonly ="" 
                    value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                        
                <div id="email-field" class="field-wrapper inpu">
                    <div class="d-flex justify-content-between">
                        <label for="email">Parolă</label>
                                        
                    </div>
                    <input id="password" placeholder="Parola" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                            
                <div id="email-field" class="field-wrapper input">
                    <div class="d-flex justify-content-between">
                        <label for="email">Confirmare Parolă</label>
                    </div> 
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirma Parola" required autocomplete="new-password">
                </div> 
                <div class="form-group  mb-0">
                    <button type="submit" class="btn btn-brown mt-4">{{ __('Resetează parola') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
       
@endsection('content')
 