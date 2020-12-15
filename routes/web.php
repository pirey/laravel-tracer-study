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

use App\Exports\TracerStudyExport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return redirect('/tracer-study-submission');
});

Route::livewire('/tracer-study-submission', 'tracer-study-submission')->layout('layouts.site');


Route::get('/admin/tracer-studies/download', function () {
    return Excel::download(new TracerStudyExport, 'tracer-studies.xlsx');
});
Route::livewire('/admin/tracer-studies', 'admin.tracer-study-list')->layout('layouts.admin');
Route::livewire('/admin/tracer-studies/{tracer_study}', 'admin.tracer-study-detail')->layout('layouts.admin');
