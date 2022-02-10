<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

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
    return view('welcome');
});

Route::get('/softdelete',function()
{
    User::find(4)->delete();
});

Route::get('/users', function()
{
    $users = User::all();
    // $users = User::find(1);
    // $users = User::withTrashed()->get();
    $users = User::onlyTrashed()->get();
    dd($users);
    
});

Route::get('/restore', function()
{
    User::onlyTrashed()->find(2)->restore();
});

Route::get('/forcedelete', function()
{
    User::find(1)->forceDelete();

});