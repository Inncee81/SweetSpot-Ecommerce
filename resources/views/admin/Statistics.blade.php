@extends('admin.layouts.header')
@extends('admin.layouts.sidebar')


@section('content')


<style type="text/css">
h3, p {
  text-align: center;
}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Statistici</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Pagină principală</a></li>
            <li class="breadcrumb-item active">Statistici </li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <?php

    // numar total de utilizatori
    $userqry=DB::table('users')->where('role', '=', 'user')->count();

    // numar total de admini
    $adminsQry=DB::table('users')->where('role', '=', 'admin')->count();

    // numar total de comenzi plasate astazi
    $today_order=DB::Table('orders')->where('created_at','>=',date('Y-m-d 00:00:00'))->where('order_status','!=','Cancelled')->count();

    // numar total de calculatoare
    $computersQry=DB::table('products')->where('category_id', '=', 1)->count();

    // numar total de laptopuri
    $laptopsQry=DB::table('products')->where('category_id', '=', 2)->count();

    // numar total de produse pe site
    $productsQry=DB::table('products')->count();

    // numar total de subcategorii pentru calculatoare
    $subcategoryLaptopsQry=DB::table('subcategory')->where('category_id', '=', 1)->count();

    // numar total de subcategorii pentru laptopuri
    $subcategoryComputersQry=DB::table('subcategory')->where('category_id', '=', 2)->count();
  ?>

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$userqry}}</h3>
              <p>Număr total de utilizatori</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-secondary">
            <div class="inner">
              <h3>{{$adminsQry}}</h3>
              <p>Număr total de admini</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$today_order}}</h3>
              <p>Număr total de comenzi plasate astăzi</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$computersQry}}</h3>
              <p>Număr total de calculatoare</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3>{{$laptopsQry}}</h3>
              <p>Număr total de laptopuri</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-light">
            <div class="inner">
              <h3>{{$productsQry}}</h3>
              <p>Număr total de produse</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <h3>{{$subcategoryLaptopsQry}}</h3>
              <p>Număr total de subcategorii pentru laptopuri</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>

        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$subcategoryComputersQry}}</h3>
              <p>Număr total de subcategorii pentru calculatoare</p>
            </div>
            <div class="icon"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection('content')


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
