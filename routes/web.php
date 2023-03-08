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
    return view('brackets/admin-auth::admin.auth.login');
});

Route::get('/{key}', 'App\Http\Controllers\Admin\HomeController@index');
//Route::get('/{id}', 'App\Http\Controllers\Admin\HomeController@index');
//Route::get('/{pin}', 'App\Http\Controllers\Admin\HomeController@index');


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
        Route::prefix('workflows')->name('workflows/')->group(static function () {
            Route::get('/',                                             'WorkflowsController@index')->name('index');
            Route::get('/create',                                       'WorkflowsController@create')->name('create');
            Route::post('/',                                            'WorkflowsController@store')->name('store');
            Route::get('/{workflow}/edit',                              'WorkflowsController@edit')->name('edit');
            Route::get('/{workflow}/show',                              'WorkflowsController@show')->name('show');
            Route::post('/bulk-destroy',                                'WorkflowsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{workflow}',                                  'WorkflowsController@update')->name('update');
            Route::delete('/{workflow}',                                'WorkflowsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('workflow-states')->name('workflow-states/')->group(static function () {
            Route::get('/',                                             'WorkflowStatesController@index')->name('index');
            Route::get('/create/{workflow}',                            'WorkflowStatesController@create')->name('create');
            Route::post('/',                                            'WorkflowStatesController@store')->name('store');
            Route::get('/{workflowState}/edit',                         'WorkflowStatesController@edit')->name('edit');
            Route::get('/{workflowState}/show/{workflow}',              'WorkflowStatesController@show')->name('show');
            Route::post('/bulk-destroy',                                'WorkflowStatesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{workflowState}',                             'WorkflowStatesController@update')->name('update');
            Route::delete('/{workflowState}',                           'WorkflowStatesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tasks')->name('tasks/')->group(static function () {
            Route::get('/',                                             'TasksController@index')->name('index');
            Route::get('/create',                                       'TasksController@create')->name('create');
            Route::post('/',                                            'TasksController@store')->name('store');
            Route::get('/{task}/edit',                                  'TasksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TasksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{task}',                                      'TasksController@update')->name('update');
            Route::delete('/{task}',                                    'TasksController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('workflow-navigations')->name('workflow-navigations/')->group(static function () {
            Route::get('/',                                             'WorkflowNavigationController@index')->name('index');
            Route::get('/create/{workflow}/{workflowState}',            'WorkflowNavigationController@create')->name('create');
            Route::post('/',                                            'WorkflowNavigationController@store')->name('store');
            Route::get('/{workflowNavigation}/edit',                    'WorkflowNavigationController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'WorkflowNavigationController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{workflowNavigation}',                        'WorkflowNavigationController@update')->name('update');
            Route::delete('/{workflowNavigation}',                      'WorkflowNavigationController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('applications')->name('applications/')->group(static function () {
            Route::get('/',                                             'ApplicationsController@index')->name('index');
            Route::get('/{application}/show',                           'ApplicationsController@show');

            //historial
            Route::get('/history/{id}',                                 'ApplicationsController@history');

            Route::get('/{application}/create',                         'ApplicationsController@create')->name('create');
            Route::get('/{application}/{task}/edit',                    'ApplicationsController@edit')->name('edit');
            Route::post('/',                                            'ApplicationsController@store')->name('store');
            Route::post('/{task}',                                      'ApplicationsController@update')->name('store');
            Route::get('/{state_id}/cities',                            'ApplicationsController@cities')->name('cities');
            Route::get('/{task}/{workflowState}/transition',            'ApplicationsController@transition');
            Route::get('/{task}/pdf',                                   'ApplicationsController@getPdf');
            Route::get('/{task}/pdfc',                                  'ApplicationsController@getPdfc');
            // Route::get('/{application}/crear',                          'ApplicationsController@crear')->name('crear');
            //Route::get('/guardar',                                     'ApplicationsController@guardar')->name('guardar');
            // Route::get('/{application}/showD',                          'ApplicationsController@showD');
            /*Route::post('/bulk-destroy',                                'ProjectController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{visit}',                                     'ProjectController@update')->name('update');
            Route::delete('/{visit}',                                   'ProjectController@destroy')->name('destroy');*/
        });
    });
});


//Cities
//Route::get('applications/{state_id?}/cities', 'App\Http\Controllers\Admin\ResumesController@cities');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('application-statuses')->name('application-statuses/')->group(static function () {
            Route::get('/',                                             'ApplicationStatusesController@index')->name('index');
            Route::get('/create',                                       'ApplicationStatusesController@create')->name('create');
            Route::post('/',                                            'ApplicationStatusesController@store')->name('store');
            Route::post('/history',                                     'ApplicationStatusesController@storeHistory')->name('storeHistory');
            Route::get('/{applicationStatus}/edit',                     'ApplicationStatusesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ApplicationStatusesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{applicationStatus}',                         'ApplicationStatusesController@update')->name('update');
            Route::delete('/{applicationStatus}',                       'ApplicationStatusesController@destroy')->name('destroy');
        });
    });
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
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('categories')->name('categories/')->group(static function() {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('roles')->name('roles/')->group(static function() {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});
