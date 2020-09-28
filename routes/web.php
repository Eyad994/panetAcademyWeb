<?php

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
/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/aboutUs', 'HomeController@aboutUs');
Route::get('/profile', 'HomeController@profile');
Route::get('/contact', 'HomeController@contact');
Route::get('/joinUs', 'HomeController@joinUs');
Route::get('major/{id}', 'HomeController@getCoursesByMajor');
Route::get('/userCourses', 'CourseController@userCourses');
Route::get('/getLectures/{id}/{lecture_id?}', 'CourseController@getLectures');
Route::get('university/{id}', 'HomeController@getCoursesByUniversity');
Route::get('search/{text}', 'HomeController@search');
Route::get('/termsAndConditions', 'HomeController@termsAndConditions');
Route::get('/privacyPolicy', 'HomeController@privacyPolicy');

/***************************************************************/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('registerDetails', 'AuthController@getRegisterDetails');
    Route::post('updateProfile', 'AuthController@updateProfile')->name('updateProfile');
});

Route::post('filters', 'HomeController@filters')->name('filters');
Route::get('topic/{topic_id}', 'CourseController@getCoursesByTopic');
Route::get('instructor/{instructor_id}', 'CourseController@getCoursesByInstructor');
Route::get('course/{course_id}', 'CourseController@getCourseDetails');
Route::get('course/{course_id}/lecture/{lecture_id}', 'CourseController@getLecture');

Route::post('contactUs', 'InformationController@contactUs');
Route::get('aboutUs', 'InformationController@aboutUs');
Route::get('termsAndServices', 'InformationController@termsAndServices');
Route::post('forgetPassword', 'AuthController@forget');
Route::get('settings', 'InformationController@settings');
Route::get('filtersPage', 'HomeController@filtersPage');

