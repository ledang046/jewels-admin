<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomuserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Models\Coupon;
use App\Models\Customuser;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/logout', function() {
    Auth::Logout(); 
    return redirect(url('admin/login')); 
});
/* Route group */
Route::group(["prefix"=>"admin"], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class,'getCustomerNum'])->name('home');
    Auth::routes();
    Route::get('/home', [App\Http\Controllers\HomeController::class,'getCustomerNum'])->name('home');
    Route::get('/403',function() {
        return view('backend.403');
    });
/* Dashboard */
    Route::get('/getCustomerNum',[HomeController::class,'getCustomerNum'])->name('home');

/* User */
    Route::resource('users', UserController::class)->middleware('permission.checker:admin|manager');
    Route::get('paginateUser/{number}',  [UserController::class, 'paginateUser'])
    ->name('users.paginate');
/* Category */
    Route::resource('categories', CategoryController::class);
    Route::get('/searchCate',[CategoryController::class,'searchCate'])->name('cate.search');

/* Product */
    Route::resource('products', ProductController::class);
    Route::get('paginateProduct/{number}',  [ProductController::class, 'paginateProduct'])
    ->name('products.paginate');
    Route::get('/searchProd',[ProductController::class,'searchProd'])->name('products.search');

/* New */
    Route::resource('news', NewsController::class);

/* Order */
    Route::resource('orders', OrderController::class);
    Route::get('/delivery/{id}',[OrderController::class,'delivery']);

/* Customuser */
    Route::resource('customusers', CustomuserController::class);
    Route::get('paginateCustomuser/{number}',  [CustomuserController::class, 'paginateCustomuser'])
    ->name('customusers.paginate');

/* Coupon */
    Route::resource('coupons', CouponController::class);

});
 
Route::get('/one-many',function()
{
    $cate = App\Models\Category::all();
      foreach($cate as $rows)
      {
          echo $rows->id;
          echo $rows->products->first()->name;
      }
        // echo "</br>";
        // echo $product->id . " " . $product->name;
        // echo $product->category->name;
      echo "<br>";
        $product = App\Models\Product::all();
        foreach($product as $rows)
        {
            echo $rows->name;
            echo $rows->category->id. "<br>";
        }
        
    
});