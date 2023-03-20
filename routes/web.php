<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountUserController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout',[HomeController::class,'logout'])->name('register.check');

Route::view('master','master');
Route::view('Account','Account');
Route::view('show_account','show_account');

Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
//account route
Route::post('Account',[AccountController::class,'addbank']);
Route::get('show_account',[AccountController::class,'show']);
Route::view('/show_account_user/account_user/{id}','account_user');
Route::view('update','update');
Route::get('update/{id}',[AccountController::class,'updatee']);
Route::post('update/{id}',[AccountController::class,'updatedataa']);
Route::get('delete/{id}',[AccountController::class,'delete']);

//account_user route
Route::post('show_account_user/account_user/{id}',[AccountUserController::class,'adduser']);
Route::get('show_account_user/{id}',[AccountUserController::class,'show_user']);
Route::view('update_account_user','update_account_user');
Route::get('show_account_user/update_account_user/{id}',[AccountUserController::class,'update_account_user']);
Route::post('update_account_user',[AccountUserController::class,'updatedata_account_user']);
Route::get('show_account_user/delete_account_user/{id}',[AccountUserController::class,'delete_account_user']);
// Route::view('account_user','account_user');

Route::get('display/{id}',[TransactionController::class,'displaydata']);


// Transaction Routes...
Route::get('/transactions/{id}', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('display/transactions/{id}', [TransactionController::class, 'create'])->name('transactions.create');
// Route::post('/transactions/{id}', [TransactionController::class, 'store'])->name('transactions.store/{id}');
Route::post('transactions_store/{id}',[TransactionController::class,'store']);
Route::get('display/destroy/{id}',[TransactionController::class,'destroy']);

// Route::get('display',[TransactionController::class,'displaydata']);
Route::view('transactions_edit','transactions_edit');


Route::view('show','show');

//////////////

Route::get('/transactionshow/{id}',[TransactionController::class, 'index'])->name('index');

Route::post('/transactionshow/add_transaction/{account_id}',[TransactionController::class,'store']);
Route::get('/transactionshow/add_transaction/{id}',[TransactionController::class,'create']);
Route::get('index', [TransactionController::class, 'show'])->name('index.show');
Route::post('index',[TransactionController::class,'showtransaction']);

Route::view('index','index');

Route::get('/deletetransaction/{id}',[TransactionController::class, 'destroy'])->name('destroy');

Route::get('editTransaction/{id}',[TransactionController::class, 'updateid'])->name('updateid');

Route::put('/transaction/update/{id}', [TransactionController::class, 'update'])->name('update');


Route::post('updatetransaction',[TransactionController::class,'update']);
Route::view('updatetransaction','updatetransaction');

Route::put('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');

Route::get('index', [TransactionController::class, 'show'])->name('index.show');
Route::post('index',[TransactionController::class,'showtransaction']);

Route::post('transactionshow',[TransactionController::class,'showTransaction']);



























