<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [StudentController::class, 'index'])->name('index');
Route::post('/add-student', [StudentController::class, 'addStudent'])->name('add-student');
Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudent'])->name('delete-student');
Route::get('/edit-student/{id}', [StudentController::class, 'editStudent'])->name('edit-student');
Route::put('/student/update/{sid}', [StudentController::class, 'updateStudent'])->name('update-student');
