<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/store-data', [HomeController::class, 'store'])->name('store.data');
Route::post('/send-to-rabbitmq', [HomeController::class, 'sendToRabbitMQ'])->name('send.to.rabbitmq');
