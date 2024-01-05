<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware('auth','verified');

Route::get('/viewcategory', [AdminController::class, 'viewcategory'])->name('admin.viewcategory');
Route::post('/addcategory', [AdminController::class, 'addcategory'])->name('admin.addcategory');
Route::get('/viewallcategory', [AdminController::class, 'viewallcategory'])->name('admin.viewallcategory');
Route::get('/deleteallcategory/{id}', [AdminController::class, 'deleteallcategory'])->name('admin.deleteallcategory');
Route::get('/viewproduct', [AdminController::class, 'viewproduct'])->name('admin.viewproduct');
Route::post('/addproduct', [AdminController::class, 'addproduct'])->name('admin.addproduct');
Route::get('/showallproduct', [AdminController::class, 'showallproduct'])->name('admin.showallproduct');
Route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct'])->name('admin.deleteproduct');
Route::get('/viewupdateproduct/{id}', [AdminController::class, 'viewupdateproduct'])->name('admin.viewupdateproduct');
Route::post('/confirmviewupdateproduct/{id}', [AdminController::class, 'confirmviewupdateproduct'])->name('admin.confirmviewupdateproduct');
Route::get('/vieworder', [AdminController::class, 'vieworder'])->name('admin.vieworder');
Route::get('/delivered/{id}', [AdminController::class, 'delivered'])->name('admin.delivered');
Route::get('/printpdf/{id}', [AdminController::class, 'printpdf'])->name('admin.printpdf');
Route::get('/sendemail/{id}', [AdminController::class, 'sendemail'])->name('admin.sendemail');
Route::post('/senduseremail/{id}', [AdminController::class, 'senduseremail'])->name('admin.senduseremail');
Route::get('/search', [AdminController::class, 'search'])->name('admin.search');



Route::get('/productdetail/{id}', [HomeController::class, 'productdetail'])->name('home.productdetail');
Route::post('/addcart/{id}', [HomeController::class, 'addcart'])->name('home.addcart');
Route::get('/showcart', [HomeController::class, 'showcart'])->name('home.showcart');
Route::get('/removecart/{id}', [HomeController::class, 'removecart'])->name('home.removecart');
Route::get('/cashorder', [HomeController::class, 'cashorder'])->name('home.cashorder');
Route::get('/stripe/{totalprice}', [HomeController::class, 'stripe'])->name('home.stripe');
Route::post('/stripepost/{totalprice}', [HomeController::class, 'stripepost'])->name('home.stripepost');
Route::get('/showorder', [HomeController::class, 'showorder'])->name('home.showorder');
Route::get('/cancelorder/{id}', [HomeController::class, 'cancelorder'])->name('home.cancelorder');
Route::post('/addcomment', [HomeController::class, 'addcomment'])->name('home.addcomment');
Route::post('/addreply', [HomeController::class, 'addreply'])->name('home.addreply');
Route::get('/productsearch', [HomeController::class, 'productsearch'])->name('home.productsearch');
Route::get('/showproduct', [HomeController::class, 'showproduct'])->name('home.showproduct');
Route::get('/viewproductsearch', [HomeController::class, 'viewproductsearch'])->name('home.viewproductsearch');
Route::get('/showabout',[HomeController::class, 'showabout'])->name('home.showabout');
Route::get('/showcontact',[HomeController::class, 'showcontact'])->name('home.showcontact');
