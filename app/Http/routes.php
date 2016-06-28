<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['middleware' => ['api.auth', 'api.throttle'], 'limit' => 5, 'expires' => 1], function ($api) {
    $v1ControllerPath = 'App\Api\V1\Controllers\\';

    // movies
    $api->get('movies/{id}', $v1ControllerPath . 'MoviesController@show');
    $api->post('movies', $v1ControllerPath . 'MoviesController@store');

    // movies/:id/genres
    $api->get('movies/{id}/genres', $v1ControllerPath . 'GenresController@index');

    // movies/:id/actors
    $api->get('movies/{id}/actors', $v1ControllerPath . 'MoviesController@index');

    // actors
    $api->get('actors/{id}', $v1ControllerPath . 'ActorsController@show');
    $api->post('actors', $v1ControllerPath . 'ActorsController@store');

    // actors/:id/genres
    $api->get('actors/{id}/genres', $v1ControllerPath . 'GenresController@index');

    // genres
    $api->get('genres/{id}', $v1ControllerPath . 'GenresController@show');
    $api->post('genres', $v1ControllerPath . 'GenresController@store');

    // images
    $api->post('image', $v1ControllerPath . 'ImagesController@store');
    $api->post('image', $v1ControllerPath . 'ImagesController@store');
});

Route::post('api/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

