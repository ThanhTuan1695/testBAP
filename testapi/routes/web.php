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
$api = app('Dingo\Api\Routing\Router');
Route::get('/', function () {
    return view('welcome');
});

$api->version('v1', function ($api)
{
	$api->get('hello', 'App\Http\Controllers\ApiController@index');
	$api->get('users/{user_id}/roles/{role_id}', 'App\Http\Controllers\ApiController@attachUserRole');
	$api->get('users/{user_id}/roles', 'App\Http\Controllers\ApiController@getUserRole');
	$api->post('role/permission/add', 'App\Http\Controllers\ApiController@attachPermission');
	$api->get('role/{rolep}/permissions', 'App\Http\Controllers\ApiController@getPermissions');
	$api->post('authenticate' , 'App\Http\Controllers\HomeController@authenticate');
	
	

});


$api->version('v1',['middleware' => 'jwt.auth'], function ($api)
{
		$api->get('users' , 'App\Http\Controllers\HomeController@index');
		$api->get('user' , 'App\Http\Controllers\HomeController@show');
		$api->get('tokens' , 'App\Http\Controllers\HomeController@getTokens');
		$api->get('delete' , 'App\Http\Controllers\HomeController@destroy');
});

