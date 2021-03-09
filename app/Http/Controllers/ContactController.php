<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //Middleware Checking User loged in or not, it will be used all controller for checking authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('contact');
    }
     
}
