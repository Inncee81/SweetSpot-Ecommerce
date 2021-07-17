@extends('admin.layouts.header')
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
            <h1 class="m-0">Utilizatori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina principală</a></li>
              <li class="breadcrumb-item active">Utilizatori </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
      // obtinere utilizatori din baza de date, excluzand administratorul
      $qry=DB::Table('users')->where('id','!=',Auth::id())->Get();
    ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-lg-6">
                    <h3 class="card-title">Utilizatori</h3>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <!-- tabel pentru afisare utilizatori -->
                  <table class="table table-bordered" id="example2">
                    <thead>
                      <tr>
                        <th style="width: 10px">Nr.</th>
                        <th>Nume Complet</th>
                        <th>Email</th>
                        <th>Țară</th>
                        <th>Oraș</th>
                        <th>Cod Poștal</th>
                        <th>Număr Telefon</th>
                        <th>Dată înregistrare</th>
                        <th>Funcție</th>
                        <th>Acțiuni</th>
                      </tr>
                    </thead>
                    <tbody id="showdata">
                      <!-- afisare utilizatori din baza de date-->
                      @foreach($qry as $q)
                      <tr>
                        <td>{{$q->id}}</td>
                        <td>{{$q->name}}</td>
                        <td>{{$q->email}}</td>
                        <td>{{$q->country}}</td>
                        <td>{{$q->city}}</td>
                        <td>{{$q->zip_code}}</td>
                        <td>{{$q->phone_number}}</td>
                        <td>{{$q->created_at}}</td>
                        <td>{{$q->role}}</td>
                        <!-- buton de sterge utilizatori  -->
                        <td><a href="javascript:;"  data="{{$q->id}}" class="text-danger btnDelete"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@endsection('content')
 
 
 
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(function(){
  $('#showdata').on('click','.btnDelete',function(){
    // accesare ID user pentru a sterge doar userul dorit
    var id=$(this).attr('data');
    var conf=confirm('Ești sigur că vrei să ștergi acest utilizator?');
    if(conf){
      window.location.href="{{url('admin/deleteUser')}}?id="+id;
    }
  })
 })
</script>