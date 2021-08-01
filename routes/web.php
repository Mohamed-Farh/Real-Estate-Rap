<?php

use Illuminate\Support\Facades\Route;
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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('home');
    });

});

Route::get('/ar', 'Front\HomeController@home')->name('/ar/home');
Route::get('/en', 'Front\HomeController@home')->name('/en/home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

        Route::get('/home', 'Front\HomeController@home')->name('home');

        Route::get('/ar', 'Front\HomeController@home')->name('/ar/home');
    });

 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'admin']
    ], function () {


     //==============================dashboard============================
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');


    //============================== Admins ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('admins', 'AdminController');
    });
    //============================== Users ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('users', 'UserController');
    });
    //============================== Property ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('properties', 'PropertyController');

        Route::post('removeImage/{image}', 'PropertyController@removeImage')->name('removeImage');
        Route::GET('property/search', 'PropertyController@property_search')->name('property/search');
    });
    //============================== Category ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('categories', 'CategoryController');
    });

    //============================== Feature ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('features', 'FeatureController');
    });


    //============================== Feature ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('company_location', 'CompanyLocationController');
    });

    //============================== Feature ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('work_time', 'WorkTimeController');
    });


    //============================== Galleries/Blog ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('galleries', 'GalleryController');
        Route::GET('deleteimg', 'GalleryController@deleteimg')->name('deleteimg');

    });
    //============================== Galleries/Slider ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('sliders', 'SliderController');
    });
    //============================== Socials ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('socials', 'SocialController');

        Route::get('contactus_index', 'SocialController@contactus_index')->name('contactus_index');
        Route::post('contactus/visible', 'SocialController@contactus_visible')->name('contactus/visible');
    });
    //============================== About US ============================
    Route::group(['namespace' => 'Front'], function () {

        Route::resource('aboutus', 'AboutusController');
    });
    //============================== News ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('news', 'NewsController');
    });
    //============================== Jobs ============================
    Route::group(['namespace' => 'admin'], function () {

        Route::resource('company_jobs', 'Company_JobController');

        Route::post('visible', 'Company_JobController@visible')->name('visible');

    });




    //==============================dashboard============================
    Route::group(['namespace' => 'Grades'], function () {
        Route::resource('Grades', 'GradeController');
    });

    //==============================Classrooms============================
    Route::group(['namespace' => 'Classrooms'], function () {
        Route::resource('Classrooms', 'ClassroomController');
        Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');

        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });



    Route::post('/unlink-file', array(
        'middleware' => 'csrf',
        'as'     => 'unlink-file',
        'uses'   => 'FilesController@unlinkImage'
     ));


});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
        /*
        |--------------------------------------------------------------------------
        | Web Routes
        |--------------------------------------------------------------------------
        |
        | Here is where you can register web routes for your application. These
        | routes are loaded by the RouteServiceProvider within a group which
        | contains the "web" middleware group. Now create something great!
        |
        |This Routes Related To Front
        */

        Route::group(['namespace' => 'Front'], function () {

            Route::get('front/contactus', 'ContactController@contactus')->name('front/contactus');
            Route::post('contactus/send_message', 'ContactController@send_message')->name('contactus/send_message');
            Route::get('contactus/messages_index', 'ContactController@messages_index')->name('contactus/messages_index');
            Route::post('contactus/messages_delete', 'ContactController@messages_delete')->name('contactus/messages_delete');
            Route::post('contactus/messages_read', 'ContactController@messages_read')->name('contactus/messages_read');

            Route::get('/job_seeker', 'JobController@job_seeker')->name('job_seeker');
            Route::post('jobs/send_cv', 'JobController@send_cv')->name('jobs/send_cv');
            Route::get('job_messages', 'JobController@job_messages_index')->name('job_messages');
            Route::post('jobs/messages_delete', 'JobController@messages_delete')->name('jobs/messages_delete');
            Route::post('jobs/messages_read', 'JobController@messages_read')->name('jobs/messages_read');





            Route::get('home/aboutus', 'FrontPagesController@aboutus')->name('front/aboutus');

            Route::get('home/available_projects', 'FrontPagesController@available_projects')->name('available_projects');

            Route::get('home/previous_projects', 'FrontPagesController@previous_projects')->name('previous_projects');

            //This Route Related To Show One Property page
            Route::get('/show_properties/{title_en}', 'FrontPagesController@single_property');


            Route::get('home/gallery', 'FrontPagesController@gallery');

            Route::get('all_properties', 'FrontPagesController@all_properties')->name('all_properties');

            Route::get('search', 'FrontPagesController@search');

            Route::get('home/news', 'FrontPagesController@news')->name('news');
            //This Route Related To Show One Property page
            Route::get('/show_news/{head_en}', 'FrontPagesController@news_details');


            Route::post('sign_in', 'FrontPagesController@sign_in')->name('sign_in');



            Route::get('search_page', 'FrontPagesController@search_page');

            Route::GET('/home/search', 'FrontPagesController@home_search')->name('/home/search');

        });




});
