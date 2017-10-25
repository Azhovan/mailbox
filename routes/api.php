<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'v1'], function () {

    Route::group(['prefix' => 'messages'], function () {

        // get all messages
        Route::get('/{id?}', 'MessageController@index')->middleware('oberloBasicAuth');
        Route::put('/{id}/{action}', 'MessageController@update')->middleware('oberloBasicAuth');

    });


});
