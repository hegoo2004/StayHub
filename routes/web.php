<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/', [AdminController::class, 'home']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);
Route::get('/view_room', [AdminController::class, 'view_room']);
Route::get('/room_delete/{id}', [AdminController::class, 'room_delete']);
Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
Route::post('/edit_room/{id}', [AdminController::class, 'edit_room']);
Route::get('room_details{id}', [HomeControllerclass, 'room_details']);
Routepost('add_booking{id}', [HomeControllerclass, 'add_booking']);


Route::get('bookings', [AdminControllerclass, 'bookings']);


Route::get('cancel_booking{id}', [AdminControllerclass, 'cancel_booking']);
Route::get('approve_booking{id}', [AdminControllerclass, 'approve_booking']);
Route::get('reject_booking{id}', [AdminControllerclass, 'reject_booking']);
Route::get('view_gallery', [AdminControllerclass, 'view_gallery']);
Route::post('upload_gallery', [AdminControllerclass, 'upload_gallery']);
Route::get('delete_gallery{id}', [AdminControllerclass, 'delete_gallery']);





