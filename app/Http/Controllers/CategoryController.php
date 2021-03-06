<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){
        //$categories = Category::latest()->get(); //Elequent: all data from category model table
        //$categories = Category::latest()->paginate(10);  //With Pagination

        //Join Query builder users and categories table
        $categories = DB::table('categories')
                    ->join('users','categories.user_id','users.id')
                    ->select('categories.*','users.name')
                    ->latest()
                    ->paginate(10);

        //$categories = DB::table('categories')->latest()->paginate(5); //Query Builder
        return view('admin.category.index',compact('categories'));
    }

    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255', 
        ],[
            'category_name.required' => 'Please Fill Up Category Name', 
            'category_name.max' => 'Category Name less than 255 Chars', 
        ]); 

        //Eloquent ORM

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id'   =>Auth::user()->id,
        //     'created_at'=>Carbon::now()
        // ]);

        //Use these or above as you wise but these prefered professionally

        $category = new Category; //Model Class object
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id; //Current user id setup
        $category->save();

        //Query Builder

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id']= Auth::user()->id;
        // DB::table('categories')->insert($data);

        return redirect()->back()->with('success','Category Added Successfully');



    }
}
