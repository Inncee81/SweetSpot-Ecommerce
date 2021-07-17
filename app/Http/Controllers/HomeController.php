<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Mail;
use App;
use Excel;
use Hash;
use PDF;
class HomeController extends Controller {
//
public function __construct(){
   
}

public function index(){

  return view('home');
}

public function search(){

  return view('search');
} 

public function Chekout(){

  return view('Chekout');
}

public function MyAccount(){

  return view('user.dashboard');
} 

public function ChangePassword(){

  return view('user.changePassword');
} 

public function ContactUs(){

  return view('ContactUs');
}

public function AboutUs(){

  return view('AboutUs');
} 
    
public function InsertChangePassword(Request $request){

  $qry=DB::Table('users')->where('id',Auth::id())->first();
  if(Hash::check($request->old_password,$qry->password)){
    if($request->password==$request->confirm_password){
      DB::Table('users')->where('id',Auth::id())->update(['password'=>Hash::make($request->password)]);
    }
    else{
      return redirect()->back()->with('success','Parolele nu se potrivesc!');
    }
  }
  else{
    return redirect()->back()->with('success','Parola veche este incorecta!');
  }

  return redirect()->back()->with('success','Parola a fost schimbata cu succes!');
}

public function ShowOrderProduct(Request $request){

  $qry=DB::table('order_detail as o')->leftjoin('products as p','p.id','=','o.product_id')->where('o.order_id',$request->id)->get();
  
  return response()->json($qry);
}


public function completeOrder(Request $request){

  $cart=DB::table('cart')->where('user_id',Auth::id())->get();
  $count=DB::table('cart')->where('user_id',Auth::id())->sum('price');
  $data=array( 'subject'=>'Confirm Order ','email'=>Auth::user()->email,'name'=>Auth::user()->name,'cart'=>$cart );
  $pdf = PDF::loadView('Pdf', $data);

  Mail::send('emails.order',['data'=>$data], function($message) use ($data, $pdf) {
    $message->to($data['email'],$data['name']);
    $message->from('magazinsweetspot@gmail.com', 'SweetSpot')->subject($data['subject'])->attachData($pdf->output(), "Factura_Comanda.pdf");;
  });

  DB::table('orders')->insert(['user_id'=>Auth::id(),'total_amount'=>$count,'order_status'=>'Waiting']);
    $id=DB::getPdo()->lastInsertId();
    foreach ($cart as $c) {
      DB::table('order_detail')->insert([ 
      'product_id'=>$c->product_id,
      'order_id'=>$id,
      'qty'=>$c->qty,
      'amount'=>$c->price,
      ]);

      DB::Table('products')->where('id',$c->product_id)->decrement('qty',$c->qty);
    }

    $cart=DB::table('cart')->where('user_id',Auth::id())->delete();

    return redirect('my-account')->with('success','Comanda finalizata cu succes!');
} 


public function home(Request $request){

  if(Auth::user()->role=='admin'){
    return redirect('admin');
  }
  else{
    if(Auth::id()!=null){
      $cart=DB::table('temp_cart')->where('ip_address',$request->ip())->get();
      foreach ($cart as $c) {
        DB::table('cart')->insert([ 'user_id'=>Auth::id(),
        'qty'=>$c->qty,
        'price'=>$c->price,
        'product_id'=>$c->product_id]);
      }
      DB::table('temp_cart')->where('ip_address',$request->ip())->delete();
    }

    return redirect('user');
  }
} 
 

public function lang_change($lang){

  App::setLocale($lang);
  session()->put('locale', $lang);  
  return redirect()->back();
}


public function Privacy(){
  return view('Privacy');
} 


public function Cart(Request $request){

  if(Auth::id()!=null){
    $cart=DB::table('temp_cart')->where('ip_address',$request->ip())->get();
    foreach ($cart as $c) {
      DB::table('cart')->insert([ 
      'user_id'=>Auth::id(),
      'qty'=>$c->qty,
      'price'=>$c->price,
      'product_id'=>$c->product_id]);
    }
    DB::table('temp_cart')->where('ip_address',$request->ip())->delete();
  }
  return view('Cart');
} 


public function IncreaseQty(Request $request){

  $product=DB::table('products')->where('id',$request->product_id)->first();
  if($request->qty>$product->qty){
    $array=array('qty'=>$product->qty==''?0:$product->qty,'response'=>'error');
    if(Auth::id()==null){
      $cart=DB::table('temp_cart')->where('id',$request->id)->update(['qty'=>$product->qty,'price'=>$request->price*$product->qty]);
    }
    else{
      $cart=DB::table('cart')->where('id',$request->id)->update(['qty'=>$product->qty,'price'=>$request->price*$product->qty]);
    }
    return response()->json($array);
  }
  if(Auth::id()==null){
    $cart=DB::table('temp_cart')->where('id',$request->id)->update(['qty'=>$request->qty,'price'=>$request->price*$request->qty]);
  }
  else{
    $cart=DB::table('cart')->where('id',$request->id)->update(['qty'=>$request->qty,'price'=>$request->price*$request->qty]);
  }

  $array=array('qty'=>$product->qty,'response'=>'success');

  return response()->json($array);
} 


public function deleteCart(Request $request){  

  if(Auth::id()!=''){
    DB::table('cart')->where('id',$request->id)->delete();
  }
  else{
    DB::table('temp_cart')->where('id',$request->id)->delete();
  }

  return redirect()->back();
}


public function UpdateCart(Request $request){  

  $product=DB::Table('products')->where('id',$request->id)->first();
  if($request->qty>$product->qty){
    return response()->json('error');
  }

  if(Auth::id()!=''){
    $qry=DB::Table('cart')->where('user_id',Auth::id())->where('product_id',$request->id)->first();
    if($qry!=''){
      DB::table('cart')->where('id',$qry->id)->increment('qty',$request->qty);
      DB::table('cart')->where('id',$qry->id)->increment('price',$product->price);
    }
    else{
      DB::table('cart')->insert(['user_id'=>Auth::id(),'product_id'=>$request->id,'qty'=>$request->qty,'price'=>$request->qty*$product->price]);
    }
  }
  else{
    $qry=DB::Table('temp_cart')->where('ip_address',$request->ip())->where('product_id',$request->id)->first();
    if($qry!=''){
      DB::table('temp_cart')->where('id',$qry->id)->increment('qty',$request->qty);
      DB::table('temp_cart')->where('id',$qry->id)->increment('price',$product->price);
    }
    else{
      DB::table('temp_cart')->insert(['ip_address'=>$request->ip(),'product_id'=>$request->id,'qty'=>$request->qty,'price'=>$request->qty*$product->price]);
    }
  }
  
  return response()->json('success');
}


public function Products($id,$subcategory=''){

  return view('products',['id'=>$id,'subcategory'=>$subcategory]);
}


public function ProductDetail($id){

  return view('ProductDetail')->with('id',$id);
}


public function InsertRating(Request $request){

  $count=DB::Table('rating')->where('product_id',$request->product_id)->where('user_id',Auth::id())->count();
    if($count>0){
      return response()->json('error');
    }
    $data=array(
      'user_id'=>Auth::id(),
      'rating'=>$request->rating,
      'comment'=>$request->comment,
      'product_id'=>$request->product_id
    );
     
    DB::table('rating')->insert($data);

    return response()->json('success');
}

    
public function insertContactUs(Request $request){
        
  $data=array(
    'comment'=>$request->comment,
    'email'=>$request->email,
    'mobile_no'=>$request->mobile_no,                    
    'name'=>$request->name
  );

  DB::table('contact_us')->insert($data);
 
  Mail::send('emails.contact-us',['data'=>$data], function($message) use ($data ) {
    $message->to('adrian.dumbrava1999@gmail.com','Adrian');
    $message->from('magazinsweetspot@gmail.com', 'SweetSpot')->subject
    ($data['name'].' te-a conectat pe site-ul SweetSpot');;
  });

  return redirect()->back()->with('success','Iti multumim. Te vom contacta in scurt timp!');
}
}
