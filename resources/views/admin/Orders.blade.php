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
            <h1 class="m-0">Comenzi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Pagina principală</a></li>
              <li class="breadcrumb-item active">Comenzi</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
      // toate comenzile 
      $qry=DB::Table('orders as o')->select('*','o.id as nrCrt','o.created_at as date_of_order')->join('users as u','u.id','=','o.user_id')->Get();
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
                    <h3 class="card-title">Comenzi</h3>
                  </div>
                </div>
              </div>

              <div class="card-body ">
                <div class="table-responsive">
                  <table class="table table-bordered" id="example2">
                    <thead>
                      <tr>
                        <th style="width: 10px">Nr.</th>
                        <th>Nume</th>
                        <th>Total</th>
                        <th>Țară</th>
                        <th>Oraș</th>
                        <th>Adresă</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Cod Poștal</th>
                        <th>Status</th>
                        <th>Dată comandă</th>
                        <th>Acțiuni</th>
                      </tr>
                    </thead>

                    <tbody id="showdata">
                      <!-- afisare comenzi in tabel -->
                      @foreach($qry as $q)
                      <tr>
                        <td>{{$q->nrCrt}}</td>
                        <td>{{$q->name}}</td>
                        <!-- calculare TOTAL -->
                        <td>{{$q->total_amount+15+($q->total_amount/100*19)}}</td>
                        <td>{{$q->country}}</td>
                        <td>{{$q->city}}</td>
                        <td>{{$q->address}}</td>
                        <td>{{$q->email}}</td>
                        <td>{{$q->phone_number}}</td>
                        <td>{{$q->zip_code}}</td>
                        <td>
                          <!-- daca statusul e "waiting" afiseaza rosu, altfel afiseaza verde -->
                          @if($q->order_status=='Waiting')
                          <div class="badge badge-danger"> {{$q->order_status}}</div>
                          @else
                          <div class="badge badge-success"> {{$q->order_status}}</div>
                          @endif
                          <!-- buton pentru starea comenzii -->
                          <a href="javascript:;"  data="{{$q->nrCrt}}"  data1="{{$q->order_status}}" class="text-primary btnStatus"><i class="fa fa-edit"></i></a>
                        </td>
                        <td>{{$q->date_of_order}}</td>
                        <td>
                          <!-- buton vezi detalii comanda -->
                          <a href="javascript:;"  data="{{$q->nrCrt}}" class="text-success btnEdit"><i class="fa fa-eye"></i></a>
                          <!-- buton sterge comanda -->
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
  </div>

  <!-- The Modal -->
  <!-- schimba starea comenzii modal-->
  <form action="{{url('admin/update-status')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal " id="AddModal">
      <div class="modal-dialog  modal-fade">
        <div class="modal-content">
          <input type="hidden" name="id">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Schimbă starea comenzii</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <label>Status</label>
                <select type="" class="form-control"  name="order_status">
                  <option value="Waiting">În așteptare </option>
                  <option value="Completed">Efectuată</option>
                </select>
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

 <!-- buton pentru vezi detalii comanda -->
<div class="modal " id="EditModal">
  <div class="modal-dialog modal-fade modal-lg">
    <div class="modal-content">
      <input type="hidden" name="hidden_img">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Vezi detalii comandă</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <table class=" table " id="example2"> 
              <thead>
                <th>Nr</th>
                <th>Nume produs</th>
                <th>Cantitate</th>
                <th>Preț</th>
              </thead>
              <!-- afisare produs in views -->
              <tbody id="showdata1"></tbody>
            </table>
          </div>
        </div>
      </div>
   
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Închide</button>
      </div>
    </div>
  </div>
</div>

<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  </aside>

<!-- Main Footer -->
@endsection('content')


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(function(){
 
  // functie pentru atunci cand administratorul apasa pe "status comanda"
  $('#showdata').on('click','.btnStatus',function(){
      var id=$(this).attr('data');
      var status=$(this).attr('data1');
      // obtine id-ul, starea actuala si afieaza in campuri // deschide modal totodata
      $('#AddModal').modal('show');
      $('select[name=order_status]').val(status);
      $('input[name=id]').val(id);
  })
  // functie pentru atunci cand administratorul apasa pe "vezi detalii comanda"
  $('#showdata').on('click','.btnEdit',function(){
    var id=$(this).attr('data');
    // deschidere in modal
    $('#EditModal').modal('show');
    // obtinere ID comanda si trimitem controller-ului pentru a obtine detalii despre aceasta comanda prin AJAX
    $.ajax({
      type:'get',
      data:{id:id},
      url:"{{url('admin/show-order-product')}}",
      success:function(res){ 
        var i;
        var html='';
        var nrCrt=0;
        for(i=0;i<res.length;i++){
          nrCrt++;
          html+='<tr>'+
              '<td>'+nrCrt+'</td>'+
              '<td>'+res[i].product_name+'</td>'+
              '<td>'+res[i].qty+'</td>'+
              '<td>'+res[i].amount+'</td>'+
              +'</tr>';
        }
        // odata ce datele sunt primite, le afiseaza in tabel
        $('#showdata1').html(html);
      }
    })
 })

  $('#showdata').on('click','.btnDelete',function(){
    // accesare ID comanda pentru a sterge doar comanda dorita
    var id=$(this).attr('data');
    var conf=confirm('Ești sigur că vrei să ștergi această comandă?');
    if(conf){
      window.location.href="{{url('admin/deleteOrder')}}?id="+id;
    }
  })
})
</script>