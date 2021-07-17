@extends('layouts.header')
@extends('layouts.footer')
@section('content')

  <div class="container mt-4 pb-4">
    <div class="row">   
      <div class="col-lg-12">
        <ul class="breadcrumb"> <li><a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/  </a></li>
        <li><a href="{{url('account')}}">&nbsp;&nbsp;Cont &nbsp;&nbsp;/</a></li> <li class="last"><a href=""> &nbsp;&nbsp;
        Inregistreaza-te </a><span class="lock-buton"></span></li> </ul>
        <div class="row">            
          <div class="col-sm-12">
            <div class="well">
              <div class="heading"> 
                <i class="fa fa-key"></i> 
                <h2>Creare cont</h2> 
                <strong>Daca ai deja un cont creat, te rugam sa <a href="{{url('/login')}}"> intri în cont.</a> .</strong> 
              </div>
              <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="control-label" for="input-email">Email</label>
                  <input type="email" name="email" value="{{old('email')}}" placeholder="Email" id="input-email" class="form-control @error('email') is-invalid @enderror"> 
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-password">Parola</label> <input type="password" name="password" value="" placeholder="Parola" id="input-password" class="form-control  @error('password') is-invalid @enderror"> 
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-password">Confirmare Parola</label> <input type="password" name="password_confirmation" value="" placeholder="Confirmare Parola" id="input-password" class="form-control "> 
                </div>
                  
                <div class="form-group">
                  <label class="control-label" for="input-email">Nume Complet </label>
                  <input type="text" name="fullname" value="{{old('fullname')}}" placeholder="Nume Complet " id="input-email" class="form-control  @error('fullname') is-invalid @enderror">
                  @error('fullname')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror  
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-email">Adresa</label>
                  <input type="text" name="address" value="{{old('address')}}" placeholder="Adresa" id="input-email" class="form-control  @error('address') is-invalid @enderror">
                  @error('address')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror  
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-email">Oras</label>
                  <input type="text" name="city" value="{{old('city')}}" placeholder="Oras" id="input-email" class="form-control  @error('city') is-invalid @enderror"> 
                  @error('city')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-email">Cod Postal</label>
                  <input type="text" name="zip_code" value="{{old('zip_code')}}" placeholder="Cod Postal" id="input-email" class="form-control  @error('zip_code') is-invalid @enderror"> 
                  @error('zip_code')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-email">Numar Telefon</label>
                  <input type="text" name="phone_number" value="{{old('phone_number')}}" placeholder="Numar Telefon" id="input-email" class="form-control  @error('phone_number') is-invalid @enderror"> 
                  @error('phone_no')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-email">Tara</label>
                    <select type="text" name="country"  id="input-email" style="height: 49px;" class="form-control p-0  px-3  @error('country') is-invalid @enderror">
                      <option value="Romania">Romania</option>
                      <option value="Belgium">Belgia</option><option value="Bulgaria">Bulgaria</option><option value="Czech Republic">Republica Cehă</option>
                    </select>        
                </div> 
                <input type="submit" value="Inregistreaza-te" class="btn btn-outline">
              </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection('content')