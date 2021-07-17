<!-- FROM LAYOUTS FOLDER WE ARE GETTTING HEADER AND FOOTER AND ALSO SIDEBAR admin. means from admin folder  layouts means in admin/layouts and header is filename -->
@extends('admin.layouts.header')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.footer')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header Page header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagină principală</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
      // intrebarile din "Contacteaza-ne" afisate pe randuri 
      $contact=DB::table('contact_us')->orderBy('id','desc')->get();
    ?>
    

    <div class="col-sm-12">
      <div class="card">
        <div class="card-header">
          <h3>Întrebări din secțiunea "Conteactează-ne"</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="example2">
              <thead>
                <tr>
                  <th style="width: 10px">Nr.</th>
                  <th>Nume</th>
                  <th>Email</th>
                  <th>Telefon</th>
                  <th>Mesaj</th>
                </tr>
              </thead>

              <tbody id="showdata">
                <!-- afisare intrebari -->
                <?php $nrCrt=0;?>
                @foreach($contact as $q)
                <?php $nrCrt++; ?>
                  <tr>
                    <td>{{$nrCrt}}</td>
                    <td>{{$q->name}}</td>
                    <td>{{$q->email}}</td>
                    <td>{{$q->mobile_no}}</td>
                    <td>{{$q->comment}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
 
<!-- Main Footer -->
@endsection('content')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 