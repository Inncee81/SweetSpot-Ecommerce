@extends('layouts.header')
@extends('layouts.footer')

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
 
.checked {
  color: orange;
}
</style>

@section('content')
<?php
 // afisare categorii si subcategorii 
  $cat=DB::table('categories')->where('id',$id)->first();
  $subcat=DB::table('subcategory')->where('id',$subcategory)->first();
  // afisare filtre
  if(isset($_GET['filter'])){
    $filter=$_GET['filter'];
    // filtre pentru fiecare subcategorie 
    if($subcategory!=''){
      if($filter=='latest'){
        // cele mai noi produse
        $qry=DB::table('products')->orderBy('id','desc')->where('subcategory_id',$subcategory)->paginate($_GET['limit']);
      }
      else if($filter=='price_low'){
        // afisare dupa pret (de la mic la mare)
        $qry=DB::table('products')->orderBy('price','asc')->where('subcategory_id',$subcategory)->paginate($_GET['limit']);
      }
      else if($filter=='price_high'){
        // afisare dupa pret (de la mare la mic)
        $qry=DB::table('products')->orderBy('price','desc')->where('subcategory_id',$subcategory)->paginate($_GET['limit']);
      }
      else {
      // afisarea standard
      $qry=DB::table('products')->where('subcategory_id',$subcategory)->paginate($_GET['limit']);
      }
    }
    else{
      // filtre pentru intreaga categorie
      if($filter=='latest'){
        // cele mai noi produse
        $qry=DB::table('products')->orderBy('id','desc')->where('category_id',$id)->paginate($_GET['limit']);
      }
      else if($filter=='price_low'){
        // afisare dupa pret (de la mic la mare)
        $qry=DB::table('products')->orderBy('price','asc')->where('category_id',$id)->paginate($_GET['limit']);
      }
      else if($filter=='price_high'){
        // afisare dupa pret (de la mare la mic)
        $qry=DB::table('products')->orderBy('price','desc')->where('category_id',$id)->paginate($_GET['limit']);
      }
      else {
        // afisarea standard
        $qry=DB::table('products')->where('category_id',$id)->paginate($_GET['limit']);
      }
    }
  }
  else{
    // daca nu este niciun filtru activat
    if($subcategory!=''){
      $qry=DB::table('products')->where('subcategory_id',$subcategory)->paginate(10);
    }
    else{
      $qry=DB::table('products')->where('category_id',$id)->paginate(10);
    }
  }

  $subcategory=DB::Table('subcategory')->where('category_id',$id)->get();
?>

<style type="text/css">
.page-item.active .page-link {
  background-color: #545c5e;
  border-color: #545c5e;
}
.page-link:hover {
  background-color: #e9ecef;
  border-color: #dee2e6;
}
.page-link {
  color: #545c5e;
}
</style>

<div class="container mt-4 pb-4">
  <div class="row">
    <div class="col-lg-3">
      <!-- afisare toate subcategoriile     -->
      <div class="box box-special  category"> 
        <div class="box-heading"><h3>Subcategorii</h3></div>
          <div class="box-content"> 
            <div class="box-category">
              <div class="list-group">
                @foreach($subcategory as $c)
                <a href="{{url('products')}}/{{$id}}/{{$c->id}}" class="list-group-item">{{$c->subcategory_name}}</a> 
                @endforeach                                             
              </div>
            </div>
          </div>
      </div>
    </div>
        
    <div class="col-lg-9"> 
     <!-- afisarea breadcrumb     -->
      <ul class="breadcrumb"> 
        <li>
          <a href="{{url('/')}}">Pagina principala &nbsp;&nbsp;/</a>
        </li>
        <li>
          <a href="{{url('products')}}/{{$id}}">&nbsp;&nbsp;{{$cat->category_name}}   &nbsp;&nbsp;/</a>
        </li> 
        <li class="last">
          <a href=""> &nbsp;&nbsp;{{@$subcat->subcategory_name}}</a><span class="lock-buton"></span>
        </li> </ul>
        <div class="row">       
          <div class="col-sm-12">
            <div class="row mx-0">
              <!-- afisare nume categorie     -->
              <h3>{{$cat->category_name}}</h3>
            </div>
            <form id="form-1" action="">
              <div class="row mt-4 mx-0 py-3" style="border-top: 1px solid lightgrey;border-bottom: 1px solid lightgrey">
                <div class="col-2">
                  <h6>Sorteaza dupa</h6>
                </div>
           
                <!-- filtre dropdowns    -->
                <div class="col-3">
                  <select class="form-control" onchange="document.getElementById('form-1').submit()" name="filter">
                    <option value="standard" {{@$_GET['filter']=='standard'?'selected':''}}>Standard</option>
                    <option value="latest" {{@$_GET['filter']=='latest'?'selected':''}}>Cele mai noi</option>
                    <option value="price_high" {{@$_GET['filter']=='price_high'?'selected':''}}>Pret (mare spre mic)</option>
                    <option value="price_low" {{@$_GET['filter']=='price_low'?'selected':''}}>Pret (mic spre mare))</option>
                  </select>
                </div>

                <div class="col-2">
                  <h6>Arata</h6>
                </div>

                <div class="col-2">
                  <select   name="limit" onchange="document.getElementById('form-1').submit()" class="form-control">
                    <option value="10" {{@$_GET['limit']=='50'?'selected':''}}>10</option>
                    <option value="50" {{@$_GET['limit']=='50'?'selected':''}}>50</option>
                    <option value="75" {{@$_GET['limit']=='75'?'selected':''}}>75</option>
                    <option value="100" {{@$_GET['limit']=='100'?'selected':''}}>100</option>
                  </select>
                </div>
              </div>
            </form>

            <div class="row mx-0">
              <div class="col-lg-12 px-0">
                <div class="card mx-0 py-4 px-2  mt-3" style="border-radius: 30px;">
                  <div class="row mx-0" id="showdata">
                    <!-- afisarea tuturor produselor printr-un foreach loop     -->
                    @if(sizeof($qry)>0)
                    @foreach($qry as $q)
                    <div class="col-lg-4  mb-3">
                      <div class="card productdiv px-3 py-2">
                        <a href="{{url('product-detail')}}/{{$q->id}}">
                        <!-- afisare imagine produs     -->
                          <img src="{{asset('uploads')}}/{{$q->product_image}}" width="100%"  style="border-radius: 10px" height="170px" alt=" " class="img-responsive mt-2">
                        </a>
                        <!-- obtinere rating pentru produse     -->
                        <?php  
                          $product_id=$q->id;
                          $rate=DB::select("select FORMAT(avg(rating),1) as rate from rating where product_id='$product_id'")?>      
                          <!-- afisare pret produs     -->
                          <h5 class="price mt-2">{{$q->price}} RON</h5>
                          <!-- afisare ratings     -->
                          <p style="display:inline-flex;">
                            <span class="fa fa-star {{$rate[0]->rate>=1?'checked':''}}"></span>
                            <span class="fa fa-star  {{$rate[0]->rate>=2?'checked':''}}"></span>
                            <span class="fa fa-star  {{$rate[0]->rate>=3?'checked':''}}"></span>
                            <span class="fa fa-star  {{$rate[0]->rate>=4?'checked':''}}"></span>
                            <span class="fa fa-star  {{$rate[0]->rate>=5?'checked':''}}"></span>
                          </p>
                          <h6>{{$q->product_name}}</h6>
                          
                          <div class="cart-button text-center"> 
                            <button  class="btn btn-add " data="{{$q->id}}"  type="button" ><span>Adauga in cos</span><i class="fa fa-shopping-cart"></i></button>   
                          </div>
                      </div>
                    </div>
                    @endforeach
                    @else
                      Niciun produs.
                    @endif
                  </div>

                  <div class="col-lg-12 text-center" >
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
    // functie pentru atunci cand apesi pe butonul "adauga in cos"
    $('#showdata').on('click','.btn-add',function(){
      // AJAX trimite controller-ului si mareste cantitatea in cos 
      var id=$(this).attr('data');
      $.ajax({
        type:'get',
        data:{'qty':1,id:id},
        url:'{{url('update-cart')}}',
        success:function(res){
          if(res=='error'){
            $('.alert').removeClass('alert-success').addClass('alert-danger').html('Produsul nu este in stoc!').fadeIn().delay(4000).fadeOut('slow');
          }
          else{
            $('.alert').removeClass('alert-danger').addClass('alert-success').html('Produsul a fost adaugat in cos! <a href="{{url('cart')}}">Click pentru a vedea cosul</a>').fadeIn().delay(4000).fadeOut('slow');
          }
        }
      })
    })
  })
</script>
@endsection('content')
