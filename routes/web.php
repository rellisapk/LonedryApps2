<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::post('/addToCart/{id}',[App\Http\Controllers\StoreController::class,'addToCart']);
// Route::get('/checkout/{user}',[App\Http\Controllers\StoreController::class,'checkout']);
// Route::get('/deleteItem/{id}', [App\Http\Controllers\StoreController::class, 'deleteItem']);
Route::get('check-out', [App\Http\Controllers\StoreController::class, 'checkout']);
Route::delete('check-out/{id}', [App\Http\Controllers\StoreController::class, 'deleteItem']);
Route::get('konfirmasi-check-out',  [App\Http\Controllers\StoreController::class, 'konfirmasi']);
Route::get('history', [App\Http\Controllers\HistoryController::class, 'index']);
Route::get('history/{id}', [App\Http\Controllers\HistoryController::class, 'detail']);
Route::post('/storeBuktistore', [App\Http\Controllers\HistoryController::class, 'storeBuktistore']);
Route::put('/updateBuktistore', [App\Http\Controllers\HistoryController::class, 'updateBuktistore']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact']);
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'services'])->name('services');
Route::get('/store', [App\Http\Controllers\ServiceController::class, 'store'])->name('store');
Route::get('/store/pesan', [App\Http\Controllers\ServiceController::class, 'pesan'])->name('pesan');
Route::get('/store', [App\Http\Controllers\StoreController::class, 'index'])->name('store');
Route::get('/store/search', [App\Http\Controllers\StoreController::class, 'search'])->name('store.search');
Route::get('/home/admin', [App\Http\Controllers\AdminController::class, 'getData'])->name('admin.route')->middleware('isAdmin');

Route::post('/home/admin/makeAdmin/{id}', [App\Http\Controllers\AdminController::class, 'makeAdmin'])->name('completedUpdate');
Route::get('/home/admin/addUsers', [App\Http\Controllers\AdminController::class, 'addUsers'])->middleware('isAdmin');
Route::get('/home/admin/deleteUsers/{id}', [App\Http\Controllers\AdminController::class, 'deleteUsers'])->middleware('isAdmin');
Route::post('/home/admin/storeUsers', [App\Http\Controllers\AdminController::class, 'storeUsers'])->middleware('isAdmin');

Route::get('/home/admin/editOrder/{id}', [App\Http\Controllers\AdminController::class, 'editOrder'])->middleware('isAdmin');
Route::put('/home/admin/updateOrder', [App\Http\Controllers\AdminController::class, 'updateOrder'])->middleware('isAdmin');
Route::get('/home/admin/deleteOrder/{id}', [App\Http\Controllers\AdminController::class, 'deleteOrder'])->middleware('isAdmin');

Route::get('/home/admin/addShop', [App\Http\Controllers\AdminController::class, 'addShop'])->middleware('isAdmin');
Route::post('/home/admin/storeShop', [App\Http\Controllers\AdminController::class, 'storeShop'])->middleware('isAdmin');
Route::get('/home/admin/editShop/{id}', [App\Http\Controllers\AdminController::class, 'editShop'])->middleware('isAdmin');
Route::put('/home/admin/updateShop', [App\Http\Controllers\AdminController::class, 'updateShop'])->middleware('isAdmin');
Route::get('/home/admin/deleteShop/{id}', [App\Http\Controllers\AdminController::class, 'deleteShop'])->middleware('isAdmin');

Route::get('/home/admin/addTreatments', [App\Http\Controllers\AdminController::class, 'addTreatments'])->middleware('isAdmin');
Route::post('/home/admin/storeTreatments', [App\Http\Controllers\AdminController::class, 'storeTreatments'])->middleware('isAdmin');
Route::get('/home/admin/editTreatments/{id}', [App\Http\Controllers\AdminController::class, 'editTreatments'])->middleware('isAdmin');
Route::put('/home/admin/updateTreatments', [App\Http\Controllers\AdminController::class, 'updateTreatments'])->middleware('isAdmin');
Route::get('/home/admin/deleteTreatments/{id}', [App\Http\Controllers\AdminController::class, 'deleteTreatments'])->middleware('isAdmin');
Route::get('/order/{user}', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
Route::get('/riwayat/{user}', [App\Http\Controllers\OrderController::class, 'riwayat'])->name('riwayat');

Route::get('/home/admin/editOrdershop/{id}', [App\Http\Controllers\AdminController::class, 'editOrdershop'])->middleware('isAdmin');
Route::put('/home/admin/updateOrdershop', [App\Http\Controllers\AdminController::class, 'updateOrdershop'])->middleware('isAdmin');
Route::get('/home/admin/deleteOrdershop/{id}', [App\Http\Controllers\AdminController::class, 'deleteOrdershop'])->middleware('isAdmin');

Route::get('/profile/edit/{user}', [App\Http\Controllers\HomeController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update/{user}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');

Route::middleware(['auth:sanctum'])->prefix('user')->group(function (){
    Route::resources([
        'order' => App\Http\Controllers\OrderController::class,
    ]);
});

// Route::middleware(['auth:sanctum', 'verified', 'is_Admin'])->group(function (){
//     Route::get('/dashboard', function () {return view('dashboard');});

//     Route::resources([
//         'treatment' => TreatmentController::class,
//         'order' => OrderController::class,
//     ]);
// });

// Route::get('/order/{user}', [App\Http\Controllers\OrderController::class, 'order_pdf'])->name('order_pdf');
Route::get('/riwayat/nota/{user}/{order}', [App\Http\Controllers\OrderController::class, 'nota'])->name('order_pdf');
// Route::get('generate-invoice-pdf', array('as'=> '/riwayat/{{ Auth::user()->id}} }}/{{$o->id}}/order_pdf', 'uses' => 'OrderController@generateInvoicePDF'));
