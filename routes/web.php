<?php

use App\Http\Controllers\TopicController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'roleCheck'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'topic'], function () {
        Route::get('/',                    [TopicController::class, 'homepage'])->name('topic.homepage');
        Route::get('/approve',                    [TopicController::class, 'approve'])->name('topic.approve');


        Route::get('/create',           [TopicController::class, 'create'])->name('topic.create');
        Route::get('/{topic}',          [TopicController::class, 'show'])->name('topic.show');
        Route::get('/{topic}/edit',     [TopicController::class, 'edit'])->name('topic.edit');

        Route::post('',                 [TopicController::class, 'store'])->name('topic.store');
        Route::put('{topic}',           [TopicController::class, 'update'])->name('topic.update');
        Route::delete('/{id}',        [TopicController::class, 'destroy'])->name('topic.destroy');
    });
});