<?php

use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Common Resources Router:Naming Convention:
| index() - Show all data
| show() - Show single data
| create() - Show form to create new data
| store() - Store data submit in form
| edit() - Show form to edit existing data
| update() - Save the changes in form updated
|  destroy() - Delete existing data
 */

/**
 * Registered route for Senior High School Online Application
 */
Route::middleware(['guest'])->group(function () {
	Route::prefix('senior-high-school')->group(function () {
		// To show the application form
		Route::get('/registration', [AdmissionController::class, 'create'])->name('application.form');
		Route::post('/registration/store', [AdmissionController::class, 'store'])
			->name('application.store');
	});
});