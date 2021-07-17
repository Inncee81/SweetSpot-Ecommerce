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
            <h1 class="m-0">Subcategorii</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Acasă</a></li>
              <li class="breadcrumb-item active">Subcategorii</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
      // obtinere subcategorii din baza de date
      $qry=DB::Table('subcategory as p')->select('*','p.id as nrCrt')->join('categories as c','c.id','=','p.category_id') ->Get();
      // afisare in ordine dupa categorie
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
                    <h3 class="card-title">Adaugă Subcategorii</h3>
                  </div>
                  <div class="col-lg-6 text-right">
                    <button data-target="#AddModal" data-toggle="modal" class="btn btn-primary">Adaugă Subcategorie</button>
                  </div> 
                </div>
              </div>

              <div class="card-body">
                <table class="table table-bordered" id="example2">
                  <thead>
                    <tr>
                      <th style="width: 10px">Nr.</th>
                      <th>Categorie</th>
                      <th>Subcategorie</th>
                      <th>Acțiuni</th>
                    </tr>
                  </thead>
                  <tbody id="showdata">
                    <!-- afisare subcategorii -->
                    @foreach($qry as $q)
                      <tr>
                        <td>{{$q->nrCrt}}</td>
                        <td>{{$q->category_name}}</td>
                        <td>{{$q->subcategory_name}}</td>
                        <td>
                          <!-- buton editare -->
                          <a href="javascript:;"  data="{{$q->nrCrt}}"  data1="{{$q->category_id}}" data2="{{$q->subcategory_name}}" class="text-success btnEdit"><i class="fa fa-edit"></i></a>
                          <!-- buton stergere -->
                          <a href="javascript:;"  data="{{$q->nrCrt}}" class="text-danger btnDelete"><i class="fa fa-trash"></i></a>
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
<!-- adauga subcategorie modal  -->
<form action="{{url('admin/add-subcategory')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="AddModal">
    <div class="modal-dialog modal-fade">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adaugă Subcategorie</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Categorie</label>
              <select type="" class="form-control" required="" name="category_id">
                <option value="">Selectează Categorie</option>
                <!-- afisare categorii din baza de date -->
                @foreach($category as $c)
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-12">
              <label>Nume Subcategorie</label>
              <input type="" class="form-control" required="" name="subcategory_name">
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

<!-- actualizeaza categorie modal -->
<!-- The Modal -->
<form action="{{url('admin/update-subcategory')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal " id="EditModal">
    <div class="modal-dialog modal-fade">
      <div class="modal-content">
        <input type="hidden" name="id">
        <input type="hidden" name="hidden_img">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Actualizează Subcategorie</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <label>Categorie</label>
              <select type="" class="form-control" required="" name="category_id1">
                <option value="">Selectează categorie</option>
                @foreach($category as $c)
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-12">
              <label>Nume Subcategorie</label>
              <input type="" class="form-control" required="" name="subcategory_name1">
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

@endsection('content')






<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(function(){
  // functie pentru butonul de editare
  $('#showdata').on('click','.btnEdit',function(){
    var id=$(this).attr('data');
    // afisare modal dupa ID
    $('#EditModal').modal('show');
    // obtinerea atributului din functia edit si afisarea campurilor in modal
    $('select[name=category_id1]').val($(this).attr('data1'));
    $('input[name=subcategory_name1]').val($(this).attr('data2'));
    $('input[name=id]').val( id);
  })
  $('#showdata').on('click','.btnDelete',function(){
    // accesare ID subcategorie pentru a sterge doar subcategoria dorita
    var id=$(this).attr('data');
    var conf=confirm('Ești sigur că vrei să ștergi această subcategorie?');
    if(conf){
      window.location.href="{{url('admin/deleteSubCategory')}}?id="+id;
    }
  })
 })
</script>