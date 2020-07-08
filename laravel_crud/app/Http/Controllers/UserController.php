<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Users;
use Illuminate\Support\Facades\Storage;


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
         $uploaded_file = $request->file('userphoto');
         $image_name =$uploaded_file->getClientOriginalName();
         $directory_path = 'public/User_image/';
         $put= Storage::put($directory_path . $image_name, file_get_contents($uploaded_file->getRealPath()));
         $Users->userphoto = $image_name;
      }
      $Users->save();
      return redirect('/userlist');
     }

     function editUser($id,Request $request){
      $userid = Users::find($id);
        return view('edituser',compact('userid'));
    
     }

     function updateUser(Request $request, $id){
      //  dump($request->toArray()); 
      //  die();

      $Users =Users::find($id);
      $Users->username = $request->get('username');
     
      if($request->hasFile('userphoto')){
      //  dump($request->toArray()); 
      //  die();
         
        $directory_path = 'public/User_image/';
        $old_image = $Users->userphoto;
        if(Storage::exists($directory_path.$old_image))
        {
           Storage::delete($directory_path.$old_image);
        }
        $uploaded_file = $request->file('userphoto');
        $image_name = $uploaded_file->getClientOriginalName();
        $put= Storage::put($directory_path . $image_name, file_get_contents($uploaded_file->getRealPath()));
        $Users->userphoto = $image_name;
      }

      $Users->save();
      return redirect('/userlist');
   }

   function deleteUser($id, Request $request){
      $user = Users::where('id', $id)->delete();

      return redirect('/userlist');
   }
}
