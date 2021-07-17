@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<?php
  $qry=DB::Table('orders as o')->select('*','o.id as nrCrt','o.created_at as date_of_order')->join('users as u','u.id','=','o.user_id')->where('o.user_id',Auth::id())->orderBy('o.id','desc')->Get();
?>

<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-3">
      <div class="box category"> 
        <div class="box-heading">
          <h3>Contul meu</h3>
        </div>
        <div class="box-content"> 
          <div class="box-category">
            <div class="list-group">
              <a href="{{url('my-account')}}" class="list-group-item">Contul meu</a> 
              <a href="{{url('change-password')}}" class="list-group-item">Schimba parola</a>                                     
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="alert d-none" ></div>

      <div class="card">
        <div class="card-header  text-white" style="background: #545C5E;"> 
          <h3 class="text-white">Contul meu</h3>
        </div>
        <div class="card-body ">
          <div class="table-responsive">
            <table class="table table-bordered" id="example2">
              <thead>
                <tr>
                  <th style="width: 10px">Nr.</th>
                  <th>Nume</th>
                  <th>Total</th>
                  <th>Oras</th>
                  <th>Adresa</th>
                  <th>Status</th>
                  <th>Data comenzii</th>
                  <th>Mai multe</th>
                </tr>
              </thead>

              <tbody id="showdata">
                @foreach($qry as $q)
                <tr>
                  <td>{{$q->nrCrt}}</td>
                  <td>{{$q->name}}</td>
                  <td>{{$q->total_amount+15+($q->total_amount/100*19)}}</td>
                  <td>{{$q->city}}</td>
                  <td>{{$q->address}}</td>
                  <td>
                    @if($q->order_status=='Waiting')
                    <div class="badge badge-danger"> {{$q->order_status}}</div>
                    @else
                    <div class="badge badge-success"> {{$q->order_status}}</div>
                    @endif
                  </td>
                  <td>{{$q->date_of_order}}</td>
                  <td>
                    <a href="javascript:;"  data="{{$q->nrCrt}}" class="text-success btnEdit"><i class="fa fa-eye"></i></a>
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


<div class="modal " id="EditModal">
  <div class="modal-dialog modal-fade modal-lg">
    <div class="modal-content">
      <input type="hidden" name="hidden_img">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Contul meu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <table class=" table " id="example2"> 
              <thead>
                <th>Nr.</th>
                <th>Nume produs</th>
                <th>Cantitate</th>
                <th>Pret</th>
              </thead>
              <tbody id="showdata1"></tbody>
            </table>
          </div>
        </div>
      </div>
   
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Inchide</button>
      </div>

    </div>
  </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" defer="">
$(function(){
  @if(Session::has('success'))
  $('.alert').addClass('alert-success').removeClass('d-none').html('Comanda efectuata cu succes.');
  @endif
  $('#showdata').on('click','.btnEdit',function(){
    var id=$(this).attr('data');
    $('#EditModal').modal('show');
    $.ajax({
      type:'get',
      data:{id:id},
      url:"{{url('show-order-product')}}",
      dataType:'json',
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
        $('#showdata1').html(html);
      }
    })
  })
})
</script>
 
@endsection('content')

