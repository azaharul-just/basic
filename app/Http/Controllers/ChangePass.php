<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ChangePass extends Controller
{

    //Middleware Checking User loged in or not, it will be used all controller for checking authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function CPassword(){
        return view('admin.body.change_password');
    }

    public function UpdatePassword(Request $request){

        $validatedData = $request->validate([ 
            'oldpassword' => 'required',  
            'password' => 'required|confirmed',
        ]);  

        $hashedPassword = Auth::user()->password; 
        $password = $request->oldpassword;
        
        if (Hash::check($password,$hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Changed Successfully');

        }else{
            return redirect()->back()->with('success','Current Password Invalid'); 
        }


    }


    public function UpdateProfile(){

        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.body.update_profile',compact('user'));
            }
        } 
    }

    public function UpdateUserProfile(Request $request){
         
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save() ;
            return redirect()->back()->with('success','Update Profile Successfully');
        }else{
            return redirect()->back()->with('success','Not Update Profile.');
        }
         
    }
}
