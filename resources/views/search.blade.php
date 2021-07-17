<!--   HERE WE ARE INCLUDING HEeadeR ,FOOTER -->

@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<?php
  // HERE WE ARE GETTING  PRODUCTS BY LIKE QUERY  OF GETTING SEARCH VALUE 
  $qry=DB::table('products')->where('product_name','like','%'.$_GET['search'].'%')->paginate(50);
  // obtinere categorii pentru sidebar
  $category=DB::Table('categories')->where('type','product')->get();
?>
<style type="text/css">
.page-item.active .page-link {
  background-color: #d459a0;
  border-color: #d459a0;
}

.page-link:hover {
  background-color: #e9ecef;
  border-color: #dee2e6;
}

.page-link {
  color: #d459a0;
}
</style>

<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-3">
      <!-- afisare categorii in sidebar -->
      <div class="box  box-special category"> 
        <div class="box-heading"><h3>Categorie</h3></div>
        <div class="box-content"> 
          <div class="box-category">
            <div class="list-group">
              @foreach($category as $c)
              <a href="{{url('products')}}/{{$c->id}}" class="list-group-item">{{$c->category_name}}</a> 
              @endforeach                                             
            </div>
          </div>
        </div>
      </div>                    
    </div>

    <div class="col-lg-9">
      <ul class="breadcrumb"> 
        <li>
          <a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/  </a>
        </li>
        <li class="last"><a href=""> &nbsp;&nbsp;Rezultatele cautarii</a>
          <span class="lock-buton"></span>
        </li> 
      </ul>

      <div class="row">   
        <div class="col-sm-12">
          <div class="row mx-0">
            <h3>Rezultatele cautarii</h3>
          </div>

          <div class="row mx-0">
            <div class="col-lg-12 px-0">
              <div class="card mx-0 py-4 px-2  mt-3" style="border-radius: 30px;">
                <div class="row mx-0" id="showdata">
                  @if(sizeof($qry)>0)
                  @foreach($qry as $q)
                  <div class="col-lg-4  mb-3">
                    <div class="card productdiv px-3 py-2">
                      <a href="{{url('product-detail')}}/{{$q->id}}">
                        <img src="{{asset('uploads')}}/{{$q->product_image}}" width="100%"  style="border-radius: 10px" height="150px" alt=" " class="img-responsive mt-2">
                      </a>
                      <h5 class="price mt-2">{{$q->price}} RON</h5>
                      <h6>{{$q->product_name}}</h6>
                      <!-- buton adauga in cos  -->
                      <div class="cart-button text-center"> 
                        <button  class="btn btn-add " data="{{$q->id}}"  type="button" ><span>Adauga in cos</span><i class="fa fa-shopping-cart"></i></button>   
                      </div>
                    </div>
                  </div>
                  @endforeach
                  @else
                  Niciun produs gasit
                  @endif
                </div>

                <div div class="col-lg-12 text-center" >
                  {{$qry->links()}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div  class="alert  text-center " style="position: fixed;top:0;width: 100%"></div>



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function(){
    // functie pentru butonul "adauga in cos"
    $('#showdata').on('click','.btn-add',function(){
      var id=$(this).attr('data');
      // ajax trimite controllerului si se actualizeaza cosul
      $.ajax({
        type:'get',
        data:{'qty':1,id:id},
        url:'{{url('update-cart')}}',
        success:function(res){
        $('.alert').addClass('alert-success').html('Produsul a fost adaugat in cos! <a href="{{url('cart')}}">Click pentru a vedea cosul!</a>').fadeIn().delay(4000).fadeOut('slow');
         }
      })
    })
  })
</script>
@endsection('content')
