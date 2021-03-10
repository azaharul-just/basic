<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class HomeController extends Controller
{
    public function HomeSlider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){
        $validatedData = $request->validate([
            'title' => 'required|unique:brands|min:4', 
            'description' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png', 
        ]); 

        $slider_image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location.$img_name;
        $slider_image->move($up_location,$img_name);
        
        // $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);
       
        // $last_img = 'image/brand/'.$name_gen;

        Slider::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$last_img,
            'created_at'=>Carbon::now(),
        ]);

        return Redirect()->route('home.slider')->with('success','Slider Added Successfully');
    }

    public function EditSlider($id){
        $sliders = Slider::find($id);
        return view('admin.slider.edit',compact('sliders'));
    }

    public function UpdateSlider(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required:sliders|min:4', 
            'description' => 'required:sliders',
        ]); 

        $old_image = $request->old_image;
         
        $slider_image = $request->file('image');

        if ($slider_image) { 
            
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location,$img_name);
            
            unlink($old_image);
            Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'image'=>$last_img,
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success','Slider Updated With Image Successfully');
        }else{
            Slider::find($id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'created_at'=>Carbon::now(),
            ]);
            return Redirect()->route('home.slider')->with('success','Slider Updated Without Image Successfully');
        }  
    }

    public function DeleteSlider($id){
        $slider = Slider::find($id);
        $slider_image = $slider->image;

        //Delete the image from slider folder
        unlink($slider_image);

        //Delete image from database
        Slider::find($id)->delete();

        return Redirect()->back()->with('success','Slider Deleted Successfully');

    }


}
