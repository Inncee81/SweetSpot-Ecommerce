@extends('layouts.header')
@extends('layouts.footer')
@section('content')

<?php
  // obtinere cos cumparaturi daca utilizatorul este logat
  $qry=DB::table('cart as c')->select('p.product_name','p.price','c.qty','c.id','c.price as cart_price','p.product_image','p.qty as product_qty')->join('products as p','p.id','=','c.product_id')->where('c.user_id',Auth::id())->get();
?>

<style type="text/css">
  @media print{
    .header, footer, .breadcrumb, button, .btn-outline{
      display: none;
    }
    .invoicerow{
      display: block!important;
    }
  }
</style>
<div class="container mt-4 pb-4">
  <div class="row invoicerow">
    <div class="col-lg-12">
      <ul class="breadcrumb"> 
        <li>
          <a href="{{url('/')}}">Pagina principală  &nbsp;&nbsp;/  </a>
        </li>

        <li class="last">
          <a href=""> &nbsp;&nbsp;Verifica comanda </a><span class="lock-buton"></span>
        </li> 
      </ul>

      <h2>Verifica comanda</h2>
      <div class="table-responsive">
        <table class="table table-light mt-4 table-bordered "  >
          <thead>
            <th>Poza</th>
            <th>Nume</th>
            <th>Cantitate</th>
            <th>Pret/unitate</th>
            <th>Total</th>     
          </thead>
          <!-- afisare cos cumparaturi -->
          <tbody id="showdata">
            <?php 
              $total=0;$result=0;
            ?>
            @foreach($qry as $q)
            <?php 
              $total+=$q->cart_price; $bal=$q->product_qty-$q->qty; 
            ?>
            <tr>
              <td><img src="{{asset('uploads')}}/{{$q->product_image}}" width="70px" height="70px"></td>
              <td>
                {{$q->product_name}}
                @if($bal>=0)
                @else
                <?php 
                  $result = 1;
                ?>
                <div class="badge badge-danger">Doar {{$q->product_qty}} bucati sunt valabile pe stoc.</div>
                @endif
              </td>
              <td>{{$q->qty}}</td>
              <td>{{$q->price}} </td>
              <td>{{$q->cart_price}}  </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-sm-8" style="float: left;">
      <table class="bg-white table table-bordered">
        <tr>
          <td class="text-left" style="color: #359dc9;"><b>Numele tau</b></td>
          <td class="text-right">{{Auth::user()->name}}</td>
        </tr>
        <tr>
          <td  class="text-left" style="color: #359dc9"><b>Adresa ta </b></td>
          <td  class="text-right">{{Auth::user()->address}}</td>
        </tr>
        <tr>
          <td  class="text-left" style="color: #359dc9"><b>Oras</b></td>
          <td  class="text-right">{{Auth::user()->city}}</td>
        </tr>  
      </table>
    </div>

    <div class="col-sm-4" style="float: left;">
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
          <td  class="text-right" style="color: #359dc9"><b>Transport</b></td>
          <td  class="text-right">15 RON</td>
        </tr>
        <tr>
          <td  class="text-right" style="color: #359dc9"><b>Total</b></td>
          <td  class="text-right">{{$total+15+($total/100)*19}} RON</td>
        </tr>
      </table>

      <div class="bg-white  p-3">
        <h6>Detalii cont bancar</h6>
        <p>Account Number: ING95RO39205029</p>
        <p>Bank: ING Bank</p>
        <p>Country : Romania</p>
      </div>
    </div>

    <div class="col-6 mb-5 mt-5">
      <a  class="btn-outline" href="{{url('/cart')}}">Inapoi la cos</a>
    </div>

    <div class="col-6 text-right mb-5 mt-5">
      @if($result==0)
      <a href="{{url('completeOrder')}}" class="btn-outline btnComplete">Finalizeaza comanda</a>
      @else
      <div class="alert alert-danger">Unele produse din cos nu se afla in stocul magazinului!</div>
      @endif
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
 
@endsection('content')