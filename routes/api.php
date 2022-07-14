<?php

use App\Http\Controllers\PayableController;
use App\Http\Controllers\TransactionController;
use App\Models\Payable;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('create-tax', [PayableController::class, 'create']);

Route::post('pay-tax', [TransactionController::class, 'create']);

Route::get('list-pending-taxes/{service_type?}', [PayableController::class, 'list_pending']);

Route::get('list-transactions/{init_date}/{end_date}', [TransactionController::class, 'list_transactions']);

Route::get('hola', function(Request $request) {
    return $request->message;
});
