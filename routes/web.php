<?php

use Illuminate\Support\Facades\Route;

Route::get('/'                                         , function () {
    return redirect('login');
});

// Authentication Routes...
Route::get('login'                                     , 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login'                                    , 'Auth\LoginController@login');
Route::post('logout'                                   , 'Auth\LoginController@logout')->name('logout');
// **********************

Route::prefix('admin')->group(function(){

    Route::group(['middleware'=>'admin']               , function(){

        Route::get('user_search'                       , 'AdminController@userSearch');
        Route::get('client_search'                     , 'AdminController@clientSearch');
        Route::get('dashboard'                         , 'AdminController@index');
        
        Route::get('user'                              , 'AdminController@user');
        Route::get('user/add_user'                     , 'AdminController@addUser');
        Route::post('user/create_user'                 , 'AdminController@createUser');
        Route::get('user/delete/{id}'                  , 'AdminController@delete');

        Route::get('rate'                              , 'AdminController@rate');
        Route::post('rate_change'                      , 'AdminController@rateChange');

        Route::get('transaction'                       , 'AdminController@transaction');

    });
});

Route::prefix('saudia')->group(function(){

    Route::group(['middleware'=>'saudia']              , function(){

        Route::get('saudia_client'                     , 'SaudiaController@saudiaClient');

        Route::get('transaction'                       , 'SaudiaController@transaction');
        Route::get('transaction/add_transaction'       , 'SaudiaController@addTransaction');
        Route::post('transaction/create_transaction'   , 'SaudiaController@createTransaction');

    });
});

Route::prefix('pakistan')->group(function(){

    Route::group(['middleware'=>'pakistan']            , function(){

        Route::get('pakistan_client'                   , 'PakistanController@pakistanClient');

        Route::get('transaction'                       , 'PakistanController@transaction');
        Route::get('transaction/edit_transaction/{id}' , 'PakistanController@editTransaction');
        Route::post('transaction/update_transaction'   , 'PakistanController@updateTransaction');

    });
});