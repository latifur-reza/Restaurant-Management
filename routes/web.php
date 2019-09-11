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

Route::middleware(['auth' , 'manager'])->group(function () {

    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/home', 'PagesController@index')->name('index');

    //serve routes
    Route::get('/serve', 'ServeController@create')->name('servenow');
    Route::get('/serve/{id}', 'ServeController@createcus')->name('servenowcus');
    Route::post('/serve', 'ServeController@store')->name('servicestore');
    Route::get('/inkitchen', 'ServeController@index')->name('inkitchen');
    Route::post('/serveall/{id}', 'ServeController@served')->name('serveall');

    //category routes
    Route::get('/createcategory', 'CategoryController@create')->name('createcategory');
    Route::post('/createcategory', 'CategoryController@store')->name('createcategory.store');
    Route::get('/categorylist', 'CategoryController@index')->name('categorylist');
    Route::get('/categoryedit/{id}', 'CategoryController@edit')->name('categoryedit');
    Route::post('/categoryedit/{id}', 'CategoryController@update')->name('categoryedit.update');
    Route::post('/categorydelete/{id}', 'CategoryController@delete')->name('categorydelete');

    //menu route
    Route::get('/createmenu', 'MenuController@create')->name('createmenu');
    Route::post('/createmenu', 'MenuController@store')->name('createmenu.store');
    Route::get('/menulist', 'MenuController@index')->name('menulist');
    Route::get('/menuedit/{id}', 'MenuController@edit')->name('menuedit');
    Route::post('/menuedit/{id}', 'MenuController@update')->name('menuedit.update');
    Route::post('/menudelete/{id}', 'MenuController@delete')->name('menudelete');

    //staff route
    Route::get('/createstaff', 'StaffController@create')->name('createstaff');
    Route::post('/createstaff', 'StaffController@store')->name('createstaff.store');
    Route::get('/stafflist', 'StaffController@index')->name('stafflist');
    Route::get('/staffedit/{id}', 'StaffController@edit')->name('staffedit');
    Route::post('/staffedit/{id}', 'StaffController@update')->name('staffedit.update');
    Route::post('/staffdelete/{id}', 'StaffController@delete')->name('staffdelete');

    //barcode route
    Route::get('/createbarcode', 'BarcodeController@create')->name('createbarcode');
    Route::post('/createbarcode', 'BarcodeController@store')->name('createbarcode.store');
    Route::get('/barcodelist', 'BarcodeController@index')->name('barcodelist');
    Route::get('/barcodeedit/{id}', 'BarcodeController@edit')->name('barcodeedit');
    Route::post('/barcodeedit/{id}', 'BarcodeController@update')->name('barcodeedit.update');
    Route::post('/barcodedelete/{id}', 'BarcodeController@delete')->name('barcodedelete');

    //customer route
    Route::get('/createcustomer', 'CustomerController@create')->name('createcustomer');
    Route::post('/createcustomer', 'CustomerController@store')->name('createcustomer.store');
    Route::get('/customerlist', 'CustomerController@index')->name('customerlist');
    Route::get('/customeredit/{id}', 'CustomerController@edit')->name('customeredit');
    Route::post('/customeredit/{id}', 'CustomerController@update')->name('customeredit.update');
    Route::post('/customerdelete/{id}', 'CustomerController@delete')->name('customerdelete');

    //banking route
    Route::get('/createbanking', 'BankingController@create')->name('createbanking');
    Route::post('/createbanking', 'BankingController@store')->name('createbanking.store');
    Route::get('/bankinglist', 'BankingController@index')->name('bankinglist');
    Route::post('/bankingdelete/{id}', 'BankingController@delete')->name('bankingdelete');

    //dailyexpensescategory route
    Route::get('/createdailyexpensescategory', 'DailyExpensesCategoryController@create')->name('createdailyexpensescategory');
    Route::post('/createdailyexpensescategory', 'DailyExpensesCategoryController@store')->name('createdailyexpensescategory.store');
    Route::get('/dailyexpensescategorylist', 'DailyExpensesCategoryController@index')->name('dailyexpensescategorylist');
    Route::get('/dailyexpensescategoryedit/{id}', 'DailyExpensesCategoryController@edit')->name('dailyexpensescategoryedit');
    Route::post('/dailyexpensescategoryedit/{id}', 'DailyExpensesCategoryController@update')->name('dailyexpensescategoryedit.update');
    Route::post('/dailyexpensescategorydelete/{id}', 'DailyExpensesCategoryController@delete')->name('dailyexpensescategorydelete');

    //dailyexpenses route
    Route::get('/createdailyexpensesnow', 'DailyExpensesController@create')->name('createdailyexpenses');
    Route::post('/createdailyexpensesnow', 'DailyExpensesController@store')->name('createdailyexpenses.store');
    Route::get('/dailyexpenseslist', 'DailyExpensesController@index')->name('dailyexpenseslist');
    Route::post('/dailyexpensesdelete/{id}', 'DailyExpensesController@delete')->name('dailyexpensesdelete');

    //fixedcosts routes
    Route::get('/createfixedcosts', 'FixedCostsController@create')->name('createfixedcosts');
    Route::post('/createfixedcosts', 'FixedCostsController@store')->name('createfixedcosts.store');
    Route::get('/fixedcostslist', 'FixedCostsController@index')->name('fixedcostslist');
    Route::get('/fixedcostsedit/{id}', 'FixedCostsController@edit')->name('fixedcostsedit');
    Route::post('/fixedcostsedit/{id}', 'FixedCostsController@update')->name('fixedcostsedit.update');
    Route::post('/fixedcostsdelete/{id}', 'FixedCostsController@delete')->name('fixedcostsdelete');

    //fixedcostsexpenses routes
    Route::get('/createfixedcostsexpenses/{id}', 'FixedCostsExpensesController@create')->name('createfixedcostsexpenses');
    Route::post('/createfixedcostsexpenses', 'FixedCostsExpensesController@store')->name('createfixedcostsexpenses.store');
    Route::get('/fixedcostsexpenseslist', 'FixedCostsExpensesController@index')->name('fixedcostsexpenseslist');
    Route::post('/fixedcostsexpensesdelete/{id}', 'FixedCostsExpensesController@delete')->name('fixedcostsexpensesdelete');


    Route::middleware(['admin'])->group(function () {

        //manager routes
        Route::get('/createmanager', 'ManagerController@create')->name('createmanager');
        Route::post('/createmanager', 'ManagerController@store')->name('createmanager.store');
        Route::get('/managerlist', 'ManagerController@index')->name('managerlist');
        Route::post('/managerdelete/{id}', 'ManagerController@delete')->name('managerdelete');
        Route::post('/makeadmin/{id}', 'ManagerController@makeadmin')->name('makeadmin');
        Route::post('/makemanager/{id}', 'ManagerController@makemanager')->name('makemanager');
        Route::post('/makenone/{id}', 'ManagerController@makenone')->name('makenone');

        //category routes
        Route::get('/categoryarc', 'CategoryController@indexarc')->name('categoryarc');
        Route::post('/categorydestroy/{id}', 'CategoryController@destroy')->name('categorydestroy');
        Route::post('/categoryactive/{id}', 'CategoryController@active')->name('categoryactive');

        //menu routes
        Route::get('/menuarc', 'MenuController@indexarc')->name('menuarc');
        Route::post('/menudestroy/{id}', 'MenuController@destroy')->name('menudestroy');
        Route::post('/menuactive/{id}', 'MenuController@active')->name('menuactive');

        //staff routes
        Route::get('/staffarc', 'StaffController@indexarc')->name('staffarc');
        Route::post('/staffdestroy/{id}', 'StaffController@destroy')->name('staffdestroy');
        Route::post('/staffactive/{id}', 'StaffController@active')->name('staffactive');

        //barcode routes
        Route::get('/barcodearc', 'BarcodeController@indexarc')->name('barcodearc');
        Route::post('/barcodedestroy/{id}', 'BarcodeController@destroy')->name('barcodedestroy');
        Route::post('/barcodeactive/{id}', 'BarcodeController@active')->name('barcodeactive');

        //customer routes
        Route::get('/customerarc', 'CustomerController@indexarc')->name('customerarc');
        Route::post('/customerdestroy/{id}', 'CustomerController@destroy')->name('customerdestroy');
        Route::post('/customeractive/{id}', 'CustomerController@active')->name('customeractive');

        //banking routes
        Route::get('/bankingarc', 'BankingController@indexarc')->name('bankingarc');
        Route::post('/bankingdestroy/{id}', 'BankingController@destroy')->name('bankingdestroy');
        Route::post('/bankingactive/{id}', 'BankingController@active')->name('bankingactive');

        //dailyexpensescategory routes
        Route::get('/dailyexpensescategoryarc', 'DailyExpensesCategoryController@indexarc')->name('dailyexpensescategoryarc');
        Route::post('/dailyexpensescategorydestroy/{id}', 'DailyExpensesCategoryController@destroy')->name('dailyexpensescategorydestroy');
        Route::post('/dailyexpensescategoryactive/{id}', 'DailyExpensesCategoryController@active')->name('dailyexpensescategoryactive');

        //dailyexpenses routes
        Route::get('/dailyexpensesarc', 'DailyExpensesController@indexarc')->name('dailyexpensesarc');
        Route::post('/dailyexpensesdestroy/{id}', 'DailyExpensesController@destroy')->name('dailyexpensesdestroy');
        Route::post('/dailyexpensesactive/{id}', 'DailyExpensesController@active')->name('dailyexpensesactive');

        //fixedcosts routes
        Route::get('/fixedcostsarc', 'FixedCostsController@indexarc')->name('fixedcostsarc');
        Route::post('/fixedcostsdestroy/{id}', 'FixedCostsController@destroy')->name('fixedcostsdestroy');
        Route::post('/fixedcostsactive/{id}', 'FixedCostsController@active')->name('fixedcostsactive');

        //fixedcostsexpenses routes
        Route::get('/fixedcostsexpensesarc', 'FixedCostsExpensesController@indexarc')->name('fixedcostsexpensesarc');
        Route::post('/fixedcostsexpensesdestroy/{id}', 'FixedCostsExpensesController@destroy')->name('fixedcostsexpensesdestroy');
        Route::post('/fixedcostsexpensesactive/{id}', 'FixedCostsExpensesController@active')->name('fixedcostsexpensesactive');

    });
});

Auth::routes();
Route::get('/nopermit', 'PagesController@nopermit')->name('nopermit');
