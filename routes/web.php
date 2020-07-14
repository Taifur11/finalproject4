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
//Route::get('/home', 'HomeController@index')->name('home');





//Frontend
Route::post('subscriber','SubscriberController@store')->name('subscriber.store');

Route::get('/','IndexController@index')->name('index');

Route::get('/donate/{id}','Home\DonationFormController@donation')->name('event.donate');

Route::get('/category/{id}','Home\CategoryController@show')->name('category.event');

Route::get('/singleevent/{id}','Home\SingleEventController@show')->name('single.event');
Route::post('/comment/','Home\SingleEventController@store')->name('comment');
Route::get('/successfullsingleevent/{id}','Home\SuccessfullEventController@show')->name('successfull.single.event');
Route::post('/payment','Home\PaymentController@payment')->name('payment');
//Route::post('/payment1','Home\PaymentController1@payment1')->name('payment1');

Route::get('/events','Home\EventController@index')->name('events');
Route::get('/contactus','Home\ContactController@index')->name('contactus');
Route::post('/contactus','Home\ContactController@store')->name('contactusstore');
Route::get('/successfullevents','Home\SuccessfullEventController@index')->name('successevents');






//Donor Login 

Route::get('/donor/login','Donor\LoginController@showDonorLoginForm')->name('donor.login');

Route::post('/donor/login', 'Donor\LoginController@donorLogin')->name('donor.checklogin');
Route::get('/donorlogout','Donor\LoginController@donorlogout')->name('donorlogout');


//Donor Registration

Route::get('/donor/register', 'Donor\RegisterController@showDonorRegisterForm')->name('donor.register');
Route::post('donors/store', 'Donor\RegisterController@createDonor')->name('donors.store');


Auth::routes();


//Raiser Routes

Route::group(['as'=>'raiser.','prefix'=>'raiser','namespace'=>'Raiser',], function (){

    
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('event','EventController');
    Route::get('/withdraw/event','EventController@withdraw')->name('event.withdraw');
    Route::put('/event/{id}/withdrawed','WithdrawController@withdraw')->name('event.withdrawed');

    Route::get('/expire','EventController@expire')->name('event.expire');
    Route::get('/renew/event/{id}','EventController@renew')->name('event.renew');
    Route::put('/renew/event/{id}','EventController@renewupdate')->name('event.renew.edit');


    
    Route::get('/profile/index','ProfileController@index')->name('profile.index');
    Route::get('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');
}
);

//Admin Routes

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin',], function (){

	
    Route::get('/dashboard','DashboardController@index')->name('dashboard');

    Route::resource('category','CategoryController');
    Route::resource('event','EventController');
    Route::resource('historyevent','EventHistoryController');
    Route::resource('feedback','FeedbackController');
    Route::resource('services','SevicesController');
    Route::resource('percentage','PercentageController');
    Route::resource('logo','LogoController');
    Route::resource('info','InfoController');


    Route::put('/event/{id}/approve','EventController@approval')->name('event.approve');

    Route::put('/event/{id}/exapprove','EventController@exapproval')->name('event.exapprove');

    Route::get('/pending/event','EventController@pending')->name('event.pending');
    Route::get('/expending/event','EventController@expending')->name('event.expending');


    Route::get('/withdrawing/event','EventController@withdrawing')->name('event.withdrawing');

    Route::delete('/withdrawing/event/{id}','EventController@withdrawingdestroy')->name('event.withdrawingdestroy');

    //Slider
    Route::put('/event/{id}/slider','EventController@slider')->name('event.slider');
    Route::put('/event/{id}/notslider','EventController@notslider')->name('event.notslider');
    Route::get('/sliding/event','EventController@sliding')->name('event.sliding');
    //Subscribers
    Route::get('/subscriber','SubscriberController@index')->name('subscriber.index');
    Route::delete('/subscriber/{subscriber}','SubscriberController@destroy')->name('subscriber.destroy');
    //Donors
    Route::get('/donor','DonorController@index')->name('donor.index');
    Route::get('/donor/{id}','DonorController@show')->name('donor.show');
    Route::delete('/donor/{donor}','DonorController@destroy')->name('donor.destroy');
    //Raisers
    Route::get('/raiser','RaiserController@index')->name('raiser.index');
    Route::delete('/raiser/{raiser}','RaiserController@destroy')->name('raiser.destroy');
    //Profile of Admin
    Route::get('/profile/index','ProfileController@index')->name('profile.index');
    Route::get('/profile/edit/{id}','ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update/{id}','ProfileController@update')->name('profile.update');

}
);


//Admin Login And Logout

Route::get('/login/admin', 'Auth\Admin\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/login/admin', 'Auth\Admin\LoginController@adminLogin');
Route::post('/logout/admin', 'Auth\Admin\LoginController@logout')->name('admin.logout');

//Admin Registration

Route::get('/register/admin', 'Auth\Admin\RegisterController@showAdminRegisterForm');

Route::post('/register/admin', 'Auth\Admin\RegisterController@createAdmin');

//Raiser Registration

Route::get('/register/raiser', 'Auth\Raiser\RegisterController@showRaiserRegisterForm');

Route::post('/register/raiser', 'Auth\Raiser\RegisterController@createRaiser');

//Raiser Login And Logout

Route::get('/login/raiser', 'Auth\Raiser\LoginController@showRaiserLoginForm')->name('raiser.login');
Route::post('/login/raiser', 'Auth\Raiser\LoginController@raiserLogin');
Route::post('/logout', 'Auth\Raiser\LoginController@logout')->name('raiser.logout');
