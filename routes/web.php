<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('login');
});
Route::group(['prefix'=>'admin', 'middleware' => ['auth:web']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/add-bill', [BillController::class, 'addUserBill'])->name('admin.addBill');
    Route::get('/user-bill', [BillController::class, 'getUserBill'])->name('admin.billHistory');
    Route::get('/bill-payment', [BillController::class, 'userBillPayment'])->name('admin.billPayment');
    Route::get('/payment-history', [BillController::class, 'userPaymentHistory'])->name('admin.paymentHistory');
    Route::get('/add-manual-paid', [BillController::class, 'addManualPaid'])->name('admin.addManualPaid');
    Route::post('/save-manual-paid', [BillController::class, 'addManualPaidPost'])->name('admin.addManualPaidPost');
    Route::get('/load/user', [UserController::class, 'getUserFromApi'])->name('admin.getUserFromApi');
    Route::resource('roles', 'Admin\RolesController', ['names' => 'admin.roles']);
    Route::get('/pay-bill', [BillController::class, 'getUserDue'])->name('admin.getUserDue');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
