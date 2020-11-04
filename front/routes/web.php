<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\AnswerController;

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

Route::get('/', [LoginController::class, 'logout']);

Route::post('/', [LoginController::class, 'login']);


Route::get('/question', [QuestionController::class, 'question']);
Route::post('/question', [QuestionController::class, 'doQuestion']);

Route::get('/answers', [AnswerController::class, 'answers']);