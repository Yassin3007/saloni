<?php


use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Front\ClientController;
use App\Http\Controllers\Front\CommentController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ReservationController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\HomeController;
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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



    ######################################admin routes ###############################
    Route::get('admin/login',[AdminLoginController::class , 'adminLogin']);

    Route::post('admin/login',[AdminLoginController::class , 'login'])->name('login');


        Route::group(['prefix'=>'admin' ,'middleware'=>'auth:admin'],function (){
            Route::post('/saveAdminPhoto',[HomeController::class , 'saveAdminPhoto'])->name('saveAdminPhoto');

            Route::get('/index',[AdminController::class , 'index'])->name('adminIndex');
           Route::get('/reservation',[AdminController::class , 'reservation'])->name('adminReservations');
           Route::get('/logout',[AdminLoginController::class , 'logout'])->name('adminLogout');
           Route::get('/cities',[AdminController::class , 'cities'])->name('adminCities');
           Route::get('/services',[AdminController::class , 'services'])->name('adminServices');
           Route::get('/categories',[AdminController::class , 'categories'])->name('adminCategories');
           Route::get('/sallons',[AdminController::class , 'sallons'])->name('adminSallons');
           Route::get('/checkContract/{x}',[AdminController::class , 'checkContract'])->name('checkContract');
           Route::get('/checkCommercial/{x}',[AdminController::class , 'checkCommercial'])->name('checkCommercial');
           Route::get('/ActiveSallons',[AdminController::class , 'ActiveSallons'])->name('adminActiveSallons');
           Route::get('/activeSallon/{sallon_id}',[AdminController::class , 'activeSallon'])->name('activeSallon');
           Route::get('/disableSallon/{sallon_id}',[AdminController::class , 'disableSallon'])->name('disableSallon');
           Route::get('/users',[AdminController::class , 'users'])->name('adminUsers');
           Route::get('/adminSettings',[AdminController::class , 'settings'])->name('adminSettings');
           Route::post('/editAdminInformation',[AdminController::class , 'editAdminInformation'])->name('editAdminInformation');
           Route::post('/editApp',[AdminController::class , 'editApp'])->name('editApp');
           Route::get('/activeUser/{id}',[AdminController::class , 'activeUser'])->name('activeUser');
           Route::get('/disableUser/{id}',[AdminController::class , 'disableUser'])->name('disableUser');
           Route::get('/copouns',[AdminController::class , 'copouns'])->name('adminCopouns');
           Route::post('/add_city',[CityController::class , 'store'])->name('add_city');
           Route::get('/editCity/{id}',[CityController::class , 'edit'])->name('editCity');
           Route::post('/updateCity',[CityController::class , 'update'])->name('updateCity');
           Route::get('/deleteCity/{id}',[CityController::class , 'destroy'])->name('deleteCity');
           Route::post('/add_category',[CategoryController::class , 'store'])->name('add_category');
           Route::get('/editCategory/{id}',[CategoryController::class , 'edit'])->name('editCategory');
           Route::post('/editCategory',[CategoryController::class , 'update'])->name('updateCategory');
           Route::get('/deleteCategory/{id}',[CategoryController::class , 'destroy'])->name('deleteCategory');
           Route::post('/add_service',[ServiceController::class , 'store'])->name('add_service');
           Route::get('/editService/{id}',[ServiceController::class , 'edit'])->name('editService');
           Route::post('/updateService',[ServiceController::class , 'update'])->name('updateService');
           Route::get('/deleteService/{id}',[ServiceController::class , 'destroy'])->name('deleteService');
           Route::post('/changeAdminPassword',[AdminController::class , 'changeAdminPassword'])->name('changeAdminPassword');
        });



    ######################################  end admin routes ###############################

    Route::get('/', function () {
        $cities =  App\Models\City::all();
        $services = App\Models\Service::all();
        $sallons = \App\Models\Sallon::orderBy('rating','desc')->limit(3)-> get();
        $client = auth()->user();

        return view('index',compact('services','cities','sallons','client'));

    })->name('home');
    Route::get('search',[SearchController::class , 'search'])->name('search');
    Route::get('about',function (){
        $about= \App\Models\Value::find(1)->about;
        return view('about',compact('about'));
    })->name('about');
    Route::get('privacy',function (){
        $privacy= \App\Models\Value::find(1)->privacy ;
        return view('privacy',compact('privacy'));
    })->name('privacy');

    Route::get('sallon_profile/{id}',[SearchController::class , 'sallon_profile'])->name('sallon_profile');
    Route::get('send',[LoginController::class , 'sendMail'])->name('send');




    Route::get('/userAuth/{code}',[ LoginController::class ,'userAuth'])->name('userAuth');

    Route::post('/userLogin',[ LoginController::class ,'userLogin'])->name('userLogin');
    Route::post('/userRegister',[ LoginController::class ,'userRegister'])->name('userRegister');
    Route::get('/active_mail',[ LoginController::class ,'active_mail'])->middleware('auth')->name('active_mail');
    Route::post('/confirmCode',[ LoginController::class ,'confirmCode'])->middleware('auth')->name('confirmCode');
    Route::get('/userLogout',[ LoginController::class ,'userLogout'])->name('userLogout');
    //Route::get('/test',[ AdminController::class ,'search'])->middleware('auth');
    Route::get('/add_sallon_information',[ LoginController::class ,'add_sallon_information'])->middleware('auth')->name('add_sallon_information');
   // Route::post('search',[SearchController::class,'search'])->name('search');
    //Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware'=>['auth','verify']],function (){
        Route::get('/profile',[ClientController::class , 'profile'])->name('profile');
        Route::get('/add_services',[ClientController::class , 'add_services'])->name('add_services');
        Route::get('/index',[ClientController::class , 'index'])->name('clientIndex');
        Route::get('/sallonData',[LoginController::class , 'sallonData'])->name('sallonData');
        Route::post('/addSalonInformation',[LoginController::class , 'addSalonInformation'])->name('addSalonInformation');
        Route::post('/selectServices',[ClientController::class , 'selectServices'])->name('selectServices');
        Route::post('/addNewServices',[ClientController::class , 'addNewServices'])->name('addNewServices');
        Route::post('/deleteServices',[ClientController::class , 'deleteServices'])->name('deleteServices');
        Route::post('/updateClientInformation',[ClientController::class , 'updateClientInformation'])->name('updateClientInformation');
        Route::post('/updateSallonInformation',[ClientController::class , 'updateSallonInformation'])->name('updateSallonInformation');
        Route::get('/add_service_price',[ClientController::class , 'add_service_price'])->name('add_service_price');
        Route::get('/wait',[LoginController::class , 'wait'])->name('wait');
        Route::get('/reservation',[ClientController::class , 'reservation'])->name('clientReservations');
        Route::get('/logout',[LoginController::class , 'logout'])->name('clientLogout');
        Route::get('/cities',[ClientController::class , 'cities'])->name('clientCities');
        Route::get('/clientUsers',[ClientController::class , 'users'])->name('clientUsers');
        Route::get('/services',[ClientController::class , 'services'])->name('clientServices');
        Route::get('/clientGuide',[ClientController::class , 'guide'])->name('clientGuide');
        Route::get('/categories',[ClientController::class , 'categories'])->name('clientCategories');
        Route::get('/copouns',[ClientController::class , 'copouns'])->name('clientCopouns');
        Route::post('/addCopoun',[ClientController::class , 'addCopoun'])->name('addCopoun');
        Route::get('/setting/{id}',[ClientController::class , 'setting'])->name('clientSetting');
        Route::post('/savePhoto',[HomeController::class , 'savePhoto'])->name('savePhoto');
        Route::get('submitReservation',[ReservationController::class , 'submitReservation'])->name('submitReservation');
        Route::get('add_reservation',[ReservationController::class , 'add_reservation'])->name('add_reservation');
        Route::post('send_reservation',[ReservationController::class , 'send_reservation'])->name('send_reservation');
        Route::get('accept_reservation/{id}',[ReservationController::class , 'accept_reservation'])->name('accept_reservation');
        Route::get('refuse_reservation/{id}',[ReservationController::class , 'refuse_reservation'])->name('refuse_reservation');
        Route::get('verify_reservation/{id}',[ReservationController::class , 'verify_reservation'])->name('verify_reservation');
        Route::post('complete_reservation',[ReservationController::class , 'complete_reservation'])->name('complete_reservation');





        ############################  user routes ##########################
        Route::get('/user_index',[UserController::class , 'index'])->name('userIndex');
        Route::get('/user_reservations',[UserController::class , 'reservations'])->name('userReservations');
        Route::get('/deleteReservation/{id}',[UserController::class , 'deleteReservation'])->name('deleteReservation');
        Route::get('/user_settings',[UserController::class , 'settings'])->name('userSettings');
        Route::get('/userGuide',[UserController::class , 'guide'])->name('userGuide');
        Route::post('/updateUserInformation',[UserController::class , 'updateUserInformation'])->name('updateUserInformation');
        Route::post('/changePassword',[UserController::class , 'changePassword'])->name('changePassword');
        Route::post('add_comment',[CommentController::class,'add_comment'])->name('add_comment');


        ############################ end user routes ##########################





    });











});





