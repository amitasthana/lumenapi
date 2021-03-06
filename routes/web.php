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



$app->group(['prefix' => 'url/'], function ($app) {
    $app->get('/','UrlsController@index'); //get all the routes
    $app->post('/','UrlsController@store'); //store single route
    $app->post('/any/','UrlsController@anyurl'); //store single route
    $app->get('/{id}/', 'UrlsController@show'); //get single route
    $app->put('/{id}/','UrlsController@update'); //update single route
    $app->delete('/{id}/','UrlsController@destroy'); //delete single route
});



$app->get('/{redirect}', 'UrlsController@redirect');
