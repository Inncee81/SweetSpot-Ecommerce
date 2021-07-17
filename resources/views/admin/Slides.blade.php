<!-- FROM LAYOUTS FOLDER WE ARE GETTTING HEADER AND FOOTER AND ALSO SIDEBAR admin. means from admin folder  layouts means in admin/layouts and header is filename -->
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
            <h1 class="m-0">Slides pagina principală </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Modifică slides</a></li>
              <li class="breadcrumb-item active">Slides </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
      // obtinere imagini slide din baza de date
      $qry=DB::Table('slides')->Get();
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
                    <h3 class="card-title">Modifică Slides</h3>
                  </div>
                  <div class="col-lg-6 text-right">
                    <button data-target="#AddModal" data-toggle="modal" class="btn btn-primary">Adaugă Slides</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="example2">
                  <thead>
                    <tr>
                      <th style="width: 10px">Nr.</th>
                      <th>Imagine</th>
                      <th>Acțiuni</th>
                    </tr>
                  </thead>
                  <tbody id="showdata">
                    <!-- afisare slide-uri-->
                    @foreach($qry as $q)
                    <tr>
                      <td>{{$q->id}}</td>
                      <td><img src="{{asset('uploads/')}}/{{$q->image}}" width="80" height="70"></td>
                      <td>
                        <!-- buton pentru stergere slide -->
                        <a href="javascript:;"  data="{{$q->id}}" class="text-danger btnDelete"><i class="fa fa-trash"></i></a>
                      </td>
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

  <!-- The Modal -->
  <form action="{{url('admin/add-Slide')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal " id="AddModal">
      <div class="modal-dialog modal-fade">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Adaugă Slide</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label>Imagine Slide</label>
                <input type="file" class="form-control" required="" name="Slide_image">
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Adaugă</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
          </div>
        </div>
      </div>
    </div>
  </form>

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
  // accesare ID slide pentru a sterge doar slide-ul dorit
    var id=$(this).attr('data');
    var conf=confirm('Are you want to sure to delete slide');
    if(conf){
      window.location.href="{{url('admin/deleteSlide')}}?id="+id;
    }
  })
 })
</script>