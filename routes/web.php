<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| 
| In other wordings,
| middlewares and middleware groups are defined in Kernel.php
| Out of which all the entries in array $middleware and $middlewareGroups['web'] are called.
| Below that, there are some middlewares provided by Laravel in array $routeMiddlewares
| We need to execute a middleware by the key 'auth' which is added for this route explicitely.
|
| Note:
| When we include 'auth' middleware, if no guard is mentioned, the default guard is also considered, which is 'web'.
| Refer to config\Auth.php for this.
| The code for this can be found in Illuminate\Auth\AuthManager.php
| Also,
| When we include 'auth' middleware, for unauthenticated attempt, it looks for a 'login' controller (by default)
*/

Route::redirect('/', '/login', 301);
Route::view('/login', 'login')->name('login');
Route::post('/login', LoginController::class);
Route::middleware(['auth'])->group(function () {
    Route::view('/welcome', 'welcome')->name('welcome');
});