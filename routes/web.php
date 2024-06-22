<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'viewIndex'])->name('home');


// products roots page

Route::get('/products/{id}', [HomeController::class, 'viewProducts'])->name('products');



// contact root

Route::get('/contact', [HomeController::class, 'viewcontact'])->name('contact');


// cart root

Route::get('/cart', [HomeController::class, 'viewcart'])->name('cart');


// detials root

Route::get('/productdetials', [HomeController::class, 'viewProductdetials'])->name('productdetials');




//  booknow

Route::get('/booknow', [HomeController::class, 'viewBook'])->name('booknow');




Route::get('/categories', [HomeController::class, 'viewcategories'])->name('categories');



Route::get('admin',[AdminController::class, 'viewAdminindex'])->name('admin');



    Route::get('/view-products', [ProductController::class, 'viewProducts'])->name('view-product');
    Route::get('/products-addform', [ProductController::class, 'productAddform'])->name('product-addform');
    Route::post('/add-products', [ProductController::class, 'addproduct'])->name('add-product');
    Route::get('/products-editform/{id}', [ProductController::class, 'productEditform'])->name('product-editform');
    Route::post('/update-products', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::get('/delete-products/{id}', [ProductController::class, 'deleteproduct'])->name('delete-product');




    Route::get('/view-category', [CategoryController::class, 'viewCategory'])->name('view-category');
    Route::get('/categorys-addform', [CategoryController::class, 'CategoryAddform'])->name('category-addform');
    Route::post('/add-categorys', [CategoryController::class, 'addCategory'])->name('add-category');
    Route::get('/categorys-editform/{id}', [CategoryController::class, 'CategoryEditform'])->name('category-editform');
    Route::post('/update-categorys', [CategoryController::class, 'updateCategory'])->name('update-category');
    Route::get('/delete-categorys/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');



    // contact


    // contact roots frontend end


Route::post('/add-contact',[HomeController::class, 'addContact'])->name('add-contact');

// contact roots admin

Route::get('/view-enquiries',[AdminController::class, 'viewEnquiries'])->name('view-Enquiries');


// cart root


Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');

Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

Route::post('update-cart', [CartController::class, 'updateCart'])->name('update-cart');


