@extends('layouts.header')
@extends('layouts.footer')
@section('content')

<?php
  if(Auth::id()!=''){
  // cos de cumparaturi daca utilizatorul este logat 
    $qry=DB::table('cart as c')->select('p.product_name','p.price','c.qty','c.id','c.price as cart_price','p.product_image','p.id as product_id')->join('products as p','p.id','=','c.product_id')->where('c.user_id',Auth::id())->get();
  }
  else{
  // cos de cumparaturi pentru vizitator care nu este logat
  $qry=DB::table('temp_cart as c')->select('p.product_name','p.price','c.qty','c.id','c.price as cart_price','p.product_image','p.id as product_id')->join('products as p','p.id','=','c.product_id')->where('ip_address',Request::ip())->get();
  }
?>

<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-12">
      <ul class="breadcrumb"> 
        <li>
          <a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/  </a>
        </li>

        <li class="last">
          <a href=""> &nbsp;&nbsp;Cos de cumparaturi</a><span class="lock-buton"></span>
        </li> 
      </ul>

      <h2>Cos de cumparaturi</h2>
      <div class="table-responsive">
        <table class="table table-light mt-4 table-bordered "  >
          <thead>
            <th>Poza</th>
            <th>Nume</th>
            <th>Cantitate</th>
            <th>Pret/unitate</th>
            <th>Total</th>
            <th>Sterge</th>
          </thead>
          <tbody id="showdata">
            <?php 
              $total=0;
            ?>
              <!-- afisare cos de cumparaturi -->
              @foreach($qry as $q)
            <?php 
              $total+=$q->cart_price; 
            ?>
            <tr>
              <td><img src="{{asset('uploads')}}/{{$q->product_image}}" width="80px" height="70px"></td>
              <td>{{$q->product_name}}</td>
              <td>
                <input type="number" data="{{$q->id}}" data1="{{$q->price}}"  data2="{{$q->product_id}}" class="form-control qty" style="width:100px;" name="qty[]" value="{{$q->qty}}">
              </td>
              <td>{{$q->price}} </td>
              <td>{{$q->cart_price}}  </td>
              <td><button data="{{$q->id}}" class="btn btn-danger btnDelete">X</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
      <!-- afisare subtotal / tva / costuri transport / total  -->
      <table class="bg-white table table-bordered">
        <tr>
          <td class="text-right" style="color: #359dc9"><b>Subtotal</b></td>
          <td class="text-right">{{$total}} RON</td>
        </tr>
        <tr>
          <td  class="text-right" style="color: #359dc9"><b>TVA (19%)</b></td>
          <td  class="text-right">{{($total/100)*19}} RON</td>
        </tr>
        <tr>
          <td  class="text-right" style="color: #359dc9"><b>Costuri de transport</b></td>
          <td  class="text-right">15 RON</td>
        </tr>
        <tr>
          <td  class="text-right" style="color: #359dc9"><b>Total</b></td>
          <td  class="text-right">{{$total+15+($total/100)*19}} RON</td>
        </tr>
      </table>
    </div>
    <div class="col-6 mb-5 mt-5">
      <a  class="btn-outline" href="{{url('/')}}">Continua cumparaturile</a>
    </div>
    <div class="col-6 text-right mb-5 mt-5">
      <a  class="btn-outline " href="{{url('/checkout')}}">Finalizeaza comanda</a>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">

$(function(){
  // daca utilizatorul schimba cantitate, atunci se actualizeaza in baza de date
  $('#showdata').on('focusout','.qty',function(){
  // obtinere date de variabila precum - cantitatea actuala, cart ID, pretul
  var this1=$(this);
	var qty=$(this).val();
	var id=$(this).attr('data');
	var price=$(this).attr('data1');
  // trimitere cantitate si celelalte variabile pentru a controla cantitate in baza de date
	$.ajax({
		type:'get',
		data:{qty:qty,id:id,price:price,product_id:$(this).attr('data2')},
		url:"{{url('increase-qty')}}",
      success:function(res){
        if(res.response=='error'){
          if(res.qty==0){
            // daca stocul este 0, va afisa asta
            alert('Produsul nu este in stoc');
          }
          else{
            // daca nu este suficient stoc, va afisa asta
            alert('Doar '+res.qty+' cantitati sunt pe stoc pentru acest produs.');
          
          }
        this1.val(res.qty);
        window.location.reload();
        }
        else{			
          window.location.reload();
        }
      }
	  })
  })

  $('#showdata').on('click','.btnDelete',function(){
    // trimitere cart ID pentru a sterge un anumit produs
    var id=$(this).attr('data');
    var conf=confirm('Esti sigur ca vrei sa stergi acest produs?');
    if(conf){
      window.location.href="{{url('deleteCart')}}?id="+id;
    }
  })
})
</script>

@endsection('content')
