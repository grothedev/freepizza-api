<?php

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

/*
use MongoDB\Client as Mongo;

Route::get('mongo', function(Request $request){
	$collection = Mongo::get()->fp->collection;

	return $collection->find()->toArray();
}
*/



Route::get('/', function () {
    return view('welcome');
});
