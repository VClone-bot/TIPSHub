<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\InfosController;
use App\Http\Controllers\CoursController;
use App\Http\Controllers\NewsSubController;

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

/** AUTHENTIFICATION ROUTES */
Route::get('login', [UserAuthController::class, 'login'])->middleware('already_logged');
Route::post('check_auth', [UserAuthController::class, 'check'])->name('auth.check');

Route::get('register', [UserAuthController::class, 'register'])->middleware('already_logged');
Route::post('create_auth', [UserAuthController::class, 'create'])->name('auth.create');

Route::get('logout', [UserAuthController::class, 'logout'])->middleware('is_logged');

/** PUBLIC SECTION ROUTES */
Route::get('/', function () {
    return view('public_section.home');
});

Route::get('/dates', [EventsController::class, 'public_calendar']);

Route::get('/contacts', function () {
    return view('public_section.contacts');
});

Route::get('/alert_sub', function () {
    return view('public_section.news_sub');
});

Route::post('/add_sub', [NewsSubController::class, 'create'])->name('news_sub.add');

/** MEMBER SECTION ROUTES */
Route::get('/settings', function () {
    return view('member_section.settings');
})->middleware('is_logged');

// PARTIE COURS
Route::get('/cours', [CoursController::class, 'get_cours'])->middleware('is_logged');

// PARTIE SPECTACLES
Route::get('/equipes', function () {
    return view('member_section.section_spectacles.equipes');
})->middleware('is_logged');

// PARTIE VIE ASSOCIATIVE
Route::get('/calendrier', [EventsController::class, 'member_calendar'])->middleware('is_logged');

Route::get('/gazette', function () {
    return view('member_section.section_vieasso.gazette');
})->middleware('is_logged');

Route::get('/member_infos', function () {
    return view('member_section.section_vieasso.infos_membres');
})->middleware('is_logged');

/** OFFICE SECTION ROUTES */
Route::get('/office_infos', [InfosController::class, 'display_billets'])->middleware('is_logged');

Route::get('/manage_events', [EventsController::class, 'get_all_events'])->middleware('is_logged')->name('event.manage');
Route::get('/archived_events', [EventsController::class, 'get_all_archived_events'])->middleware('is_logged');

Route::get('/add_event', function () {
    return view('office_section.add_event');
})->middleware('is_logged');

Route::get('/get_event', [EventsController::class, 'get'])->middleware('is_logged')->name('event.get');
Route::post('/create_event', [EventsController::class, 'create'])->middleware('is_logged')->name('event.create');
Route::post('/delete_event', [EventsController::class, 'delete'])->middleware('is_logged')->name('event.del');
Route::post('/modify_eventpage', [EventsController::class, 'modify_page'])->middleware('is_logged')->name('event.modpage');
Route::post('/mod_event', [EventsController::class, 'modify'])->middleware('is_logged')->name('event.modify');
Route::post('/archive_event', [EventsController::class, 'archive'])->middleware('is_logged')->name('event.arc');
Route::post('/unarchive_event', [EventsController::class, 'unarchive'])->middleware('is_logged')->name('event.unarc');
Route::post('/publish_event', [EventsController::class, 'publish'])->middleware('is_logged')->name('event.publish');

Route::post('/add_info', [InfosController::class, 'create'])->middleware('is_logged')->name('info.create');
Route::post('/delete_info', [InfosController::class, 'delete'])->middleware('is_logged')->name('info.delete');

Route::get('/add_cours', [CoursController::class, 'add'])->middleware('is_logged');
Route::post('/create_cours', [CoursController::class, 'create'])->middleware('is_logged')->name('cours.create');

/** ADMIN SECTION ROUTES */
Route::get('/administration', function () {
    return view('admins_section.administration');
})->middleware('is_logged');



