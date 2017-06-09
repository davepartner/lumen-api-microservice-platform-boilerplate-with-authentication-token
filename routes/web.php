<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});


$app->group(['prefix' => 'api/v1'], function($app)
{


	//posts
	$app->group(['prefix' => 'posts', 'middleware'=>'auth'], function($app)
{

	$app->post('add','PostsController@createPost');

	$app->get('view/{id}','PostsController@viewPost');

	$app->put('edit/{id}','PostsController@updatePost');
 	 
	$app->delete('delete/{id}','PostsController@deletePost');

	$app->get('index','PostsController@index');

	
});


//users
		$app->group(['prefix' => 'users', 'middleware'=>'cors'], function($app)
			{
				$app->post('add','UsersController@add');

				$app->get('view/{id}','UsersController@view');

				$app->put('edit/{id}','UsersController@edit');
			 	 
				$app->delete('delete/{id}','UsersController@delete');

				$app->get('index','UsersController@index');
			});



});