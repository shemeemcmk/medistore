<?php


use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UproductController;
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




Route::middleware('auth')->group(function () {
    

Route::get('/home', [HomeController::class, 'viewIndex'])->name('home');


// products roots page

Route::get('/products/{id}', [HomeController::class, 'viewProducts'])->name('products');



// contact root

Route::get('/contact', [HomeController::class, 'viewcontact'])->name('contact');


// cart root

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');

Route::get('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove-from-cart');

Route::get('/cart', [HomeController::class, 'viewcart'])->name('cart');


// detials root

Route::get('/productdetials', [HomeController::class, 'viewProductdetials'])->name('productdetials');


// form

Route::get('/forms', [HomeController::class, 'viewform'])->name('forms');

// <a href="{{ route('forms') }}" class="btn"></a>


//  booknow

Route::get('/booknow', [HomeController::class, 'viewBook'])->name('booknow');


Route::get('/categories', [HomeController::class, 'viewcategories'])->name('categories');


Route::get('/baying', [HomeController::class, 'viewBying'])->name('baying');

Route::get('/success', [HomeController::class, 'viewSuccess'])->name('success');



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


    Route::get('/view-uproducts', [UproductController::class, 'viewUproducts'])->name('view-uproduct');
    Route::get('/uproducts-addform', [UproductController::class, 'viewUproductAddform'])->name('uproduct-addform');
    Route::post('/add-uproducts', [UproductController::class, 'addUproduct'])->name('add-uproduct');
    Route::get('/uproducts-editform/{id}', [UproductController::class, 'UproductEditform'])->name('uproduct-editform');
    Route::post('/update-uproducts', [UproductController::class, 'updateUproduct'])->name('update-uproduct');
    Route::get('/delete-uproducts/{id}', [UproductController::class, 'deleteUproduct'])->name('delete-uproduct');




    // booking form add

    Route::post('/add-book',[HomeController::class, 'addbooking'])->name('add-book');

    Route::get('/view-bookingss', [AdminController::class, 'viewbookings'])->name('view-bookingss');




    // contact roots frontend end


Route::post('/add-contact',[HomeController::class, 'addContact'])->name('add-contact');

// contact roots admin

Route::get('/view-enquiries',[AdminController::class, 'viewEnquiries'])->name('view-Enquiries');




// login and registration

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('reg', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
// Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');



});