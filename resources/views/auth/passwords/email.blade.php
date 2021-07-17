@extends('layouts.header')
@extends('layouts.footer')
@section('content')
 
 
<div class="container py-5">
    <div class="col-lg-5 m-auto">
        <h1 class="">Recuperează parolă</h1>
        <p class="signup-link recovery"> Introdu adresa de email pentru ați trimite o parolă nouă.</p>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div id="email-field" class="field-wrapper input">
                    <div class="d-flex justify-content-between">
                        <label for="email">Email</label>
                    </div>
                    <input id="email" type="text"   class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Introdu Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class=" ">
                    <div class="field-wrapper">
                        <button type="submit" class="btn btn-brown mt-3" value="">Trimite</button>
                    </div>
                </div>
            </div>
        </form>
    </div>                    
</div>
   
@endsection('content')