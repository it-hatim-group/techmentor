<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleAndPermission\PermissionController;
use App\Http\Controllers\RoleAndPermission\RoleController;
use App\Http\Controllers\SoftwareSettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\MenteeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public route
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::post('/register/mentor', [RegistrationController::class, 'mentor'])->name('register.mentor');
Route::post('/register/mentee', [RegistrationController::class, 'mentee'])->name('register.mentee');
Route::post('/register/organization', [RegistrationController::class, 'organization'])->name('register.organization');
Route::post('/contact/store', [RegistrationController::class, 'contact'])->name('contact.store');

Route::get('/login', function () {
    return view('auth.login');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('permission:Dashboard View')->name('dashboard');

    // Mentor
    Route::get('/mentors', [MentorController::class, 'index'])->middleware('permission:Mentors')->name('mentor.index');
    Route::delete('/mentors/{id}', [MentorController::class, 'destroy'])->name('mentors.destroy');

    // Mentee
    Route::get('/mentees', [MenteeController::class, 'index'])->middleware('permission:Mentees')->name('mentee.index');
    Route::delete('/mentees/{id}', [MenteeController::class, 'destroy'])->name('mentees.destroy');

    // Organization
    Route::get('/organizations', [OrganizationController::class, 'index'])->middleware('permission:Organizations')->name('organization.index');
    Route::delete('/organizations/{id}', [OrganizationController::class, 'destroy'])->name('organizations.destroy');

    // Contact Controller 
    Route::get('/contacts', [ContactController::class, 'index'])->middleware('permission:Contacts')->name('contact.index');
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->middleware('permission:Contacts')->name('contacts.destroy');

    // Roles
    Route::get('/roles', [RoleController::class, 'index'])->middleware('permission:Roles View')->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->middleware('permission:Roles Create')->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('permission:Roles Create')->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->middleware('permission:Roles Edit')->name('roles.edit');
    Route::put('/roles/{id}', [RoleController::class, 'update'])->middleware('permission:Roles Edit')->name('roles.update');
    Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->middleware('permission:Roles Delete')->name('roles.destroy');

    // Permissions
    Route::get('/permissions', [PermissionController::class, 'index'])->middleware('permission:Permissions View')->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->middleware('permission:Permissions Create')->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->middleware('permission:Permissions Create')->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->middleware('permission:Permissions Edit')->name('permissions.edit');
    Route::put('/permissions/{id}', [PermissionController::class, 'update'])->middleware('permission:Permissions Edit')->name('permissions.update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'destroy'])->middleware('permission:Permissions Delete')->name('permissions.destroy');

    // Users
    Route::get('/users', [UserController::class, 'index'])->middleware('permission:Users View')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->middleware('permission:Users Create')->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->middleware('permission:Users Create')->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('permission:Users Edit')->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('permission:Users Edit')->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('permission:Users Delete')->name('users.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware('permission:Profile View')->name('profile.edit');
    Route::patch('/update-profile-basic-information/{id}', [UserController::class, 'updateProfileBasicInformation'])->name('profile.updateProfileBasicInformation');
    Route::patch('/update-profile-image', [UserController::class, 'updateProfileImage'])->name('profile.updateProfileImage');
    Route::patch('/profile', [ProfileController::class, 'update'])->middleware('permission:Profile Edit')->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->middleware('permission:Profile Delete')->name('profile.destroy');

    // Settings
    Route::get('/settings', [SoftwareSettingController::class, 'edit'])->middleware('permission:Settings View')->name('settings.edit');
    Route::post('/settings', [SoftwareSettingController::class, 'update'])->middleware('permission:Settings Edit')->name('settings.update');
});

require __DIR__ . '/auth.php';
