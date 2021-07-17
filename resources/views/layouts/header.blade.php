<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="{{asset('public/img/logo.png')}}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@400;500;700;900&display=swap" rel="stylesheet">  <title>SweetSpot</title>

<!-- WHOLE CSSS -->
<style type="text/css">
@font-face {
    font-family: 'Cantarell Regular';
    font-style: normal;
    font-weight: normal;
    src: local('Cantarell Regular'), url('{{asset('public/fonts/Cantarell-Regular.woff')}}') format('woff');
}

@font-face {
    font-family: 'Cantarell Oblique';
    font-style: normal;
    font-weight: normal;
    src: local('Cantarell Oblique'), url('{{asset('public/fonts/Cantarell-Oblique.woff')}}') format('woff');
}

@font-face {
    font-family: 'Cantarell Bold';
    font-style: normal;
    font-weight: normal;
    src: local('Cantarell Bold'), url('{{asset('public/fonts/Cantarell-Bold.woff')}}') format('woff');
}

@font-face {
    font-family: 'Cantarell Bold Oblique';
    font-style: normal;
    font-weight: normal;
    src: local('Cantarell Bold Oblique'), url('{{asset('public/fonts/Cantarell-BoldOblique.woff')}}') format('woff');
}

p,h1,span,h2,h3,h4,h5,h6{
    color: #545C5E;
}

*{
    font-family: 'Cantarell Bold';
}

@media only screen and (max-width: 1000px){
    .carousel img{
        height: 300px;
    }
    .box-special{
        width: 73%;
        margin: 0 auto;
    }
    .productdiv{
        width: 60%;
        margin:0 auto;
    }
    .banners .col-lg-4{
        width: 68%;
        margin:0 auto;
    }
}

.header {
    font-size: 17px;
    line-height: 20px;
}

.header:after {
    position: absolute;
    content: '';
    top: 0;
    left: 0;
    width: 100%;
    height: 10px;
    transform: rotate(180deg);
}

.header span {
    font-size: 18px;
}

#search input {
    float: left;
    background: #eaf5f8;
    border: 1px solid #cde0e5;
    font-size: 15px;
    line-height: 19px;
    height: 41px;
    padding: 10px 5px 10px 15px;
    width: 240px;
    border-radius: 14px 0 0 14px;
    -moz-border-radius: 14px 0 0 14px;
    -webkit-border-radius: 14px 0 0 14px;
}

button, input, label, select, textarea {
    font-size: 16px;
    color: #359dc9;
}

#search button {
    float: left;
    background: 0 0;
    border: 1px solid #cde0e5;
    padding: 0 10px 0 9px;
    color: #359dc9;
    font-size: 13px;
    margin-left: -1px;
    line-height: 39px;
    height: 41px;
    border-radius: 0 14px 14px 0;
    -moz-border-radius: 0 14px 14px 0;
    -webkit-border-radius: 0 14px 14px 0;
}

#search button i {
    vertical-align: top;
    font-size: 17px;
    line-height: 37px;
}

.container{
    max-width: 1200px
}

.header .fa-facebook-square {
    color: #359dc9;
    font-size: 31px;
    vertical-align: top;
}

.nav ul{
    list-style: none;
    display:inline-flex;
}

.navitem{
    color: #545C5E;
}

.navlink{
    padding: 3px 20px;
}

.nav1{
    border-right: 1px solid
}

#cart-total {
    color: #ff6f42;
    font-size: 17px;
    margin-right: 10px
}
#cart-total-mb {
    font-size: 17px;
    display: inline-block;
    width: 38px;
    font-size: 17px;
    line-height: 38px;
    margin-top: 5px;
    margin-left: 5px;
    text-align: center;
    color: #359dc9;
    background: #eaf5f8;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
}

#cart-total2 {
    display: inline-block;
    width: 38px;
    font-size: 17px;
    line-height: 38px;
    margin-left: 4px;
    text-align: center;
    color: #359dc9;
    background: #eaf5f8;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
}
.navitem i{
    font-size: 18px
}

.box, .box-content-description, .facebook.info, .product-grid.box-content {
    margin-bottom: 30px;
    border-radius: 24px;
    -moz-border-radius: 24px;
    -webkit-border-radius: 24px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 0 21px rgb(195 218 224 / 53%);
    -moz-box-shadow: 0 0 21px rgba(195, 218, 224, .53);
    -webkit-box-shadow: 0 0 21px rgb(195 218 224 / 53%);
}
.box.category .box-heading {
    background-color: #545C5E;
    border-bottom: none;
}
.box .box-heading, .facebook.info .box-heading {
    line-height: 36px;
    color: #359dc9;
    border: none;
    border-bottom: 1px solid #cde0e5;
    margin: 0;
    padding: 8px 20px;
    background: url('{{asset('public/img/box-header-bg.png')}}') 0 bottom repeat-x #fff;
}

.list-group-item:first-child {
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
}

.list-group a, .list-group a:visited {
    border-bottom: 1px solid #DDD;
    color: #545C5E;
    padding: 5px 5px 5px 20px;
    font-size: 14px;
}

.box.category .box-heading h3 {
    color: #fff;
}

.box h3, .facebook.info h3 {
    font-size: 18px;
    line-height: 24px;
    padding: 0;
    color: #359dc9;
    border: none;
    margin: 0;
    font-weight: 700;
}

@media only screen and (max-width: 1000px){
    .header .nav{
        display: none;
    }
    .header .logo{
        text-align: center;
    }
    .toprow-1{
        display: inline-flex!important;
    }
    .collapse.dont-collapse-sm {
        display: block;
        height: auto !important;
        visibility: visible;
    }
}

.swipe {
    background-color: #fff;
    color: #359dc9;
    display: block;
    position: fixed;
    top: 50px;
    width: 237px;
    z-index: 101;
    height: 100%;
    left: -237px;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
}

.swipe .swipe-menu {
    height: 100%;
    overflow: auto;
}

.swipe ul {
    padding: 0;
    margin: 0;
}

.swipe ul li {
    list-style-type: none;
}

.swipe ul li a {
    display: block;
    font-size: 17px;
    padding: 12px 15px;
    color: #359dc9;
    border-bottom: 1px solid #cde0e5;
    line-height: 20px;
}

.swipe ul li a i {
    vertical-align: top;
    margin-right: 5px;
}

.swipe .foot li a:before, .swipe ul li a i {
    font-size: 20px;
    color: #359dc9;
    line-height: 20px;
}

.about-page i, .dropcap, .extra-wrap, .swipe, .well .heading {
    overflow: hidden;
}

.swipe-control {
    border-right: 1px solid white;
    display: block;
    height: 50px;
    vertical-align: top;
    text-align: center;
    width: 64px;
    z-index: 100;
}

.swipe-control i {
    color:#545C5E ;
    line-height: 50px;
    font-size: 30px;
    vertical-align: top;
}

.toprow-1 {
    background-color: white;
    left: 0;
    position: sticky;
    border-bottom: 2px solid;
    top: 0;
    display: none;
    width: 100%;
    z-index: 90;
    
}

.btn-blue{
    background: white;
    border-color: #359dc9;
    color: #545C5E;
    border-radius: 14px;
}
.btn-blue:hover{
    background: #359dc9;
    color: white;
    
}

.footer{
    position: relative;
}

.special-rows{
    border-bottom: 1px solid #DDD;
    padding-top: 20px;
    padding-bottom: 20px;
}

.box-special{
    border-radius: 24px;
box-shadow: 0 0 21px rgb(195 218 224 / 53%);
}

.box-heading{
    padding: 10px 10px 3px 20px;
    font-size: 14px;
    border-bottom: 1px solid #DDD;
}

.footer:before {
    position: absolute;
    top: -9px;
    left: 0;
    content: '';
    display: block;
    width: 100%;
    height: 10px;
    background: url('{{asset('public/img/frill-footer.png')}}') center top repeat-x;
}
.header a{
    text-decoration: none;
    color: #545C5E;
}

.well {
    background-color: #fff;
    border: none;
    margin-bottom: 30px;
    padding: 30px;
    border-radius: 24px;
    -moz-border-radius: 24px;
    -webkit-border-radius: 24px;
    -moz-box-shadow: 0 0 21px rgba(195, 218, 224, .53);
    -webkit-box-shadow: 0 0 21px rgb(195 218 224 / 53%);
}

.manufacturer-list, .well {
    box-shadow: 0 0 21px rgb(195 218 224 / 53%);
}

.btn-outline{
    color: #545C5E;
    text-shadow: none;
    background-color: #fff;
    border: 1px solid #359dc9;
    padding:12px 16px;
    border-radius: 14px;
    -moz-border-radius: 14px;
    -webkit-border-radius: 14px;
}

.btn-outline:hover{
    background: #359dc9;
    color: white;
    text-decoration: none;
}

.well .heading, .well p {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #cde0e5;
}

.about-page i, .dropcap, .extra-wrap, .swipe, .well .heading {
    overflow: hidden;
}

.well .heading i {
    color: #359dc9;
    float: left;
    font-size: 56px;
    margin-right: 14px;
}

.well .heading h2 {
    font-size: 23px;
    font-weight: 700;
    color: #545C5E;
    margin: 0 0 5px;
}

.well label{
    color: #545C5E;
}

.well .forgot{
    color: #359dc9;
}

.well .form-control{
    padding:24px 20px;
    border-radius: 10px;
}

.form-control:focus{
    border-color: #495057;
    outline: 0;
    box-shadow: 0 0 0 0.1rem #495057;
}

.well .heading strong {
    font-weight: 400;
    color: #545C5E;
    font-size: 13px!important;
    font-style: italic;
}

.well .heading, .well p {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #cde0e5;
}

.breadcrumb>li, .btn, .btn:visited, .product-thumb {
    position: relative;
}

.breadcrumb>li a, .breadcrumb>li+li:before {
    color: #fff;
    text-decoration: none;
    font-size: 13px;
}

.breadcrumb .last a{
    color: #fc0;
}

.breadcrumb>li {
    display: inline-;
}

.breadcrumb {
    list-style: none;
    padding: 8px 10px 8px 15px;
    border-radius: 12px;
    -moz-border-radius: 12px;
    -webkit-border-radius: 12px;
    color: #fff;
    background:  #545C5E;
    box-shadow: 0 0 21px rgb(195 218 224 / 53%);
    -moz-box-shadow: 0 0 21px rgba(195, 218, 224, .53);
    -webkit-box-shadow: 0 0 21px rgb(195 218 224 / 53%);
    border: none;
}
.productdiv{
    box-shadow: 1px 1px 10px #545c5e;
}
.btn.btn-add {
    margin-bottom: 0;
    background: 0 0;
    border: none;
}
.btn.btn-add, .btn.btn-icon {
    padding: 0;
    line-height: 49px;
    display: inline-block;
    text-align: center;
    margin-bottom: 10px;
}
.btn.btn-add span {
    display: inline-block;
    font-size: 20px;
    line-height: 47px;
    padding: 0 14px;
    color: #359dc9;
    border: 1px solid #cde0e5;
    border-right: none;
    border-radius: 14px 0 0 14px;
    -moz-border-radius: 14px 0 0 14px;
    -webkit-border-radius: 14px 0 0 14px;
    background: #fff;
    vertical-align: top;
}
.btn.btn-add i {
    display: inline-block;
    float: none;
    line-height: 49px;
    padding: 0 14px 0 10px;
    background: #545C5E;
    border-radius: 0 14px 14px 0;
    -moz-border-radius: 0 14px 14px 0;
    -webkit-border-radius: 0 14px 14px 0;
}
.btn.btn-add i, .btn.btn-icon {
    font-size: 23px;
    height: 49px;
    color: #fff;
    vertical-align: top;
}
</style>
</head>
<body style="background: #EBF2FA">
    <div class="swipe" style="height: 100%;overflow-y: auto;"> 
        <div class="swipe-menu"> 
            <ul> 
                <li>
                    <a href="{{url('/')}}"><i class="fa fa-home"></i> <span>Acasa</span></a>
                </li>

                <li>
                    <a href="{{url('contact-us')}}"><i class="fa fa-question-circle"></i> <span>Contact</span></a>
                </li>

                <li>
                    <a href="{{url('about-us')}}"><i class="fa fa-users"></i> <span>Despre noi</span></a>
                </li>

                @Auth
                <li>
                    <a href="{{url('my-account')}}"  ><i class="fa fa-user"></i> <span>Contul meu</span></a>
                </li>
                
                <li>
                    <a class="navlink"onclick="document.getElementById('form-logout').submit()" href="javascript:;"><i class="fa fa-sign-out"></i> <span>Logout</span></a>
                </li>

                @else
                <li>
                    <a href="{{url('login')}}"><i class="fa fa-unlock"></i> <span>Intra in cont </span></a>
                </li>

                @endif
                <li>
                    <a href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i> <span>Cos</span></a>
                </li>
            </ul>    
        </div>
    </div>

<div class="toprow-1"> 
    <a class="swipe-control siderbartoggle" href="javascript:;"><i class="fa fa-align-justify"></i></a> 
    <!-- obtinere numeretoare produse in cos -->
    @Auth
    <!-- daca e user, detectez dupa cont -->
    <?php 
        $shopcount=DB::Table('cart')->where('user_id',Auth::id())->count();
    ?>
    @else
    <!-- daca e vizitator, detectez dupa adresa IP -->
    <?php 
        $shopcount=DB::Table('temp_cart')->where('ip_address',Request::ip())->count();
    ?>
    @endif

    <a class="swipe-control ml-auto" style="width: 100px!important" href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i>  <span id="cart-total-mb" >{{$shopcount}}</span></a> 
</div>

<div class="container-fluid px-0 header bg-white ">
    <div class="container py-3">
        <form id="form-search" action="{{url('search')}}">
            <div class="row">
                <!-- logo -->
                <div class="col-lg-3 logo ">
                    <a href="{{url('')}}">   <img src="{{asset('public/img/logo1.png')}}" width="340px" style="object-fit:contain;" height="150px"></a>
                </div>

                <div class="col-lg-">
                    <div class="row">
                        <div class="col-lg-7 px-0 text-center mt-4"></div>
                        <div class="col-lg-5 text-center mt-4" style="display: flex;">
                            <div id="search" class="m-auto"> <input type="text" name="search"  value="" placeholder=""> 
                                <button type="button" class="button-search" onclick="document.getElementById('form-search').submit()"><i class="fa fa-search"></i></button> 
                                <div class="clear"></div> 
                            </div>
                        </div>
                    </div>
        </form>

                <div class="row">
                    <div class="col-lg-12 text-right mt-5">
                        <div class="nav">
                            <ul class="ml-auto">
                                <li class="navitem">
                                    <a class="nav1" style="    padding-right: 14px;" href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;&nbsp;Acasa</a>
                                </li>

                                <li class="navitem ">
                                    <a class="nav1 navlink"  style="padding-right: 14px;"  href="{{url('contact-us')}}"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;Contact</a> 
                                </li>

                                <li class="navitem ">
                                    <a class="nav1 navlink"  style="padding-right: 14px;   "  href="{{url('about-us')}}">Despre noi</a> 
                                </li>
                            
                                @Auth
                                <li class="navitem">
                                    <a class="navlink nav1" href="{{url('my-account')}}"><i class="fa fa-user"></i>&nbsp;&nbsp;Contul Meu</a>
                                </li>

                                <li class="navitem text-right">
                                    <a class="navlink  " onclick="document.getElementById('form-logout').submit()" href="javascript:;">Logout</a>
                                </li>

                                <form id="form-logout" method="post" action="{{url('logout')}}">
                                @csrf
                                </form>
                                @else
                                <li class="navitem ">
                                    <a class="navlink nav1" href="{{url('login')}}"><i class="fa fa-lock"></i>&nbsp;&nbsp; Intra in cont</a>
                                </li>
                                @endif
                                <li class="navitem ">
                                    <a class="navlink " href="{{url('cart')}}"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Cos :</a> 
                                </li>
                        
                                <li class="navitem mt-n2"> 
                                    <a class="navitem ">   <span id="cart-total2">{{$shopcount}}</span></a> 
                                </li>
                            </ul>

                            <div class="col-lg-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('content')
@yield('footer')