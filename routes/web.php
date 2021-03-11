<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Models\User;
use App\Models\Multipic;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Veryfy Email Address

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

 

Route::get('/', function () {
    $brands = DB::table('brands')->get(); 
    $abouts = DB::table('home_abouts')->latest()->first();
    $images = Multipic::latest()->paginate(3);
    return view('home',compact('brands','abouts','images'));
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contactsdgfhg', [ContactController::class, 'index'])->name('contact');


//CategoryController
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

//Brand Controller 
Route::get('/brand/all/', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multi-Image Part
Route::get('/multi/image/', [BrandController::class, 'Multpic'])->name('multi.image');
Route::post('/multiimage/add', [BrandController::class, 'StoreImg'])->name('store.image');

//Home Controller
//Slider Part 
Route::get('/home/slider/', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider/', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider/', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

//About
//AboutController
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about/', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/delete/{id}', [AboutController::class, 'DeleteAbout']);
Route::get('/about/edit/{id}', [AboutController::class, 'EditAbout']);
Route::post('/update/about/{id}', [AboutController::class, 'UpdateAbout']);

//Portfolio Part
Route::get('/portfolio', [AboutController::class, 'Portfolio'])->name('portfolio');






//Automatically created it authentication 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$users=User::all();
    
    return view('admin.index');
})->name('dashboard');


//Logout 
Route::get('/user/logout/', [BrandController::class, 'Logout'])->name('user.logout');