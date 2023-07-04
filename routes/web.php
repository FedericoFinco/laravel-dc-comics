<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComicsController;

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

Route::get('/', [ComicsController::class, "index"])->name("home");
Route::resource("comics", ComicsController::class);

// Route::get('/', function () {
//     $links = config('store.links');
//     $footerCols = config('store.footerCols');
//     $footerSocialMedias = config('store.footerSocialMedias');
//     return view('welcome', compact('links','footerCols','footerSocialMedias'));
// });

Route::get('/otherpage', function () {
    $links = config('store.someLinks');
    return view('other', compact('links'));
});
