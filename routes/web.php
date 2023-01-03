<?php


use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\v2\AuthController as V2AuthController;
use App\Http\Controllers\v2\ClassroomController as V2ClassroomController;
use App\Http\Controllers\v2\EmployeeController as V2EmployeeController;
use App\Http\Controllers\v2\ResultController as V2ResultController;
use App\Http\Controllers\v2\StudentController as V2StudentController;
use App\Http\Controllers\v2\SubjectController as V2SubjectController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('welcome');
Route::get('/contact-us', [WebsiteController::class, 'contactUs']);
Route::get('/our-teachers', [WebsiteController::class, 'ourTeachers']);
Route::get('/about-us', [WebsiteController::class, 'aboutUs']);
Route::get('/testimonials', [WebsiteController::class, 'testimonials']);
Route::get('/gallery', [WebsiteController::class, 'gallery']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('auth/login', [V2AuthController::class, 'showLoginForm'])->name('custom.login');
Route::post('auth/login', [V2AuthController::class, 'login'])->name('custom.login.submit');


Route::resource('employees', V2EmployeeController::class)->middleware('admin');

Route::resource('subjects', V2SubjectController::class)->middleware('admin');

Route::resource('classrooms', V2ClassroomController::class)->middleware('admin');

Route::resource('students', V2StudentController::class)->middleware('admin');

Route::resource('/results', V2ResultController::class)->middleware('admin');

Route::get('/student/{student}', [V2StudentController::class, 'show'])->name('my.student.show');

Route::get('/result/{result}', [V2ResultController::class, 'show'])->name('my.result.show');

Route::get('/download-result/{result}', [V2ResultController::class, 'download'])->name('my.result.pdf');

