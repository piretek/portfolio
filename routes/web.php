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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/portfolio', 'PortfolioController@websites')->name('portfolio.index');

Route::get('/portfolio/create', 'PortfolioController@create')->name('portfolio.create');

Route::get('/portfolio/{website}', 'PortfolioController@website')->name('portfolio.show');

Route::put('/portfolio/{website}', 'PortfolioController@modify')->name('portfolio.edit');

Route::post('/portfolio', 'PortfolioController@store')->name('portfolio.store');

Route::delete('/portfolio/{website}', 'PortfolioController@destroy')->name('portfolio.destroy');

// Prof. settings

Route::get('/ust-portfolio', 'PortfolioSettingsController@index')->name('settings-portfolio.index');
