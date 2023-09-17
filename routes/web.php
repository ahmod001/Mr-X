<?php

use App\Http\Controllers\contactController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\projectsController;
use App\Http\Controllers\resumeController;
use Illuminate\Support\Facades\Route;

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

// Web Routes
Route::get('/', [homeController::class, 'getPage']);
Route::get('/resume', [resumeController::class, 'getPage']);
Route::get('/projects', [projectsController::class, 'getPage']);
Route::get('/contact', [contactController::class, 'getPage']);


// Ajax Route 
Route::controller(homeController::class)->group(function () {
    Route::get('/heroData', 'getHeroData');
    Route::get('/aboutData', 'getAboutData');
    Route::get('/socialData', 'getSocialData');
});

Route::controller(resumeController::class)->group(function () {
    Route::get('/resumeLink', 'getResumeLink');
    Route::get('/experiencesData', 'getExperiencesData');
    Route::get('/educationData', 'getEducationData');
    Route::get('/skillsData', 'getSkillsData');
    Route::get('/languageData', 'getLanguageData');
});

Route::get('/projectsData', [projectsController::class, 'getProjectsData']);
Route::post('/contactRequest', [contactController::class, 'contactRequest']);