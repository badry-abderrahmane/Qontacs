<?php


/**
 * Welcome View Route
 */
Route::get('/', function () {
    return view('welcome');
});


/**
 * Contacts Routes
 */
Route::prefix('contacts')->group(function () {
    
    /**
     * Contacts List Route
     */
    Route::get('/', 'ContactsController@index')->name('contacts.index');
    
    /**
     * CRUD Methods Routes
     */
    Route::post('/store', 'ContactsController@store')->name('contacts.store');
    Route::put('/update', 'ContactsController@update')->name('contacts.update');
    Route::delete('/destroy/{id}', 'ContactsController@destroy')->name('contacts.destroy');

    /**
     * Specific Route For Datatables Response
     */
    Route::get('/all/paginated', 'ContactsController@getAllPaginated')->name('contacts.paginated');
    
    /**
     * CRUD Views Routes
     */
    Route::get('/create', 'ContactsController@create')->name('contacts.create');
    Route::get('/show/{id}', 'ContactsController@show')->name('contacts.show');
    Route::get('/edit/{id}', 'ContactsController@edit')->name('contacts.edit');
    Route::get('/delete/{id}', 'ContactsController@delete')->name('contacts.delete');
    
});