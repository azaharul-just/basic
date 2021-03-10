<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Models\User;
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
    return view('home',compact('brands'));
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









//Automatically created it authentication 

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    //$users=User::all();
    
    return view('admin.index');
})->name('dashboard');


//Logout 
Route::get('/user/logout/', [BrandController::class, 'Logout'])->name('user.logout');