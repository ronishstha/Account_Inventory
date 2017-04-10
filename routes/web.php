<?php

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

//------------------------Login-------------------------------------------

Route::get('login', [
    'uses' => 'UsersController@getLogin',
    'as'   => 'admin.login.get'
]);

Route::post('login', [
    'uses' => 'UsersController@postLogin',
    'as'  => 'admin.login.post'
]);

//--------------------------end of login----------------------------------


Route::group(['middleware' => 'auth'], function() {

    Route::get('/change-password', function () {
        return view('change_password');
    })->name('changepassword');

    Route::post('/change-password/update', [
        'uses' => 'UsersController@changePassword',
        'as'   => 'update.password'
    ]);

    Route::get('/', [
       'uses' => 'DashboardsController@getDashboard',
        'as' => 'dashboard'
    ]);

    Route::get('/calendar', function () {
        return view('calendar');
    })->name('calendar');

    Route::get('/formbasic', function () {
        return view('formbasic');
    })->name('formbas');

    Route::get('/formwizard', function () {
        return view('formwiz');
    })->name('formwiz');

    Route::get('/formvalidate', function () {
        return view('formval');
    })->name('formval');

    Route::get('/chat', function () {
        return view('chat');
    })->name('chat');

    Route::get('/widgets', function () {
        return view('widgets');
    })->name('widgets');

    Route::get('/tables', function () {
        return view('tables');
    })->name('tables');

    Route::get('/grid', function () {
        return view('grid');
    })->name('grid');

    Route::get('/charts', function () {
        return view('charts');
    })->name('charts');

    Route::get('/buttons', function () {
        return view('buttons');
    })->name('buttons');

    Route::get('/elements', function () {
        return view('elements');
    })->name('elements');

    Route::get('/invoice', function () {
        return view('invoice');
    })->name('invoice');

    Route::get('/gallery', function () {
        return view('gallery');
    })->name('gallery');


    Route::get('/error', function () {
        return view('error');
    })->name('error');

    Route::get('/dash2', function () {
        return view('dash2');
    })->name('dash2');


//--------------------------customer route----------------------------------
    Route::get('customer', [
        'uses' => 'CustomersController@getCustomer',
        'as' => 'customer'
    ]);

    Route::get('customer/create', [
        'uses' => 'CustomersController@getCreateCustomer',
        'as' => 'customer.get.create'
    ]);

    Route::post('customer/create', [
        'uses' => 'CustomersController@postCreateCustomer',
        'as' => 'customer.post.create'
    ]);

    Route::get('customer/edit/{customer_id}', [
        'uses' => 'CustomersController@getUpdate',
        'as' => 'customer.get.update'
    ]);

    Route::post('customer/update', [
        'uses' => 'CustomersController@postUpdate',
        'as' => 'customer.post.update'
    ]);

    Route::get('customer/delete/{customer_id}', [
        'uses' => 'CustomersController@getDelete',
        'as' => 'customer.delete'
    ]);

    Route::get('customer/single/{customer_slug}', [
        'uses' => 'CustomersController@getSingleCustomer',
        'as' => 'customer.single.customer'
    ]);

    Route::get('customer/trash/{customer_id}', [
        'uses' => 'CustomersController@getTrash',
        'as' => 'customer.trash'
    ]);

    Route::get('customer/trash', [
        'uses' => 'CustomersController@DeleteForever',
        'as' => 'customer.delete.page'
    ]);

    Route::get('customer/restore/{customer_id}', [
        'uses' => 'CustomersController@Restore',
        'as' => 'customer.restore'
    ]);

    Route::get('customer/deleteall', [
        'uses' => 'CustomersController@DeleteAll',
        'as' => 'customer.delete.all'
    ]);

    Route::get('customer/restoreall', [
        'uses' => 'CustomersController@RestoreAll',
        'as' => 'customer.restore.all'
    ]);

//----------------------end of customer route---------------------

//--------------------------sale route----------------------------------
    Route::get('sale', [
        'uses' => 'SalesController@getSale',
        'as' => 'sale'
    ]);

    Route::get('sale/create', [
        'uses' => 'SalesController@getCreateSale',
        'as' => 'sale.get.create'
    ]);

    Route::post('sale/create', [
        'uses' => 'SalesController@postCreateSale',
        'as' => 'sale.post.create'
    ]);

    Route::get('sale/edit/{sale_id}', [
        'uses' => 'SalesController@getUpdate',
        'as' => 'sale.get.update'
    ]);

    Route::post('sale/update', [
        'uses' => 'SalesController@postUpdate',
        'as' => 'sale.post.update'
    ]);

    Route::get('sale/delete/{sale_id}', [
        'uses' => 'SalesController@getDelete',
        'as' => 'sale.delete'
    ]);

    Route::get('sale/single/{sale_slug}', [
        'uses' => 'SalesController@getSingleSale',
        'as' => 'sale.single.sale'
    ]);

    Route::get('sale/trash/{sale_id}', [
        'uses' => 'SalesController@getTrash',
        'as' => 'sale.trash'
    ]);

    Route::get('sale/trash', [
        'uses' => 'SalesController@DeleteForever',
        'as' => 'sale.delete.page'
    ]);

    Route::get('sale/restore/{sale_id}', [
        'uses' => 'SalesController@Restore',
        'as' => 'sale.restore'
    ]);

    Route::get('sale/deleteall', [
        'uses' => 'SalesController@DeleteAll',
        'as' => 'sale.delete.all'
    ]);

    Route::get('sale/restoreall', [
        'uses' => 'SalesController@RestoreAll',
        'as' => 'sale.restore.all'
    ]);

//----------------------end of sale route---------------------

//--------------------------payment route----------------------------------
    Route::get('payment', [
        'uses' => 'PaymentsController@getPayment',
        'as' => 'payment'
    ]);

    Route::get('payment/create', [
        'uses' => 'PaymentsController@getCreatePayment',
        'as' => 'payment.get.create'
    ]);

    Route::post('payment/create', [
        'uses' => 'PaymentsController@postCreatePayment',
        'as' => 'payment.post.create'
    ]);

    Route::get('payment/edit/{payment_id}', [
        'uses' => 'PaymentsController@getUpdate',
        'as' => 'payment.get.update'
    ]);

    Route::post('payment/update', [
        'uses' => 'PaymentsController@postUpdate',
        'as' => 'payment.post.update'
    ]);

    Route::get('payment/delete/{payment_id}', [
        'uses' => 'PaymentsController@getDelete',
        'as' => 'payment.delete'
    ]);

    Route::get('payment/single/{payment_slug}', [
        'uses' => 'PaymentsController@getSinglePayment',
        'as' => 'payment.single.payment'
    ]);

    Route::get('payment/trash/{payment_id}', [
        'uses' => 'PaymentsController@getTrash',
        'as' => 'payment.trash'
    ]);

    Route::get('payment/trash', [
        'uses' => 'PaymentsController@DeleteForever',
        'as' => 'payment.delete.page'
    ]);

    Route::get('payment/restore/{payment_id}', [
        'uses' => 'PaymentsController@Restore',
        'as' => 'payment.restore'
    ]);

    Route::get('payment/deleteall', [
        'uses' => 'PaymentsController@DeleteAll',
        'as' => 'payment.delete.all'
    ]);

    Route::get('payment/restoreall', [
        'uses' => 'PaymentsController@RestoreAll',
        'as' => 'payment.restore.all'
    ]);

//----------------------end of payment route---------------------

    Route::get('logout', [
        'uses' => 'UsersController@getLogout',
        'as'   => 'admin.logout'
    ]);

});