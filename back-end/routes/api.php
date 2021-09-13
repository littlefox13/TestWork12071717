<?php

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

/*
Route::middleware('api')->group(function () {
    Route::resource('products', ProductController::class);
});
*/

use App\Http\Controllers\ProductController;

Route::resource('/items', ProductController::class);

/*
Route::get('/items', function(Request $request) {
    $data = [
        [
            "id" => 7,
            "name" => "na like this",
            "description" => "",
            "created_at" => "2020-07-26T05:53:00.376501Z",
            "updated_at" => "2020-07-26T05:53:00.376501Z"
        ], [
            "id" => 5,
            "name" => "write a book",
            "description" => "hohoho",
            "created_at" => "2020-07-26T05:47:00.908706Z",
            "updated_at" => "2020-07-26T05:53:00.376501Z"
        ]
    ];
    $t = \App\Http\Controllers\ProductController::index();
    return response()->json($t);
});
*/
