@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<style type="text/css">
#total_votes
{
  font-size:30px;
  color:#FE2E2E;
  font-weight:bold;
}
 
.commentbox img{
  width: 30px;
}
 
input[type="submit"]
{
  border:none;
  background:none;
  background-color:#585858;
  width:100px;
  height:50px;
  color:white;
  border-radius:3px;
  font-size:17px;
  margin-top:20px;
} 

.checked {
  color: orange;
}
</style>

<?php
  // obtinere detalii produs din ID produs
  $qry=DB::Table('products as p')->select('*','p.id as pid')->join('categories as c','c.id','=','p.category_id')->where('p.id',$id)->first();
  $subcategory=DB::Table('subcategory')->where('category_id',$qry->category_id)->get();
?>
<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-3">
      <!--  afisare subcategorii  -->
      <div class="box  box-special category"> 
        <div class="box-heading"><h3>Subcategorii</h3></div>
        <div class="box-content"> 
          <div class="box-category">
            <div class="list-group">
              @foreach($subcategory as $c)
              <a href="{{url('products')}}/{{$qry->category_id}}/{{$c->id}}" class="list-group-item">{{$c->subcategory_name}}</a> 
              @endforeach                                                
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- afisare breadcrumb  -->
    <div class="col-lg-9">
      <ul class="breadcrumb"> 
        <li>
          <a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/</a>
        </li>
        <li>
          <a href="#">&nbsp;&nbsp;{{$qry->category_name}} &nbsp;&nbsp;/</a>
        </li> 
        <li class="last">
          <a href="#"> &nbsp;&nbsp;{{$qry->product_name}}</a><span class="lock-buton"></span>
        </li> 
      </ul>

      <div class="row">     
        <div class="col-sm-12">
          <div class="row mx-0 mb-5 pb-5">
            <div class="col-sm-6">
              <img src="{{asset('uploads')}}/{{$qry->product_image}}" width="100%"  style="border-radius: 10px;object-fit: contain;"  alt="Mergaitėms" class="img-responsive mt-2">
            </div>
            <div class="col-sm-6 mt-4 ">
              <h5>{{$qry->product_name}}</h5>
              <hr>
              <h5>Pret: {{$qry->price}} RON</h5>
              <hr>
              <p>Cantitate : &nbsp;&nbsp; 
                <input type="number" min=1 value="1" style="width: 150px" name="qty" width="50px" >
              </p>
              <!-- afisare rating   -->
              <?php  
                $rate=DB::select("select  FORMAT(avg(rating),1) as rate from rating where product_id='$id'")
              ?> 
              <span class="fa fa-star {{$rate[0]->rate>=1?'checked':''}}"></span>
              <span class="fa fa-star  {{$rate[0]->rate>=2?'checked':''}}"></span>
              <span class="fa fa-star  {{$rate[0]->rate>=3?'checked':''}}"></span>
              <span class="fa fa-star  {{$rate[0]->rate>=4?'checked':''}}"></span>
              <span class="fa fa-star  {{$rate[0]->rate>=5?'checked':''}}"></span>
              <hr>
              <!-- buton adauga in cos -->
              <div class="cart-button te r"> 
                <button class="btn btn-add" data="{{$qry->pid}}" type="button">
                  <span>Adauga in cos</span><i class="fa fa-shopping-cart"></i>
                </button>   
              </div>
            </div>
            <div class="col-12 pb-5 mb-5 mt-4">
              <!-- randam descrierea care este in format -->
              {!!$qry->description!!}
            </div>

            <div class="col-lg-12 border commentbox">
              <!--  auth pentru a vedea daca utilizatorul este logat  -->
              @Auth
              <h4 class="py-4">Adauga review</h4>
              <div class="div">
                <!-- selectare rating -->
                <input type="hidden" id="php1_hidden" value="1">
                <img src="{{asset('public/img/star1.png')}}"  onmouseover="change(this.id);" id="php1" class="php">
                <input type="hidden" id="php2_hidden" value="2">
                <img src="{{asset('public/img/star1.png')}}" onmouseover="change(this.id);" id="php2" class="php">
                <input type="hidden" id="php3_hidden" value="3">
                <img src="{{asset('public/img/star1.png')}}" onmouseover="change(this.id);" id="php3" class="php">
                <input type="hidden" id="php4_hidden" value="4">
                <img src="{{asset('public/img/star1.png')}}" onmouseover="change(this.id);" id="php4" class="php">
                <input type="hidden" id="php5_hidden" value="5">
                <img src="{{asset('public/img/star1.png')}}" onmouseover="change(this.id);" id="php5" class="php">
              </div>

              <input type="hidden" name="phprating" id="phprating" value="0">
              <!--  adaugare comentariu -->
                <div class="form-group">
                  <label>Adauga un comentariu</label>
                  <textarea rows="5" class="form-control" name="comment"></textarea>
                </div>
                <div class="form-group">
                  <button class="btn  " id="BtnSubmit" style="background: #545C5E;color: white;">Trimite</button>
                </div>
                @else
                <!-- daca utilizatorul nu este logat, afiseaza asta -->
                <h4 class="py-3">Trebuie sa fii logat pentru a putea lasa un review</h4>
                @endif
            </div>
          </div>

          <div class="row  border bg-white ">
            <div class="col-lg-12 pt-3">
              <h4>Parerile clientilor</h4>
              <hr>
            </div>
            <!-- afisare review-uri de la toti utilzatorii-->
            <?php 
              $rating=DB::select("select *  from rating join users as u on u.id=rating.user_id where product_id='$id' order by rating.id desc") 
            ?>
            @foreach($rating as $r)
              <div class="col-lg-8 ">
                <h5 class="mb-0">{{$r->name}}</h5>
                <p class="mb-0">{{$r->comment}}</p>
                <p class="text-secondary mb-0" style="font-size:12px">{{$r->created_at}}</p>
              </div>
              <div class="col-lg-4 ">
                <p class="float-right mb-0">
                  <span class="fa fa-star {{$r->rating>=1?'checked':''}}"></span>
                  <span class="fa fa-star  {{$r->rating>=2?'checked':''}}"></span>
                  <span class="fa fa-star  {{$r->rating>=3?'checked':''}}"></span>
                  <span class="fa fa-star  {{$r->rating>=4?'checked':''}}"></span>
                  <span class="fa fa-star  {{$r->rating>=5?'checked':''}}"></span>
                </p>     
              </div>

              <div class="col-lg-12">
                <hr>
              </div>
              @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="alert  text-center " style="position: fixed;top:0;width: 100%"></div>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function(){
    $('.btn-add').click(function(){
      // atunci cand utilizatorul apasa pe "adauga in cos" obtin ID-ul produsului si il trimit prin AJAX pentru a actualiza ruta cosului
      // astfel incat cosul sa fie actualizat
      var id=$(this).attr('data');
      $.ajax({
        type:'get',
        data:{'qty':$('input[name=qty]').val(),id:id},
        url:'{{url('update-cart')}}',
          success:function(res){
            if(res=='error'){
            // daca produsul nu este in stoc afiseaza eroare
            $('.alert').removeClass('alert-success').addClass('alert-danger').html('Produsul selectat nu se afla in stoc').fadeIn().delay(4000).fadeOut('slow');
            }
            else{
            // daca produsul este adaugat in cos cu succes afiseaza mesaj succes
            $('.alert').removeClass('alert-danger').addClass('alert-success').html('Produsul a fost adaugat cu succes! <a href="{{url('cart')}}">Apasa pentru a merge la cos.</a>').fadeIn().delay(4000).fadeOut('slow');
            }
          }
      })
    })

    $('#BtnSubmit').click(function(){
      // functie pentru atunci cand utilizatorul lasa un review produsului 
      // THIS WE GETTING HIDDEN RATING FROM INPUT FIELD
      var rating=$('input[name=phprating]').val();
      // obtinere comentariu 
      var comment=$('textarea[name=comment]').val();
      var result='';
      // daca comentariul nu are niciun caracter, afiseaza eroare
      if(comment==''){
      $('textarea[name=comment]').addClass('is-invalid');
      }
      else {
      // daca nu este gol, elimin eroarea 
      $('textarea[name=comment]').removeClass('is-invalid');
      result+='1';
      }

      if(rating=='0'){
      // daca utilizatorul nu lasa rating, primeste alerta
      alert('Nu ai lasat o recenzie!')
      }
      else{
      result+='1';
      }
      // daca ambele conditii au fost indeplinite - rating + comentariu
      // datele inserate vor fi trimise in baza de date 
      if(result=='11'){
        $.ajax({
          type:'get',
          'data':{comment:comment,rating:rating,product_id:"{{$id}}"},
          url:"{{url('insert-rating')}}",
          async:false,
          success:function(res){
            if(res=='error'){
              alert('Ai postat deja un review pentru acest produs!')
            }
            else{     
              alert('Ai postat un review cu succes!')
              window.location.reload()
            }
          }
        })
      }
    })
  })
</script>

<script type="text/javascript">
  function change(id){
    // functie pentru atunci cand dam hover sau apasam pe o stea
    var cname=document.getElementById(id).className;
    var ab=document.getElementById(id+"_hidden").value;
    document.getElementById(cname+"rating").value=ab;
    // afisare stele galbene
    for(var i=ab;i>=1;i--){
      document.getElementById(cname+i).src="{{asset('public/img/star2.png')}}";
    }
    var id=parseInt(ab)+1;
    // afisare stele albe
    for(var j=id;j<=5;j++){
      document.getElementById(cname+j).src="{{asset('public/img/star1.png')}}";
    }
  }
</script>
  
@endsection('content')