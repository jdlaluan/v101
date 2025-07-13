<?php

// use App\Livewire\Settings\Appearance;
// use App\Livewire\Settings\Password;
// use App\Livewire\Settings\Profile;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');






// Route::view('admin/dashboard', 'admin.dashboard')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.dashboard');

// Route::view('admin/test1', 'admin.test1')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test1');

// Route::view('admin/test2', 'admin.test2')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test2');

// Route::view('admin/test3', 'admin.test3')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test3');

// Route::view('admin/test4', 'admin.test4')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test4');






// Route::view('faculty/dashboard', 'faculty.dashboard')
//     ->middleware(['auth', 'verified', 'faculty'])
//     ->name('faculty.dashboard');

// Route::view('faculty/test1', 'faculty.test1')
//     ->middleware(['auth', 'verified', 'faculty'])
//     ->name('faculty.test1');

// Route::view('faculty/test2', 'faculty.test2')
//     ->middleware(['auth', 'verified', 'faculty'])
//     ->name('faculty.test2');

// Route::view('faculty/test3', 'faculty.test3')
//     ->middleware(['auth', 'verified', 'faculty'])
//     ->name('faculty.test3');





// Route::view('agency/dashboard', 'agency.dashboard')
//     ->middleware(['auth', 'verified', 'agency'])
//     ->name('agency.dashboard');

// Route::view('agency/test1', 'agency.test1')
//     ->middleware(['auth', 'verified', 'agency'])
//     ->name('agency.test1');

// Route::view('agency/test2', 'agency.test2')
//     ->middleware(['auth', 'verified', 'agency'])
//     ->name('agency.test2');

// Route::view('agency/test3', 'agency.test3')
//     ->middleware(['auth', 'verified', 'agency'])
//     ->name('agency.test3');







// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('test1', 'test1')
//     ->middleware(['auth', 'verified'])
//     ->name('test1');

// Route::view('test2', 'test2')
//     ->middleware(['auth', 'verified'])
//     ->name('test2');

// Route::view('test3', 'test3')
//     ->middleware(['auth', 'verified'])
//     ->name('test3');


// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Route::get('settings/profile', Profile::class)->name('settings.profile');
//     Route::get('settings/password', Password::class)->name('settings.password');
//     Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
// });

// require __DIR__.'/auth.php';










use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Routes for Admin Test pages
Route::view('admin/dashboard', 'admin.dashboard')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.dashboard');

// Removed admin/test1 as it's now a dropdown
// Route::view('admin/test1', 'admin.test1')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test1');

// New routes for Admin Records dropdown
Route::prefix('admin/records')->name('admin.records.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::view('semester-grading', 'admin.records.semester-grading')->name('semester-grading');
    Route::view('course-grade-level', 'admin.records.course-grade-level')->name('course-grade-level');
    Route::view('faculty', 'admin.records.faculty')->name('faculty');
    Route::view('student', 'admin.records.student')->name('student');
    Route::view('cooperating-agency', 'admin.records.cooperating-agency')->name('cooperating-agency');
});


Route::prefix('admin/enrollment')->name('admin.enrollment.')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::view('enrollment-form', 'admin.enrollment.enrollment-form')->name('enrollment-form');
    Route::view('list-enrolled', 'admin.enrollment.list-enrolled')->name('list-enrolled');
});

//safeee
Route::view('admin/test3', 'admin.test3')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin.test3');

// Route::view('admin/test4', 'admin.test4')
//     ->middleware(['auth', 'verified', 'admin'])
//     ->name('admin.test4');














// New routes for Faculty Test pages
Route::view('faculty/dashboard', 'faculty.dashboard')
    ->middleware(['auth', 'verified', 'faculty'])
    ->name('faculty.dashboard');

Route::view('faculty/test1', 'faculty.test1')
    ->middleware(['auth', 'verified', 'faculty'])
    ->name('faculty.test1');

Route::view('faculty/test2', 'faculty.test2')
    ->middleware(['auth', 'verified', 'faculty'])
    ->name('faculty.test2');

Route::view('faculty/test3', 'faculty.test3')
    ->middleware(['auth', 'verified', 'faculty'])
    ->name('faculty.test3');

// New routes for Agency Test pages
Route::view('agency/dashboard', 'agency.dashboard')
    ->middleware(['auth', 'verified', 'agency'])
    ->name('agency.dashboard');

Route::view('agency/test1', 'agency.test1')
    ->middleware(['auth', 'verified', 'agency'])
    ->name('agency.test1');

Route::view('agency/test2', 'agency.test2')
    ->middleware(['auth', 'verified', 'agency'])
    ->name('agency.test2');

Route::view('agency/test3', 'agency.test3')
    ->middleware(['auth', 'verified', 'agency'])
    ->name('agency.test3');


//New routes for Student Test pages
// Route::view('user/dashboard', 'user.dashboard')
//     ->middleware(['auth', 'verified', 'user'])
//     ->name('user.dashboard');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('test1', 'test1')
    ->middleware(['auth', 'verified'])
    ->name('test1');

Route::view('test2', 'test2')
    ->middleware(['auth', 'verified'])
    ->name('test2');

Route::view('test3', 'test3')
    ->middleware(['auth', 'verified'])
    ->name('test3');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
