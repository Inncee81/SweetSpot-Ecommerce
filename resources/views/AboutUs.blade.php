@extends('layouts.header')
@extends('layouts.footer')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous"/>
<link rel="stylesheet" href="{{asset('public/assets/css/about.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/linearicons@1.0.2/dist/web-font/style.min.css"/>
<!-- =====Start Two Column Section===== -->
<!-- text will take 1/3 and image 2/3 -->
<div id="aboutme" class="container my-5">
  <!-- two column section it's going to transform into the single column layout at 992pixel //my-5-> 3rem margin top & bottom-->
  <div class="row py-4">
    <!-- py-4->1.5rem margin top&bottom -->
    <div class="col-md-12 col-xl-8">
      <img src="{{asset('public/img/img/aboutme.jpg')}}" alt="" class="w-100" />
    </div>
    <!-- col-lg-8->takes 2/3 of the page -->

    <div class="col-md-12 col-xl-4 mb-4 my-lg-auto">
      <h1 class="text-dark font-weight-bold text-center">Despre noi</h1>
      <div class="devider"><i class="fas fa-globe"></i></div>
      <!-- DEVIDER -->
      <p class="mb-3">
        Sweet Spot este un start-up care are ca scop atat vanzarea de
        calculatoare / laptopuri pregatite pentru diferite domenii de
        activitate cat si personalizarea calculatoarelor in functie de
        cerintele clientului.
      </p>
      <p class="mb-3">
        Indiferent daca esti un utilizator incepator sau unul experimentat,
        noi suntem aici pentru a te ajuta sa iei cea mai buna decizie!
      </p>
    </div>
  </div>
</div>
<!-- =====End Two Column Section===== -->

<!-- =====Customers Review Section===== -->
<section id="customers">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="section-title text-center text-dark font-weight-bold">
          Parerile clientilor nostri
        </h1>
        <div class="devider"><i class="fas fa-globe"></i></div>
        <!-- DEVIDER -->
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="d-flex justify-content-center col-lg-4 col-xl-3">
        <div class="profile">
          <div class="pic">
            <img src="{{asset('public/img/img/customers/client1.jpg')}}" alt="" />
          </div>
          <h4>Corina</h4>
        </div>
      </div>
      <div class="col-lg-8 col-xl-9">
        <div class="quote mb-5">
          <b><i class="fas fa-quote-left"></i></b>Sunt foarte multumita de laptopul pe care mi l-am luat prin intermediul celor de la SweetSpot.
          Cu ajutorul acestora, acum pot lucra eficient atat de acasa cat si in alte locuri. &nbsp;&nbsp;&nbsp;<b
            ><i class="fas fa-quote-right"></i
          ></b>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-9 order-2 order-lg-1">
        <div class="quote">
          <b><i class="fas fa-quote-left"></i></b>Ma bucur nespus de mult ca am apelat la firma SweetSpot. Acestia au reusit sa-mi indeplineasca cu usurinta
          orice nevoie, construindu-mi un calculator de la 0 orientat pe cerintele mele. &nbsp;&nbsp;&nbsp;<b><i class="fas fa-quote-right"></i></b>
        </div>
      </div>
      <div class="d-flex justify-content-center col-lg-4 col-xl-3 order-1 order-lg-2">
        <div class="profile">
          <div class="pic">
            <img src="{{asset('public/img/img/customers/client2.jpg')}}" alt="" />
          </div>
          <h4>Andrei</h4>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- =====End Customers Review Section===== -->

<!-- =====Sponsors Section===== -->
<section id="supporters" class="section-with-bg">
  <div class="container" data-aos="fade-up">
    <div class="section-header">
      <h1 class="text-center text-dark font-weight-bold">Sponsorii nostri</h1>
      <div class="devider"><i class="fas fa-globe"></i></div>
      <!-- DEVIDER -->
    </div>

    <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
      <!-- no-gutters->no space between elements -->

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/11.png')}}" class="img-fluid" alt="" />
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/22.png')}}" class="img-fluid" alt="" />
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/33.png')}}" class="img-fluid" alt="" />
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/44.png')}}" class="img-fluid" alt="" />
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/55.png')}}" class="img-fluid" alt="" />
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-xs-6">
        <div class="supporter-logo">
          <img src="{{asset('public/img/img/sponsors/66.png')}}" class="img-fluid" alt="" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- =====End Sponsors Section===== -->

<!-- =====Our Services===== -->
<section class="ourserv mt-3 pt-3 pb-4">
  <div class="container">
    <div class="row justify-content-center pb-3 mb-3">
      <div class="col-md-7 heading-section text-center">
        <h2 class="services">Serviciile noastre</h2>
        <div class="devider"><i class="fas fa-globe"></i></div>
        <!-- DEVIDER -->
      </div>
    </div>
    <div class="row incons">
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/musicprod.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Music Production</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/gaming.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Gaming</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/autocad.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Computer-Aided Design</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/programming.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Programming</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/videoediting.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Video Editing</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/cryptomining.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Crypto Mining</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/stocktrading.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">Stock Trading</h3>
        </div>
      </div>
      <div class="services-2 col-md-3 d-flex w-100 pb-3">
        <div class="icon d-flex align-items-start">
          <img src="{{asset('public/img/img/services/artificiali.png')}}" />
        </div>
        <div class="media-body pl-3">
          <h3 class="heading">A.I. Deep Learning</h3>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- =====End Our Services Section===== -->
@endsection('content')