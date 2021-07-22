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
    return view('auth.login');
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
        Route::prefix('positions')->name('positions/')->group(static function () {
            Route::get('/',                                             'PositionController@index')->name('index');
            Route::get('/create',                                       'PositionController@create')->name('create');
            Route::post('/',                                            'PositionController@store')->name('store');
            Route::get('/{position}/show',                              'PositionController@show')->name('show');
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
        Route::prefix('disengagement-reasons')->name('disengagement-reasons/')->group(static function () {
            Route::get('/',                                             'DisengagementReasonsController@index')->name('index');
            Route::get('/create',                                       'DisengagementReasonsController@create')->name('create');
            Route::post('/',                                            'DisengagementReasonsController@store')->name('store');
            Route::get('/{disengagementReason}/edit',                   'DisengagementReasonsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DisengagementReasonsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{disengagementReason}',                       'DisengagementReasonsController@update')->name('update');
            Route::delete('/{disengagementReason}',                     'DisengagementReasonsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('language-levels')->name('language-levels/')->group(static function () {
            Route::get('/',                                             'LanguageLevelsController@index')->name('index');
            Route::get('/create',                                       'LanguageLevelsController@create')->name('create');
            Route::post('/',                                            'LanguageLevelsController@store')->name('store');
            Route::get('/{languageLevel}/edit',                         'LanguageLevelsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LanguageLevelsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{languageLevel}',                             'LanguageLevelsController@update')->name('update');
            Route::delete('/{languageLevel}',                           'LanguageLevelsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('ethnic-groups')->name('ethnic-groups/')->group(static function () {
            Route::get('/',                                             'EthnicGroupsController@index')->name('index');
            Route::get('/create',                                       'EthnicGroupsController@create')->name('create');
            Route::post('/',                                            'EthnicGroupsController@store')->name('store');
            Route::get('/{ethnicGroup}/edit',                           'EthnicGroupsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EthnicGroupsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{ethnicGroup}',                               'EthnicGroupsController@update')->name('update');
            Route::delete('/{ethnicGroup}',                             'EthnicGroupsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('requirement-types')->name('requirement-types/')->group(static function () {
            Route::get('/',                                             'RequirementTypesController@index')->name('index');
            Route::get('/create',                                       'RequirementTypesController@create')->name('create');
            Route::post('/',                                            'RequirementTypesController@store')->name('store');
            Route::get('/{requirementType}/edit',                       'RequirementTypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RequirementTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{requirementType}',                           'RequirementTypesController@update')->name('update');
            Route::delete('/{requirementType}',                         'RequirementTypesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('requirements')->name('requirements/')->group(static function () {
            Route::get('/',                                             'RequirementsController@index')->name('index');
            Route::get('/create',                                       'RequirementsController@create')->name('create');
            Route::post('/',                                            'RequirementsController@store')->name('store');
            Route::get('/{requirement}/edit',                           'RequirementsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RequirementsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{requirement}',                               'RequirementsController@update')->name('update');
            Route::delete('/{requirement}',                             'RequirementsController@destroy')->name('destroy');
        });
    });
});


//Rutas Postulantes
Auth::routes();

Route::get('auth/google', 'App\Http\Controllers\Applicant\LoginController@redirectToGoogle')->name('auth.google');
Route::get('auth/google/callback', 'App\Http\Controllers\Applicant\LoginController@handleGoogleCallback');

Route::get('/home', 'App\Http\Controllers\Applicant\HomeController@index');
//Resume
Route::get('/resume', 'App\Http\Controllers\Admin\ResumesController@index');
Route::get('/resume/create', 'App\Http\Controllers\Admin\ResumesController@create');
Route::get('/resume/{resume}/edit', 'App\Http\Controllers\Admin\ResumesController@edit');
Route::post('/resume/{resume}/update', 'App\Http\Controllers\Admin\ResumesController@update')->name('update');

//Resume Academic Training
Route::get('/resume/{resume}/academic-training/create', 'App\Http\Controllers\Admin\AcademicTrainingController@create');

//Resume Language Level
Route::get('/resume/{resume}/language-level-resumes/create', 'App\Http\Controllers\Admin\LanguageLevelResumesController@create');

Route::get('/resume/{id}/identificaciones', 'App\Http\Controllers\Admin\ResumesController@getIdentificaciones')->name('identificaciones');
Route::post('/resume', 'App\Http\Controllers\Admin\ResumesController@store')->name('store');

//Call
Route::get('/calls', 'App\Http\Controllers\Applicant\HomeController@homeCalls');
//Applications
Route::get(
    '/applications',
    function () {
        return view('applicant.applications.index');
    }
);
//Reports
Route::get('/reports', function () {
    return view('applicant.reports.index');
});
/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('resumes')->name('resumes/')->group(static function () {
            Route::get('/',                                             'ResumesController@index')->name('index');
            Route::get('/create',                                       'ResumesController@create')->name('create');
            Route::post('/',                                            'ResumesController@store')->name('store');
            Route::get('/{resume}/edit',                                'ResumesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ResumesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{resume}',                                    'ResumesController@update')->name('update');
            Route::get('/{id}/hadbenefit',                              'ResumesController@hadBenefit')->name('hadbenefit');
            Route::delete('/{resume}',                                  'ResumesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('academic-states')->name('academic-states/')->group(static function () {
            Route::get('/',                                             'AcademicStatesController@index')->name('index');
            Route::get('/create',                                       'AcademicStatesController@create')->name('create');
            Route::post('/',                                            'AcademicStatesController@store')->name('store');
            Route::get('/{academicState}/edit',                         'AcademicStatesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AcademicStatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{academicState}',                             'AcademicStatesController@update')->name('update');
            Route::delete('/{academicState}',                           'AcademicStatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('academic-trainings')->name('academic-trainings/')->group(static function () {
            Route::get('/',                                             'AcademicTrainingController@index')->name('index');
            Route::get('/create',                                       'AcademicTrainingController@create')->name('create');
            Route::post('/',                                            'AcademicTrainingController@store')->name('store');
            Route::get('/{academicTraining}/edit',                      'AcademicTrainingController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AcademicTrainingController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{academicTraining}',                          'AcademicTrainingController@update')->name('update');
            Route::delete('/{academicTraining}',                        'AcademicTrainingController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('language-level-resumes')->name('language-level-resumes/')->group(static function () {
            Route::get('/',                                             'LanguageLevelResumesController@index')->name('index');
            Route::get('/create',                                       'LanguageLevelResumesController@create')->name('create');
            Route::post('/',                                            'LanguageLevelResumesController@store')->name('store');
            Route::get('/{languageLevelResume}/edit',                   'LanguageLevelResumesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LanguageLevelResumesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{languageLevelResume}',                       'LanguageLevelResumesController@update')->name('update');
            Route::delete('/{languageLevelResume}',                     'LanguageLevelResumesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('end-reasons')->name('end-reasons/')->group(static function() {
            Route::get('/',                                             'EndReasonController@index')->name('index');
            Route::get('/create',                                       'EndReasonController@create')->name('create');
            Route::post('/',                                            'EndReasonController@store')->name('store');
            Route::get('/{endReason}/edit',                             'EndReasonController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'EndReasonController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{endReason}',                                 'EndReasonController@update')->name('update');
            Route::delete('/{endReason}',                               'EndReasonController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('work-experiences')->name('work-experiences/')->group(static function() {
            Route::get('/',                                             'WorkExperienceController@index')->name('index');
            Route::get('/create',                                       'WorkExperienceController@create')->name('create');
            Route::post('/',                                            'WorkExperienceController@store')->name('store');
            Route::get('/{workExperience}/edit',                        'WorkExperienceController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WorkExperienceController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{workExperience}',                            'WorkExperienceController@update')->name('update');
            Route::delete('/{workExperience}',                          'WorkExperienceController@destroy')->name('destroy');
        });
    });
});