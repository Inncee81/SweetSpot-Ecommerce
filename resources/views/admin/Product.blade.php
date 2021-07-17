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
            <h1 class="m-0">Produse </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina principală</a></li>
              <li class="breadcrumb-item active">Produse</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

  <?php
    // obtinere produse si folosire join pentru a obtine categorii & subcategorii 
    $qry=DB::Table('products as p')->where('p.type','product')->select('*','p.id as pid')->join('categories as c','c.id','=','p.category_id')->join('subcategory as s','s.id','=','p.subcategory_id')->Get();
    // afisare categorii in ordine
    $category=DB::table('categories')->where('type','product')->get();
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
                    <h3 class="card-title">Vezi Produse</h3>
                  </div>
                  <div class="col-lg-6 text-right">
                    <button data-target="#AddModal" data-toggle="modal" class="btn btn-primary">Adaugă Produs</button>
                  </div>
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered" id="example2">
                  <thead>
                    <tr>
                      <th style="width: 10px">Nr</th>
                      <th>Nume Produs</th>
                      <th>Cantitate</th>
                      <th>Imagine</th>
                      <th>Preț</th>
                      <th>Categorie</th>
                      <th>Subcategorie</th>
                      <th>Acțiuni</th>
                    </tr>
                  </thead>
                  <tbody id="showdata">
                  <!-- afisare produse pe randuri -->
                    @foreach($qry as $q)
                    <tr>
                      <td>{{$q->pid}}</td>
                      <td>{{$q->product_name}}</td>
                      <td>{{$q->qty}}</td>
                      <!-- afisare imagine produs -->
                      <td><img src="{{asset('uploads/')}}/{{$q->product_image}}" width="85" height="70"></td>
                      <td>{{$q->price}}</td>
                      <td>{{$q->category_name}}</td>
                      <td>{{$q->subcategory_name}}</td>
                      <td>
                        <!-- buton pentru editare produs -->
                        <a href="javascript:;"  data="{{$q->pid}}" class="text-success btnEdit"><i class="fa fa-edit"></i></a>
                        <!-- buton pentru stergere produs -->
                        <a href="javascript:;"  data="{{$q->pid}}" class="text-danger btnDelete"><i class="fa fa-trash"></i></a>
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
<!-- adaugare produs modal  -->
<form action="{{url('admin/add-product')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="AddModal">
    <div class="modal-dialog modal-lg modal-fade">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adaugă produs</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Nume Produs</label>
              <input type="" class="form-control" required="" name="product_name">
            </div>
            <div class="col-lg-12">
              <label>Preț</label>
              <input type="number" class="form-control" required="" name="price">
            </div>
            <div class="col-lg-12">
              <label>Cantitate</label>
              <input type="number" class="form-control" required="" name="qty">
            </div>
            <div class="col-lg-12">
              <label>Categorie</label>
              <!-- afisare categorie in drop-down -->
              <select type="" class="form-control" required="" name="category">
                <option value="">Selectează categorie</option>
                @foreach($category as $c)
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
              </select>
            </div>

            <div class="col-lg-12">
              <label>Subcategorie</label>
              <!-- afisare subcategorie in drop down -->
              <select type="" class="form-control" required="" name="subcategory_id">
                <option value="">Categorie neselectată</option>
              </select>
            </div>
            <div class="col-lg-12">
              <label>Imagine Produs</label>
              <input type="file" class="form-control" required="" name="product_image">
            </div>
            <div class="col-lg-12">
              <label>Descriere</label>
              <textarea name="description"  class="form-control" id="summernote" required="" ></textarea>
            </div>
          </div>
        </div>
    
        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- salveaza / inchide modal -->
          <button type="submit" class="btn btn-primary">Adaugă</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- actualizare produs modal -->
<!-- The Modal -->
<form action="{{url('admin/update-product')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="EditModal">
    <div class="modal-dialog modal-fade modal-lg">
      <div class="modal-content">
        <input type="hidden" name="id">
        <input type="hidden" name="hidden_img">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editează produs</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Nume Produs</label>
              <input type="" class="form-control" required="" name="product_name1">
            </div>
            <div class="col-lg-12">
              <label>Preț</label>
              <input type="number" class="form-control" required="" name="price1">
            </div>
            <div class="col-lg-12">
              <label>Cantitate</label>
              <input type="number" class="form-control" required="" name="qty1">
            </div>
            <div class="col-lg-12">
              <label>Categorie</label>
              <select type="" class="form-control" required="" name="category1">
                <option value="">Categorie</option>
                @foreach($category as $c)
                <!-- afisare subcategorie in drop down -->
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-12">
              <label>Subcategorie</label>
              <select type="" class="form-control" required="" name="subcategory_id1">
                <option value="">Categorie neselectată</option>
              </select>
            </div>
            <div class="col-lg-12">
              <label>Imagine Produs</label>
              <input type="file" class="form-control"  name="product_image1">
            </div>
            <div class="col-lg-12">
              <label>Descriere</label>
              <textarea name="description1"  class="form-control" id="summernote1" required="" ></textarea>
            </div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
        <!-- actualizeaza / inchide modal -->
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
@endsection('content')



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js" defer=""></script>

<script type="text/javascript">
$(function(){
  // librarie pentru summernote -> una pentru actualizare, una pentru adauga produs  
  $('#summernote').summernote();
  $('#summernote1').summernote();


  // atunci cand schimbi categoria din adauga produs modal
  $('select[name=category]').change(function(){
      // afisare subcategorii atunci cand schimbi categoria 
      $.ajax({
        type:'get',
        data:{id:$(this).val()},
        url:"{{url('admin/get-subcategory')}}",
        // obtin subcategoria prin AJAX trimitand ID-ul categoriei si afisandu-mi subcategoriile in drop-down
        success:function(res){ 
          var html='';
          for(var i=0;i<res.length;i++){
            html+='<option value='+res[i].id+'>'+res[i].subcategory_name+'</option>'
          }
          $('select[name=subcategory_id]').html(html)
        }
      })
  })

  // atunci cand schimbi categoria din actualizare produs modal
  $('select[name=category1]').change(function(){
  // afisare subcategorii atunci cand schimbi categoria 
    $.ajax({
      type:'get',
      data:{id:$(this).val()},
      url:"{{url('admin/get-subcategory')}}",
      success:function(res){ 
        var html='';
        // obtin subcategoria prin AJAX trimitand ID-ul categoriei si afisandu-mi subcategoriile in drop-down
        for(var i=0;i<res.length;i++){
          html+='<option value='+res[i].id+'>'+res[i].subcategory_name+'</option>'
        }
        $('select[name=subcategory_id1]').html(html)
      }
    })
})


  // atunci cand administratorul apasa pe butonul de editare
  $('#showdata').on('click','.btnEdit',function(){
    var id=$(this).attr('data');
    $('#EditModal').modal('show');

    // obtinerea unui produs specific din baza de date
    $.ajax({
      type:'get',
      data:{id:id},
      url:"{{url('admin/edit-product')}}",
      async:false,
      success:function(res){ 
        // obtinere subcategorii din categoria primita mai sus
        $.ajax({
          type:'get',
          data:{id:res.category_id},
          url:"{{url('admin/get-subcategory')}}",
          async:false,
          success:function(res){ 
            var html='';
            for(var i=0;i<res.length;i++){
              html+='<option value='+res[i].id+'>'+res[i].subcategory_name+'</option>'
            }
            // afisare subcategorii in modal
            $('select[name=subcategory_id1]').html(html)
          }
        })

        // afisare detalii produs in actualizare produs modal
        $('input[name=product_name1]').val(res.product_name);
        $('input[name=price1]').val(res.price);
        $('#summernote1').summernote('code',res.description);
        $('select[name=category1]').val(res.category_id);
        $('select[name=subcategory_id1]').val(res.subcategory_id);
        $('input[name=qty1]').val(res.qty);
        $('input[name=hidden_img]').val(res.product_image);
        $('input[name=id]').val(res.id);
      }
    })
  })

  $('#showdata').on('click','.btnDelete',function(){
    // accesare ID produs pentru a sterge doar produsul dorit
    var id=$(this).attr('data');
    var conf=confirm('Ești sigur că vrei să ștergi acest produs?');
    if(conf){
      window.location.href="{{url('admin/deleteProduct')}}?id="+id;
    }
  })
})
</script>