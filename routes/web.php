<?php


Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);


Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);