<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    //Middleware Checking User loged in or not, it will be used all controller for checking authentication
    public function __construct(){
        $this->middleware('auth');
    } 

    public function AdminContact(){
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }

    public function AddContact(){
        return view('admin.contact.create');
    }

    public function StoreContact(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:contacts', 
            'phone' => 'required',
            'address' => 'required',  
        ]); 

        Contact::insert([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('admin.contact')->with('success','Contact Added Successfully');


    }
     

    public function Contact(){
        $contacts = Contact::latest()->first();
        return view('pages.contact',compact('contacts'));
    }

    public function ContactForm(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|unique:contact_forms', 
            'name' => 'required',
            'subject' => 'required',  
            'message' => 'required',
        ]); 

        ContactForm::insert([
            'name'=>$request->name,
            'email'=>$request->email, 
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->back()->with('success','Your Message Sent Successfully');
    }

    public function AdminContactMessage(){
        $messages = ContactForm::all();
        return view('admin.contact.message',compact('messages'));
    }

    public function DeleteMessage($id){
        ContactForm::find($id)->delete();
        return Redirect()->back()->with('success','The Message Deleted Successfully');

    }
}
