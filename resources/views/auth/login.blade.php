@extends('layouts.header')
@extends('layouts.footer')
@section('content')

 <div class="container mt-4 pb-4">
    <div class="row">  
      <div class="col-lg-12">
        <ul class="breadcrumb"> 
          <li>
            <a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/</a>
          </li>
          <li>
            <a href="{{url('account')}}">&nbsp;&nbsp;Cont &nbsp;&nbsp;/</a>
          </li> 
          <li class="last">
            <a href=""> &nbsp;&nbsp;Intra in cont</a><span class="lock-buton"></span>
          </li> 
        </ul>
        <div class="row">
          <div class="col-sm-6">
            <div class="well">
              <div class="heading">
                <i class="fa fa-file-text-o"></i> 
                <div class="extra-wrap"> 
                  <h2> Cont nou</h2> <strong>Creaza un cont nou</strong> 
                </div>
              </div>
              <p>Crearea unui cont va va permite sa faceti cumparaturi mai rapid, sa vizualizati starea comenzii si istoricul. </p> 
              <a href="{{url('register')}}" class="btn btn-outline">Continua</a>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="well">
              <div class="heading"> 
                <i class="fa fa-key"></i> 
                <h2>Utilizator inregistrat</h2> 
                <strong>Am deja un cont.</strong> 
              </div>
              <form action="{{url('login')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label class="control-label" for="input-email">  Email</label>
                  <input type="text" name="email" value="" placeholder="Email" id="input-email" class="form-control   @error('email') is-invalid @enderror"> 
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                </div> 

                <div class="form-group">
                  <label class="control-label" for="input-password"> Parola</label> 
                  <input type="password" name="password" value="" placeholder="Introdu Parola" id="input-password" class="form-control   @error('password') is-invalid @enderror"> 
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror 
                  <br> 
                  <a href="{{route('password.request')}}" class="forgot">Ti-ai uitat parola?</a></div> 
                  <input type="submit" value="Intra in cont" class="btn btn-outline">
              </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection('content')