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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('contact-methods')->name('contact-methods/')->group(static function () {
            Route::get('/',                                             'ContactMethodsController@index')->name('index');
            Route::get('/create',                                       'ContactMethodsController@create')->name('create');
            Route::post('/',                                            'ContactMethodsController@store')->name('store');
            Route::get('/{contactMethod}/edit',                         'ContactMethodsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ContactMethodsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{contactMethod}',                             'ContactMethodsController@update')->name('update');
            Route::delete('/{contactMethod}',                           'ContactMethodsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('disabilities')->name('disabilities/')->group(static function () {
            Route::get('/',                                             'DisabilitiesController@index')->name('index');
            Route::get('/create',                                       'DisabilitiesController@create')->name('create');
            Route::post('/',                                            'DisabilitiesController@store')->name('store');
            Route::get('/{disability}/edit',                            'DisabilitiesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DisabilitiesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disability}',                                'DisabilitiesController@update')->name('update');
            Route::delete('/{disability}',                              'DisabilitiesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('companies')->name('companies/')->group(static function () {
            Route::get('/',                                             'CompaniesController@index')->name('index');
            Route::get('/create',                                       'CompaniesController@create')->name('create');
            Route::post('/',                                            'CompaniesController@store')->name('store');
            Route::get('/{company}/edit',                               'CompaniesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CompaniesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{company}',                                   'CompaniesController@update')->name('update');
            Route::delete('/{company}',                                 'CompaniesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('languages')->name('languages/')->group(static function () {
            Route::get('/',                                             'LanguagesController@index')->name('index');
            Route::get('/create',                                       'LanguagesController@create')->name('create');
            Route::post('/',                                            'LanguagesController@store')->name('store');
            Route::get('/{language}/edit',                              'LanguagesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LanguagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{language}',                                  'LanguagesController@update')->name('update');
            Route::delete('/{language}',                                'LanguagesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('education-levels')->name('education-levels/')->group(static function () {
            Route::get('/',                                             'EducationLevelsController@index')->name('index');
            Route::get('/create',                                       'EducationLevelsController@create')->name('create');
            Route::post('/',                                            'EducationLevelsController@store')->name('store');
            Route::get('/{educationLevel}/edit',                        'EducationLevelsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EducationLevelsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{educationLevel}',                            'EducationLevelsController@update')->name('update');
            Route::delete('/{educationLevel}',                          'EducationLevelsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('call-types')->name('call-types/')->group(static function () {
            Route::get('/',                                             'CallTypesController@index')->name('index');
            Route::get('/create',                                       'CallTypesController@create')->name('create');
            Route::post('/',                                            'CallTypesController@store')->name('store');
            Route::get('/{callType}/edit',                              'CallTypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CallTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{callType}',                                  'CallTypesController@update')->name('update');
            Route::delete('/{callType}',                                'CallTypesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('positions')->name('positions/')->group(static function () {
            Route::get('/',                                             'PositionController@index')->name('index');
            Route::get('/create',                                       'PositionController@create')->name('create');
            Route::post('/',                                            'PositionController@store')->name('store');
            Route::get('/{position}/edit',                              'PositionController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PositionController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{position}',                                  'PositionController@update')->name('update');
            Route::delete('/{position}',                                'PositionController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('calls')->name('calls/')->group(static function () {
            Route::get('/',                                             'CallsController@index')->name('index');
            Route::get('/create',                                       'CallsController@create')->name('create');
            Route::post('/',                                            'CallsController@store')->name('store');
            Route::get('/{call}/edit',                                  'CallsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CallsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{call}',                                      'CallsController@update')->name('update');
            Route::delete('/{call}',                                    'CallsController@destroy')->name('destroy');
        });
    });
});
