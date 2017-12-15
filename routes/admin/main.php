<?php

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', 'role:admin'],
], function () {
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('obyav', 'AdvertCrudController');
//    CRUD::resource('tag', 'TagCrudController');
});