<style type="text/css">
td,th{
	padding: 10px;
}
</style>

<?php
  $qry=DB::table('cart as c')->select('p.product_name','p.price','c.qty','c.id','c.price as cart_price','p.product_image','p.qty as product_qty')->join('products as p','p.id','=','c.product_id')->where('c.user_id',Auth::id())->get();
  $order_no=DB::table('orders')->orderBy('id','desc')->first();
?>

<body > 
<div style="width: 100%;text-align: center">
  <h4 style="margin-bottom: 0px;line-height: 0.3"><b>Factura comanda</b></h4>
  <p  style="margin-bottom: 0px;line-height: 0">{{date('Y-m-d')}}</p>
  <p>Nr. Comanda: {{$order_no->id+1}}</p>
</div> 

<div style="width: 50%;float: left">
  <h4 style="text-align: center"><b>SweetSpot Informatii</b></h4>
  <p>
    <b>Bank Name : </b>  ING Bank<br>
    <b>IBAN: </b> ING51RO0752411<br>
    <b>Cod Postal: </b> 800550<br>
    <b>Email : </b> SweetSpot@gmail.com<br>
    <b>Numar Telefon : </b> +40 752 897 527<br>
  </p>
</div>

<div style="width: 50%;float: left">
  <h4 style="text-align: center"><b>Informatii client</b></h4>
  <p>
    <b>Nume: </b>{{Auth::user()->name}}<br>
    <b>Adresa: </b> {{Auth::user()->address}}<br>
    <b>Oras: </b> {{Auth::user()->city}}<br>
    <b>Cod Postal: </b> {{Auth::user()->zip_code}}<br>
    <b>Numar Telefon: </b> {{Auth::user()->phone_number}}<br>
    <b>Tara: </b> {{Auth::user()->country}}<br>
    <b>Email: </b> {{Auth::user()->email}}<br>
  </p>
</div>

<div style="width: 100%; display: block;margin-top: 250px">
  <table width="100%" style=" border-collapse: collapse;" border="1" >
    <thead>
      <tr>
        <th>#</th>
        <th>Nume Produs</th>
        <th>Cantitate</th>
        <th>Pret/unitate</th>
        <th>Pret Total</th>
      </tr>
    </thead>

    <tbody id="showdata">
      <?php 
        $total=0;
        $result=0;
        $sno=1;
      ?>
      @foreach($qry as $q)
      <?php 
        $total+=$q->cart_price; 
        $bal=$q->product_qty-$q->qty; 
      ?>

      <tr>
        <td>{{$sno++}}</td>
        <td>{{$q->product_name}}
          @if($bal>=0)
          @else
          <?php 
            $result=1;
          ?>
          <div class="badge badge-danger">Only {{$q->product_qty}} Qty Is Available</div>
          @endif
        </td>
        <td>{{$q->qty}}</td>
        <td>{{$q->price}}RON</td>
        <td>{{$q->cart_price}} RON</td>
      </tr>
      @endforeach
    </tbody>

    <tfoot>
      <tr>
        <td colspan=4 style="text-align: right;"><b>TVA (19%) : </b></td>
        <td><b>{{($total/100)*19}}  RON </b></td>
      </tr>
      <tr>
        <td colspan=4 style="text-align: right;"><b>Transport : </b></td>
        <td ><b>15 RON </b></td> 
      </tr>
      <tr>
        <td  colspan=4 style="text-align: right;"><b>Total : </b></td>
        <td   ><b>{{$total+15+($total/100)*19}} RON </b></td>
      </tr>  
    </tfoot>
  </table>
</div>




 