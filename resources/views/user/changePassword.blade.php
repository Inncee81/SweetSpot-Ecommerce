@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-3">
      <div class="box category"> 
        <div class="box-heading"><h3>Acasă </h3></div>
        <div class="box-content"> 
          <div class="box-category">
            <div class="list-group">
              <a href="{{url('my-account')}}" class="list-group-item">Contul meu</a> 
              <a href="{{url('change-password')}}" class="list-group-item">Schimbă parola</a>                                  
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      @if(Session::has('success'))
      <div class="alert alert-success">
        {{Session::get('success')}}
      </div>
      @endif
      <div class="card">
        <div class="card-header text-white" style="background: #545C5E;"> 
          <h3 class="text-white">Schimbă parola</h3>
        </div>
        <form action="{{url('changePassword')}}" method="post">
          @csrf
          <div class="card-body ">
            <div class="form-group">
              <label style="color: #545C5E">Vechea parolă</label>
              <input type="password" class="form-control" name="old_password">
            </div>

            <div class="form-group">
              <label style="color: #545C5E">Noua parolă</label>
              <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
              <label style="color: #545C5E">Confirmă noua parolă</label>
              <input type="password" class="form-control" name="confirm_password">
            </div>

            <div class="form-group mt-4">
              <button class="btn btn-brown">Modifică</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection('content')