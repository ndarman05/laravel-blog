<?php


Route::get('/', [
    'uses' => 'BlogController@index'
]);


Route::get('/blog/show', function () {
    return view('blog.show');
});