<?php

use Illuminate\Http\Request;


Route::group(['prefix' => 'messages'], function () {

    // get all messages
    Route::get('/', 'Message@index');

    //Route::get('/archived', 'Message');

});
