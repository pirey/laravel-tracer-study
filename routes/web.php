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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/tracer-study-submission');
});

Route::livewire('/tracer-study-submission', 'tracer-study-submission')->layout('layouts.site');

Route::livewire('/admin/tracer-studies', 'admin.tracer-study-list')->layout('layouts.admin');
Route::livewire('/admin/tracer-studies/{tracer_study}', 'admin.tracer-study-detail')->layout('layouts.admin');
