<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    //

    public function profileFrm()
    {
        return view("component/users/profileFrm");
    }
    public function profile(Request $request)
    {
        $user = Auth::user();
        $user->first_name= $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->facebook = $request->facebook;
         $avatar = $request->avatar;
         if($avatar)
         {
//            if(Storage::exists('uploads/'.$user->avatar))
//            {
//                unlink('storage/uploads/'.$user->avatar);
//            }
            if(file_exists(public_path('uploads/'.$user->avatar)))
            {
                // dd("yes");
                unlink(public_path('uploads/'.$user->avatar));
            }
            $name = time()."_".$avatar->getClientOriginalName();
//            $path = $request->file('avatar')->storeAs('public/uploads',$name);
            $path = $request->file('avatar')->move(public_path('uploads'),$name);
            $user->avatar = $name;
         }
         $user->save();
         return redirect()->back()->with(["message"=>"update profile thanh cong"]);
    }
}
