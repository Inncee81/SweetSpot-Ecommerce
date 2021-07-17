@extends('layouts.header')
@extends('layouts.footer')
@section('content')

<style type="text/css">
    
.card.card-carousel {
    border: 0;
  
    color: rgba(0,0,0,.87);
    background: #fff;
    width: 100%;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
}

.carousel-indicators {
    position: absolute;
    right: 0;
    bottom: 10px;
    left: 0;
    z-index: 15;
    display: flex;
    justify-content: center;
    padding-left: 0;
    margin-right: 15%;
    margin-left: 15%;
    list-style: none;
}

.carousel .carousel-indicators {
    bottom: 5px;
}

.carousel .carousel-indicators li {
    display: inline-block;
    width: 10px;
    height: 10px;
    text-indent: -999px;
    cursor: pointer;
    border: 1px solid #fff;
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.12), 0 1px 5px 0 rgba(0,0,0,.2);
    border-radius: 2px;
}

.carousel .carousel-indicators .active{
    margin: 11px 10px; 
} 

.carousel .carousel-indicators li {
    margin: 11px 10px;
}

.carousel .carousel-indicators .active {
    margin-top: 10px;
    transform: scale(1.5);
    box-shadow: 0 4px 5px 0 rgba(0,0,0,.14), 0 1px 10px 0 rgba(0,0,0,.12), 0 2px 4px -1px rgba(0,0,0,.2);
}

.banners a {
    vertical-align: top;
    display: block;
}
.banners .mainspan {
    display: block;
    background:black;
    background-color: #359dc9;
}
 
@media (min-width: 768px){
    #back-top a, #cart>button:hover, #search button, 
    .banners .s-desc, .banners a>span, .box-category .menu li a, 
    .btn.btn-add i, .btn.btn-add span, .btn:hover, .camera_pag_ul li, 
    .copyright a, .dropdown-menu a, .dropdown-menu button, 
    .list-inline>li a>i, .list-inline>li a>span, .soc-icon li a:hover i, 
    a.quickview, footer li a, header .box-currency .dropdown-toggle:hover, 
    header .box-language .dropdown-toggle:hover, 
    header .box-right>span a {
        -webkit-transition: all .4s ease;
        -moz-transition: all .4s ease;
        transition: all .4s ease;
    }
}

.banners .s-desc {
    display: inline-block;
    width: 100%;
    font-size: 21px;
    line-height: 30px;
    color: #fff;
    background-color: #359dc9;
    font-weight: 700;
    letter-spacing: -.5px;
    padding-bottom: 25px;
    text-align: center;
    padding-top: 20px; 
}

.banners img {
    display: inline-block;
    width: 100%;
    vertical-align: top;
}

.banner-box:hover +.banner-box .s-desc{
    padding-bottom: 40px!important;
}

.banners a:hover>span {
    padding-bottom: 27px;
    margin-bottom: 0;
    }
</style>

<?php
    // obtinere categorie din baza de date
    $category=DB::Table('categories')->where('type','product')->get();
?>

<div class="container mt-4 pb-4">
    <div class="row">
        <?php
            // obtinere imagini slide din baza de date
            $slide=DB::table('slides')->get();
            $slidecount=0;
            $count=0;
        ?>       
    </div>
</div>

<div class="container-fluid mt-n5">
    <div class="row">
        <div class="col-md-12 px-0 ">
            <!-- Carousel Card -->
            <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($slide as $s)
                    <!-- afisare imagini slide intr-un loop -->
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}" class="<?php echo  $count==0?'active':''?>"></li>
                    <?php 
                        $count++; 
                    ?>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($slide as $s)
                    <div class="carousel-item  <?php echo $slidecount==0?'active':''?>">
                        <img class="d-block w-100 " style="height: 80vh;object-fit: cover"  src="{{asset('uploads')}}/{{$s->image}}" alt="First slide">
                    </div>
                    <?php 
                        $slidecount++; 
                    ?>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 banners">
        @foreach($category as $c)
        <!-- afisare categorii -->
        <div class="col-lg-6 mb-4">
            <div class="banner-box"> 
                <a class="clearfix" href="{{url('products')}}/{{$c->id}}"> 
                    <span class="mainspan"> 
                        <img src="{{asset('uploads')}}/{{$c->category_image}}" alt="Categorii" class="img-responsive"> 
                        <span class="s-desc">{{$c->category_name}}</span> 
                    </span> 
                </a> 
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection('content')