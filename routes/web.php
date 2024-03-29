<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FilterController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Index')->name('Home');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/category', 'AllCategoryPage')->name('allcategory');
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/invoice/{id}', 'Invoice')->name('invoice');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/add-to-cart', 'AddToCart')->name('addtocart');
        Route::post('/add-product-to-cart', 'AddProductToCart')->name('addproducttocart');
        Route::get('/shipping-address', 'GetShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');

        Route::get('/new-shipping-address', 'NewShippingAddress')->name('newshippingaddress');

        Route::get('/order', 'Order')->name('order');
        Route::post('/order-success', 'OrderSuccess')->name('ordersuccess');

        Route::get('/edit/address/{id}', 'EditAddress')->name('editaddress');
        Route::post('/update-address', 'UpdateAddress')->name('updateaddress');
        Route::get('/delete-address/{id}', 'DeleteAddress')->name('deleteaddress');

        Route::post('/store-addressclear', 'StoreAddress')->name('storeaddress');


        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
        Route::get('/user-proflie/history', 'History')->name('history');
        Route::get('/remove-cart-item/{id}', 'RemoveCartItem')->name('removeitem');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
    });
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admindashboard');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/product', 'Index')->name('adminproduct');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/edit-product-img\{id}', 'EditProductImg')->name('editproductimg');
        Route::post('/admin/update-product-img', 'UpdateProductImg')->name('updateproductimg');
        Route::get('/admin/edit/product/{id}', 'EditProduct')->name('editproduct');
        Route::post('/admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/category', 'Index')->name('admincategory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('storecategory');
        Route::get('/admin/edit/category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-category', 'UpdateCategory')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');
    });
    Route::controller(OrderController::class)->group(function () {

        Route::get('/admin/pending-orders', 'Pending')->name('pendingorder');
        Route::get('/admin/success-orders', 'filter')->name('successorder');
        Route::get('/filter', 'filter')->name('filter');
        Route::get('/admin/edit/status/{id}', 'EditStatus')->name('editstatus');
        Route::post('/admin/update-status', 'UpdateStatus')->name('updatestatus');
        // Route::get('/export-pdf', 'ExportSuccess')->name('exportsuccess');
        Route::get('/cetak-order-form', 'cetakForm')->name('cetak-order-form');
        Route::get('/cetak-order-bydate/{tglawal}/{tglakhir}', 'cetakOrderPertanggal')->name('cetak-order-bydate');
        Route::get('/cetak-product-form', 'cetakProduct')->name('cetak-product-form');
        Route::get('/cetak-product-bydate/{tglawal}/{tglakhir}', 'cetakProductPertanggal')->name('cetak-product-bydate');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'role:user'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
