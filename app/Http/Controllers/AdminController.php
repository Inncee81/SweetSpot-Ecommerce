<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use DB;
use Mail;
use Validator;

class AdminController extends Controller {
    //
public function __construct(){

}

public function index(){

  return view('admin.dashboard');
} 

public function Categories(){

  return view('admin.Categories');
} 

public function Users(){

  return view('admin.Users');
} 

public function Statistics(){

  return view('admin.Statistics');
} 


public function Subcategory(){

  return view('admin.subcategory');
} 

public function Orders(){

  return view('admin.Orders');
} 

public function Product(){
  
  return view('admin.Product');
} 

public function Slides(){

  return view('admin.Slides');
} 

public function FooterSettings(){

  return view('admin.FooterSettings');
} 
 

public function UpdateFooterSettings(Request $request){

  $data=array(
    'contact_no'=>$request->contact_no,
    'company_code'=>$request->company_code,
    'bank_account'=>$request->bank_account,
    'email'=>$request->email,
    'about_us'=>$request->about_us,
    'payment_methods'=>$request->payment_methods,
    'delivery_of_goods'=>$request->delivery_of_goods,
    'returning_goods'=>$request->returning_goods,
    'privacy_policy'=>$request->privacy_policy,
    'terms_of_use'=>$request->terms_of_use,
    'credit'=>$request->credit,
  );
    
  $qry=DB::table('footer_settings')->update($data);

  return redirect()->back();
}


public function ShowOrderProduct(Request $request){

    $qry=DB::table('order_detail as o')->leftjoin('products as p','p.id','=','o.product_id')->where('o.order_id',$request->id)->get();

    return response()->json($qry);
}


public function DeleteUser(Request $request){

    $qry=DB::table('users')->where('id',$request->id)->delete();

    return redirect()->back();
}


public function deleteOrder(Request $request){

    $qry=DB::table('orders')->where('id',$request->id)->delete();

    $qry=DB::table('order_detail')->where('order_id',$request->id)->delete();

    return redirect()->back();
}


public function deleteSlide(Request $request){

    $qry=DB::table('slides')->where('id',$request->id)->delete();

    return redirect()->back();
}


public function DeleteCategory(Request $request){

    $qry=DB::table('categories')->where('id',$request->id)->delete();

    return redirect()->back();
}


public function DeleteSubCategory(Request $request){

    $qry=DB::table('subcategory')->where('id',$request->id)->delete();

    return redirect()->back();
}


public function deleteProduct(Request $request){

    $qry=DB::table('products')->where('id',$request->id)->delete();

    return redirect()->back();
}


public function EditProduct(Request $request){

    $qry=DB::table('products')->where('id',$request->id)->first();

    return response()->json($qry);
}


public function GetSubcategory(Request $request){

    $qry=DB::table('subcategory')->where('category_id',$request->id)->get();

    return response()->json($qry);
}

    
public function EditCategory(Request $request){

    $qry=DB::table('categories')->where('id',$request->id)->first();

    return response()->json($qry);
}


public function AddSlides(Request $request){

    $image = mt_rand(1,1000).''.time() . '.' . $request->file('Slide_image')->getClientOriginalExtension();

    $request->file('Slide_image')->move('uploads', $image);

    $data=array(
      'image'=>$image
    );

    DB::table('slides')->insert($data);

    return redirect()->back()->with('success','Slide introdus cu succes!');
}


public function AddCategory(Request $request){

    $image = mt_rand(1,1000).''.time() . '.' . $request->file('category_image')->getClientOriginalExtension();

    $request->file('category_image')->move('uploads', $image);

    $data=array(
      'category_name'=>$request->category_name,
      'category_image'=>$image,
      'type'=>'product',
    );

    DB::table('categories')->insert($data);

    return redirect()->back()->with('success','Categorie introdusa cu succes!');
}


public function AddSubCategory(Request $request){
 
    $data=array(
      'subcategory_name'=>$request->subcategory_name,
      'category_id'=>$request->category_id,
    );

    DB::table('subcategory')->insert($data);

    return redirect()->back()->with('success','Subcateogorie introdusa cu succes!');
}


public function UpdateSubCategory(Request $request){
 
    $data=array(
      'subcategory_name'=>$request->subcategory_name1,
      'category_id'=>$request->category_id1,
    );

    DB::table('subcategory')->where('id',$request->id)->update($data);

    return redirect()->back()->with('success','Subcategorie actualizata cu succes!');
}


public function InsertProduct(Request $request){

    $image = mt_rand(1,1000).''.time() . '.' . $request->file('product_image')->getClientOriginalExtension();

    $request->file('product_image')->move('uploads', $image);

    $data=array(
      'product_name'=>$request->product_name,
      'price'=>$request->price,
      'category_id'=>$request->category,
      'subcategory_id'=>$request->subcategory_id,
      'qty'=>$request->qty,
      'description'=>$request->description,
      'type'=>'product',
      'product_image'=>$image
    );

    DB::table('products')->insert($data);

    return redirect()->back()->with('success','Produsul a fost introdus cu succes!');
}


public function UpdateProduct(Request $request){

    $image='';

    if($request->product_image1==''){

      $image=$request->hidden_img;
    }

    else{

      $image = mt_rand(1,1000).''.time() . '.' . $request->file('product_image1')->getClientOriginalExtension();

      $request->file('product_image1')->move('uploads', $image);
    }

    $data=array(
      'product_name'=>$request->product_name1,
      'price'=>$request->price1,
      'category_id'=>$request->category1,
      'description'=>$request->description1,
      'subcategory_id'=>$request->subcategory_id1,
      'qty'=>$request->qty1,
      'product_image'=>$image
    );

    DB::table('products')->where('id',$request->id)->update($data);

    return redirect()->back()->with('success','Produs actualizat cu succes!');
}


public function UpdateCategory(Request $request){

    $image='';

    if($request->category_image1==''){

      $image=$request->hidden_img;
    }

    else{

      $image = mt_rand(1,1000).''.time() . '.' . $request->file('category_image1')->getClientOriginalExtension();

      $request->file('category_image1')->move('uploads', $image);
    }

    $data=array(
    'category_name'=>$request->category_name1,
    'category_image'=>$image,
    );

    DB::table('categories')->where('id',$request->id)->update($data);

    return redirect()->back()->with('success','Categorie actualizata cu succes!');
}


public function UpdateStatus(Request $request){

    $data=array(
      'order_status'=>$request->order_status, 
    );

    DB::table('orders')->where('id',$request->id)->update($data);

    return redirect()->back()->with('success','Status Updated');
}
}