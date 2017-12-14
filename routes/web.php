<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'profile', 'namespace'=>'Profile', 'middleware'=>['web', 'profile']], function (){
    Route::get('/', 'DashboardController@dashboard')->name('profile.index');
    CRUD::resource('advert', 'AdvertCrudController');

    Route::get('edit-account-info', 'MyAccountController@getAccountInfoForm')->name('profile.account.info');
    Route::post('edit-account-info', 'MyAccountController@postAccountInfoForm');
    Route::get('change-password', 'MyAccountController@getChangePasswordForm')->name('profile.account.password');
    Route::post('change-password', 'MyAccountController@postChangePasswordForm');
});
Route::group(
    [
        'namespace'  => 'Auth',
        'middleware' => ['web'],
        'prefix'     => 'profile',
    ],
    function () {
        // Authentication Routes...
        Route::get('login', 'LoginController@showLoginForm')->name('profile.auth.login');
        Route::post('login', 'LoginController@login');
        Route::get('logout', 'LoginController@logout')->name('profile.auth.logout');
        Route::post('logout', 'LoginController@logout');

        // Registration Routes...
        Route::get('register', 'ProfileRegisterController@showRegistrationForm')->name('profile.auth.register');
        Route::post('register', 'ProfileRegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('profile.auth.password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('profile.auth.password.reset.token');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('profile.auth.password.email');
    });

Route::get('/', 'HomeController@index')->name('home');
Route::get('category/{slug?}', 'HomeController@category')->name('category');
Route::get('advert/{slug?}', 'HomeController@advert')->name('advert');
Route::get('search', 'HomeController@search')->name('search');

//Route::get('/search/{category?}', ['uses'=>'HomeController@search','as' => 'search']);

Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);