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
            <h1 class="m-0">Categorii </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagină principală</a></li>
              <li class="breadcrumb-item active">Categorii </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

<?php
$qry=DB::Table('categories')->where('type','product')->Get();
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
                    <h3 class="card-title">Adaugă categorii noi</h3>
                  </div>
                  <div class="col-lg-6 text-right">
                      <button data-target="#AddModal" data-toggle="modal" class="btn btn-primary">Adaugă categorie</button>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered" id="example2">
                  <thead>
                    <tr>
                      <th style="width: 10px">Nr.</th>
                      <th>Nume</th>
                      <th>Imagine</th>
                      <th>Acțiuni</th>
                    </tr>
                  </thead>

                  <tbody id="showdata">
                    <!-- afisare categorii pe randuri-->
                    @foreach($qry as $q)
                    <tr>
                      <td>{{$q->id}}</td>
                      <td>{{$q->category_name}}</td>
                      <td><img src="{{asset('uploads/')}}/{{$q->category_image}}" width="85" height="70"></td>
                      <td>
                        <a href="javascript:;"  data="{{$q->id}}" class="text-success btnEdit"><i class="fa fa-edit"></i></a>
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
  <!-- /.content-wrapper -->

<!-- The Modal -->
<form action="{{url('admin/add-category')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="AddModal">
    <div class="modal-dialog modal-fade">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Adaugă categorie</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label>Nume categorie</label>
                <input type="" class="form-control" required="" name="category_name">
              </div>
              <div class="col-lg-12">
                <label>Imagine categorie</label>
                <input type="file" class="form-control" required="" name="category_image">
              </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvează</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
          </div>
        </div>
    </div>
  </div>
</form>

<!-- The Modal -->
<form action="{{url('admin/update-category')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="EditModal">
    <div class="modal-dialog modal-fade">
      <div class="modal-content">
        <input type="hidden" name="id">
        <input type="hidden" name="hidden_img">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizează subcategorie</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Nume categorie</label>
              <input type="" class="form-control" required="" name="category_name1">
            </div>
            <div class="col-lg-12">
              <label>Imagine categorie</label>
              <input type="file" class="form-control"  name="category_image1">
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizează</button>
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

  <!-- Main Footer -->
@endsection('content')

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(function(){
 
  $('#showdata').on('click','.btnEdit',function(){
      var id=$(this).attr('data');
      $('#EditModal').modal('show');
      $.ajax({
        type:'get',
        data:{id:id},
        url:"{{url('admin/edit-category')}}",
        success:function(res){ 
          $('input[name=category_name1]').val(res.category_name);
          $('input[name=hidden_img]').val(res.category_image);
          $('input[name=id]').val(res.id);
        }
      })
  })
 $('#showdata').on('click','.btnDelete',function(){
  // accesare categorie ID si trimitere pentru a fi stearsa numai categoria respectiva
  var id=$(this).attr('data');
  var conf=confirm('Esti sigur ca vrei sa stergi aceasta categorie?');
    if(conf){
      window.location.href="{{url('admin/deleteCategory')}}?id="+id;
    }
  })
 })
</script>