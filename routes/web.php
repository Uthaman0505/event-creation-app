<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\UserChangePasswordController;
use App\Http\Controllers\UserCreateController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEventComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Management\ManagementDashboardComponent;
use App\Http\Livewire\Management\ManagementEventComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserEventComponent;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',  HomeComponent::class);

// Auth::routes(['verify' => true]);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


// For user or management
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/change-password/{id}', [UserChangePasswordController::class, 'change_password'])->name('user.change-password');
    Route::post('/user/change-password', [UserChangePasswordController::class, 'saveNewPassword'])->name('user.store.newpassword');
    Route::get('/user/dashboard/events', UserEventComponent::class)->name('user.dashboard.events');
    Route::get('/user/dashboard/events/add', [EventController::class, 'addEvent'])->name('user.event.add');
    Route::get('/user/edit-event/{id}', [EventController::class, 'editEvent'])->name('user.event.edit');
    // Route::post('/user/dashboard/events/add', [EventController::class, 'storeEvent'])->name('user.event.store');
});

// For Management

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route::get('/',  ManagementEventComponent::class);
    Route::get('/management/dashboard', ManagementDashboardComponent::class)->name('management.dashboard');
    Route::get('/management/dashboard/users', AdminUserComponent::class)->name('management.dashboard.users');
    Route::get('/management/dashboard/users/add', [UserCreateController::class, 'create'])->name('management.user.add');
    Route::post('/management/dashboard/users/add', [UserCreateController::class, 'storeUser'])->name('management.user.store');
    Route::get('/management/edit-user/{id}', [UserCreateController::class, 'editUser'])->name('management.edit');
    Route::post('/management/update-user', [UserCreateController::class, 'updateUser'])->name('management.update');
    Route::get('/management/dashboard/events', ManagementEventComponent::class)->name('management.dashboard.events');
    Route::get('/management/dashboard/events/add', [EventController::class, 'addEvent'])->name('management.event.add');
    Route::post('/management/dashboard/events/add', [EventController::class, 'storeEvent'])->name('management.event.store');
    Route::get('/management/edit-event/{id}', [EventController::class, 'editEvent'])->name('management.event.edit');
    Route::put('/management/update-event', [EventController::class, 'updateEvent'])->name('management.event.update');
});

// For Admin 
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    // Route::get('/admin',  AdminEventComponent::class);
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/dashboard/users', AdminUserComponent::class)->name('admin.dashboard.users');
    Route::get('/admin/dashboard/users/add', [UserCreateController::class, 'create'])->name('admin.user.add');
    Route::post('/admin/dashboard/users/add', [UserCreateController::class, 'storeUser'])->name('admin.user.store');
    Route::get('/admin/edit-user/{id}', [UserCreateController::class, 'editUser'])->name('user.edit');
    Route::post('/admin/update-user', [UserCreateController::class, 'updateUser'])->name('user.update');
    Route::get('/admin/delete-user/{id}', [UserCreateController::class, 'deleteUser'])->name('user.delete');
    Route::get('/admin/dashboard/events', AdminEventComponent::class)->name('admin.dashboard.events');
    Route::get('/admin/dashboard/events/add', [EventController::class, 'addEvent'])->name('admin.event.add');
    Route::post('/admin/dashboard/events/add', [EventController::class, 'storeEvent'])->name('admin.event.store');
    Route::get('/admin/edit-event/{id}', [EventController::class, 'editEvent'])->name('event.edit');
    Route::put('/admin/update-event', [EventController::class, 'updateEvent'])->name('event.update');
    Route::get('/admin/delete-event/{id}', [EventController::class, 'deleteEvent'])->name('event.delete');
});
