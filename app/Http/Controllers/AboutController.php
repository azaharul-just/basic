<?php

namespace App\Http\Controllers;
use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Multipic;
class AboutController extends Controller
{
    public function HomeAbout(){
        $abouts = HomeAbout::latest()->get();
        return view('admin.home.index',compact('abouts'));
    }

    public function AddAbout(){
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:home_abouts|min:4', 
            'short_dis' => 'required',
            'long_dis' => 'required',
        ]);  

        HomeAbout::insert([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('home.about')->with('success','About Added Successfully');
    }

    public function EditAbout($id){
        $abouts = HomeAbout::find($id);
        return view('admin.home.edit',compact('abouts'));
    }

    public function UpdateAbout(Request $request, $id){
        HomeAbout::find($id)->update([
            'title'=>$request->title,
            'short_dis'=>$request->short_dis,
            'long_dis'=>$request->long_dis,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('home.about')->with('success','About Updated Successfully');
    }

    public function DeleteAbout($id){
        HomeAbout::find($id)->delete();
        return Redirect()->back()->with('success','About Deleted Successfully');

    }

    //Portfolio
    public function Portfolio(){
        $images = Multipic::all();
        return view('pages.portfolio',compact('images'));
    }

}
