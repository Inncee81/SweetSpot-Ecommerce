<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use DB;

use Mail;

use Excel;

class UserController extends Controller{

//

public function __construct(){

}

public function index(){

  return view('user.dashboard');
} 

public function UpdateProfile(Request $request){

  $image='';

    if($request->file('image')!=''){

      $image = mt_rand(1,1000).''.time() . '.' . $request->file('image')->getClientOriginalExtension();

      $request->file('image')->move('uploads', $image);
    }

    else{

      $image=$request->hidden_img;

    }

    $data=array(
      'name'=>$request->name,
      'phone_number'=>$request->phone_number,
      'image'=>$image);

      DB::table('users')->where('id',Auth::id())->update($data);

      return redirect()->back()->with('success','profil actualizat');
}

public function changePassword(Request $request){

  if(Auth::user()->password==$request->old_password){

    if($request->new_password==$request->confirm_password){

      DB::table('users')->where('id',Auth::id())->update(['password'=>$request->new_password]);

      return redirect()->back()->with('success','parola schimbata');
    }

    else{

      return redirect()->back()->with('success','parolele nu se potrivesc');
    }
  }

  else{

    return redirect()->back()->with('success','introdu parola corecta');
  }

}

}

