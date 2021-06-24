<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    /* BRANCHING */
    Route::get('/admin/dashboard', 'AdminController@index')->name('admin/dashboard');

    /* sub branch */
    Route::get('/admin/sub-branch', 'BranchController@subBranch')->name('admin/sub-branch');

    /* Menu */
    Route::get('/admin/menu', 'MenuController@getMenu')->name('admin/menu');
    Route::get('/admin/addmenu', 'MenuController@addMenu')->name('admin/addmenu');
    Route::post('/admin/insertmenu', 'MenuController@insertMenu')->name('admin/insertmenu');
    Route::get('/admin/editmenu/{id}', 'MenuController@editMenu')->name('admin/editmenu');
    Route::patch('/admin/updatemenu/{id}', 'MenuController@updateMenu')->name('admin/updatemenu');
    Route::delete('/admin/deletemenu/{id}', 'MenuController@deleteMenu')->name('admin/deletemenu');

    /* Sub Menu */
    Route::get('/admin/submenu/{id}', 'MenuController@getSubmenu')->name('admin/submenu');
    Route::get('/admin/addsubmenu/{id}', 'MenuController@addSubmenu')->name('admin/addsubmenu');
    Route::post('/admin/insertsubmenu', 'MenuController@insertSubmenu')->name('admin/insertsubmenu');
    Route::get('/admin/editsubmenu/{id}', 'MenuController@editSubmenu')->name('admin/editsubmenu');
    Route::patch('/admin/updatesubmenu/{id}', 'MenuController@updateSubmenu')->name('admin/updatesubmenu');
    Route::delete('/admin/deletesubmenu/{id}', 'MenuController@deleteSubmenu')->name('admin/deletesubmenu');

});
