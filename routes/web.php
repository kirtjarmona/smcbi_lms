<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->type == 'admin') {
        return redirect('/admin/dashboard');
    } elseif ($user->type == 'teacher') {
        return redirect('/teacher/dashboard');
    } elseif ($user->type == 'student') {
        return redirect('/student/dashboard');
    } else {
        return redirect('/');
    }
});

// register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create']);

// Login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);

// Admin dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'create']);
    Route::get('/users', [AdminController::class, 'admin_users'])->name('admin.admin_users');
    Route::get('/users/{id}', [AdminController::class, 'admin_users_id'])->name('admin.admin_users_id');
    Route::post('/users/update/{id}', [AdminController::class, 'admin_users_update']);
    Route::delete('/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.admin_delete');

});


// Teacher dashboard
Route::middleware(['auth', 'teacher'])->prefix('teacher')->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});

// Student dashboard
Route::middleware(['auth', 'student'])->prefix('student')->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
});



// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');