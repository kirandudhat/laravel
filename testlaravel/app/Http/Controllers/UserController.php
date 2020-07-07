<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use DB;
class UserController extends Controller
{
    function show(){
        $users = DB::table('managepeople')->get();
       return view('userlist')->with(compact('users'));
    }

    function addUser(){
        return view('adduser');
     }
     
     function saveuser(Request $request){

      $Users = new Users;
      $Users->username = $request->username;
      if($request->hasFile('userphoto'))
      {
		 // print_r($request); die;
         $uploaded_file = $request->file('userphoto');
         $image_name =$uploaded_file->getClientOriginalName();
         $directory_path = 'storage/app/public/User_image/';
         $put= Storage::put($directory_path . $image_name, file_get_contents($uploaded_file->getRealPath()));
         $Users->userphoto = $image_name;
      }
      $Users->save();
      return redirect('/userlist');
     }
}
