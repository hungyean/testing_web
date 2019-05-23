<?php

use Illuminate\Http\Request;
use App\tbitems;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/data',function(){
    $items = tbitems::all();
    return $items;
});

Route::post('/data/{id}',function($id){
    $item = tbitems::find($id);
    return $item;
});



Route::delete('/data/delete/{id}', function ($id) {
    $result = tbitems::destroy($id);
    return $result;
});

Route::post('/data/create/{name}',function($name){
    // $data = $req->json()->all();
    $item = new tbitems();
    // $item->name = $data['name'];
    $item->name = $name;
    $item->save();
    return $item;
    // return response(($result === true ? 'succeed' : 'failed'), 200)->header('Content-Type', 'application/json');
});

Route::post('/data/update/{id}',function(Request $req,$id){
    $data = $req->json()->all();
    $item = tbitems::find($id);
    $item->name = $data['name'];
    $item->save();
    return $item;
    // return response(($result === true ? 'succeed' : 'failed'), 200)->header('Content-Type', 'application/json');
});


