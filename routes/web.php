<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Livewire\Catalog;
use App\Http\Livewire\CatalogItem;
use App\Http\Livewire\WebhookConfirmation;

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

Route::get('/catalog', Catalog::class)->name('catalog');
Route::get('/catalog/item/{id}', CatalogItem::class);
Route::get('/webhook', WebhookConfirmation::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
