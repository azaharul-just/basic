<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ChangePass extends Controller
{
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
}
