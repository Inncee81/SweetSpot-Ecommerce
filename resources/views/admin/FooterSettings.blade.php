<!-- FROM LAYOUTS FOLDER WE ARE GETTTING HEADER AND FOOTER AND ALSO SIDEBAR admin. means from admin folder  layouts means in admin/layouts and header is filename -->
@extends('admin.layouts.header')
<!-- summernote -->
<link rel="stylesheet" href="{{asset('public/dashboard_assets/plugins/summernote/summernote-bs4.css')}}">
@extends('admin.layouts.sidebar')
@extends('admin.layouts.footer')
@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setări</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina principală</a></li>
              <li class="breadcrumb-item active">Setări footer</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <?php 
      $settings=DB::table('footer_settings')->first();
    ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <form action="{{url('admin/update-footer-settings')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <h3 class="card-title">Setări footer</h3>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Număr de contact</label>
                        <input type="" name="contact_no" value="{{$settings->contact_no}}" class="form-control">
                      </div>
                    </div>

                    <div class="col-lg-4">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="" name="email" value="{{$settings->email}}" class="form-control">
                      </div>
                    </div>

                    <div class="col-lg-8">
                      <div class="form-group">
                        <label>Footer Credit</label>
                        <input type="" name="credit" value="{{$settings->credit}}"  class="form-control">
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Politică de confidențialitate</label>
                        <textarea type="" name="privacy_policy"   class="form-control summernote">{{$settings->privacy_policy}}</textarea>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Termeni de utilizare</label>
                        <textarea type="" name="terms_of_use"   class="form-control summernote">{{$settings->terms_of_use}}</textarea>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Metode de plată</label>
                        <textarea type="" name="payment_methods"   class="form-control summernote">{{$settings->payment_methods}}</textarea>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <button class="btn btn-primary">Actualizează</button>
                    </div>
                  </div>
                </form>
              </div>      
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection('content')