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


$app->group(['prefix' => 'book/'], function ($app) {

  $app->get('/','BooksController@index'); //get all the routes
  $app->post('/','BooksController@store'); //store single route
  $app->get('/{id}/', 'BooksController@show'); //get single route
  $app->put('/{id}/','BooksController@update'); //update single route
  $app->delete('/{id}/','BooksController@destroy'); //delete single route
});

$app->group(['prefix' => 'url/'], function ($app) {
    $app->get('/','UrlsController@index'); //get all the routes
    $app->post('/','UrlsController@store'); //store single route
    $app->get('/{id}/', 'UrlsController@show'); //get single route
    $app->put('/{id}/','UrlsController@update'); //update single route
    $app->delete('/{id}/','UrlsController@destroy'); //delete single route


});
