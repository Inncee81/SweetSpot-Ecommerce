@section('footer') 
<style type="text/css">
    button.close {
    -webkit-appearance: none;
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
}
.close {
    float: right;
    font-size: 21px;
    font-weight: bold;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    filter: alpha(opacity=20);
    opacity: .2;
}
.modal-body {
    position: relative;
    padding: 15px;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
</style>
 
<?php 
    $settings=DB::table('footer_settings')->first();
?>
    <footer class="footer-content-area footer bg-white pt-5 pb-2 ">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-lg-4 col-md-6">
                    <div class="footer-copywrite-info">
                        <!-- Copywrite -->
                        <div class="copywrite_text  fadeInUp" data-wow-delay="0.2s">
                            <div class="footer-logo text-center">
                                <img src="{{asset('public/img/logo1.png')}}" width="340px" style="object-fit: contain;" height="150px">
                            </div>        
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="contact_info_area d-sm-flex justify-between">
                        <!-- Content Info -->
                        <div class="contact_info mt-x text-left fadeInUp" data-wow-delay="0.3s">
                            <h4><b>Drepturi si conditii</b></h4>
                            <a href="javascript:;"  data-toggle="modal" data-target="#privacy"><p>Politica de confidentialitate</p></a>
                            <a href="javascript:;"  data-toggle="modal" data-target="#terms"><p>Termeni de utilizare</p></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-2 col-md-6 ">
                    <!-- Content Info -->
                    <div class="contact_info_area d-sm-flex justify-content-between">
                        <div class="contact_info mt-s text-left fadeInUp" data-wow-delay="0.2s">
                            <h4><b>Informatii</b></h4>
                            <a href="{{url('/')}}"><p>Pagina principala</p></a>
                            <a href="{{url('about-us')}}"><p>Despre noi</p></a>
                            <a href="javascript:;" data-toggle="modal" data-target="#payment"><p>Metode de plata</p></a>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-3 col-md-6 ">
                    <div class="contact_info_area d-sm-flex justify-content-between">
                        <!-- Content Info -->
                        <div class="contact_info mt-s text-left fadeInUp" data-wow-delay="0.4s">
                            <h4><B>Contacteaza-ne</B></h4>
                            <p>{{$settings->contact_no}}</p>
                            <p>Produsul perfect pentru tine!</p>                         
                            <p>{{$settings->email}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <p class="text-center">{{$settings->credit}} © <?php echo date('Y') ?></p>
    </footer>


<div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Metode de plata</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            
            <div class="modal-body px-5">
                <div class="form-group">
                    <div class="row margin-top">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {!!$settings->payment_methods!!}
                            </div>
                        </div>  
                    </div>
                </div>
            </div>  

            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-dismiss="modal">Inchide</button>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title text-center" id="myModalLabel"> Politica de confidentialitate</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
            </div>
            
            <div class="modal-body px-5">
                <div class="form-group">
                    <div class="row margin-top">
                        <div class="col-md-12 text-center">
                               {!!$settings->privacy_policy!!}
                        </div>  
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-dismiss="modal">Inchide</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title text-center" id="myModalLabel"> Termeni de utilizare</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> 
            </div>
            
            <div class="modal-body px-5">
                <div class="form-group">
                    <div class="row margin-top">
                        <div class="col-md-12 text-center">
                               {!!$settings->terms_of_use!!}
                        </div>  
                    </div>
                </div>
            </div>  

            <div class="modal-footer">
                <button type="button" class="btn btn-blue" data-dismiss="modal">Inchide</button>
            </div>
            
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function(){
        let t=1;
        $('.siderbartoggle').on('click',function(){
        if(t==1){
            $('.swipe').css({left:0});
            t=0;
        }
        else{
            $('.swipe').css({left:-237});
            t=1;
        }
        })
    })
</script>
 
@endsection('footer')
