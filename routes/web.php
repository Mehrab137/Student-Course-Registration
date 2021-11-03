<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'undergraduate', 'namespace' => 'App\Http\Controllers'], function(){

    Route::get('programs', 'UndergraduateController@addUndergradView')->name('add.undergrad.view');
    Route::post('submit-programs', 'UndergraduateController@addUndergradSubmit')->name('add.undergrad.submit');
    Route::get('departments', 'UndergraduateController@addDepartmentView')->name('add.dept.view');
    Route::post('submit-departments', 'UndergraduateController@addDepartmentSubmit')->name('add.dept.submit');

});
