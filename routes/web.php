<?php

use App\Http\Controllers\AdmissionPageController;
use App\Http\Controllers\AdmissionSeniorHighController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */
Route::middleware(['guest'])->group(function () {
	/*
		|--------------------------------------------------------------------------
		| Route for the main page of the admisssion
		|--------------------------------------------------------------------------
	*/
	Route::get('/', [AdmissionPageController::class, 'index'])->name('application.index');
	/*
		|--------------------------------------------------------------------------
		| Registered route for Senior High School Online Application
		|--------------------------------------------------------------------------
	*/
	Route::prefix('senior-high-school')->group(function () {
		Route::get('/registration', [AdmissionSeniorHighController::class, 'create'])->name('application.form');
		Route::post('/registration/store', [AdmissionSeniorHighController::class, 'store'])
			->name('application.store');
	});
});