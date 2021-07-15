<?php

Route::get('/', 'HomeController@index');
Route::any('states', 'HomeController@states');
Route::any('lgas/{id?}', 'HomeController@lgas');

Route::get('logout', 'Auth\LoginController@logout');
Route::any('login', 'Auth\LoginController@index')->name('login');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'namespace' => 'Admin'], function(){

	Route::get('/', 'DashboardController@index');
	Route::get('newsletter', 'DashboardController@newsletter');
	Route::get('payments', 'DashboardController@payments');
	Route::any('notifications/{id?}/{random?}', 'DashboardController@notifications');
	
	Route::get('members', 'MembersController@index');
	Route::get('member/{id?}/{random?}', 'MembersController@member');
	Route::post('members/{id?}', 'MembersController@saveMember');
	Route::get('terminate-member/{id?}', 'MembersController@terminate');

	Route::get('auctions', 'AuctionController@index');
	
	Route::get('email', 'EmailController@form');
	Route::post('email/new', 'EmailController@newEmail');

});


Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function(){

	Route::get('/', 'RegisterController@index');
	Route::get('register/{id?}/{random?}', 'RegisterController@newRegistration');
	Route::post('register/{id?}', 'RegisterController@register');
	Route::get('pending/{id?}/{random?}', 'RegisterController@pending');
	Route::any('password/{id?}/{random?}', 'RegisterController@password');
	Route::any('continue', 'RegisterController@continueRegistration');

	Route::group(['prefix' => 'existing'], function(){

		Route::get('/', 'ExistingMembersController@index');
		Route::post('register/{id?}/{random?}', 'ExistingMembersController@register');
		Route::any('search/{id?}/{random?}', 'ExistingMembersController@search');
		Route::any('verify/{id?}/{random?}', 'ExistingMembersController@verify');

	});

});

Route::group(['prefix' => 'transaction'], function(){

	Route::get('verify/{ref?}/{pRef?}', 'TransactionController@verifyPayment');
	Route::get('registration/{pRef?}', 'TransactionController@registration');
	Route::get('training/{pRef?}', 'TransactionController@training');
	Route::get('auction/{pRef?}', 'TransactionController@auction');

});

Route::group(['middleware' => 'auth', 'prefix' => 'user', 'namespace' => 'User'], function(){

	Route::get('home', 'DashboardController@index');
	Route::get('email', 'DashboardController@email');
	Route::get('status', 'MembershipStatus@index');
	Route::get('payments', 'PaymentsController@payments');
	Route::get('terms-and-conditions', 'PaymentsController@terms');
	Route::get('notifications', 'NotificationsController@index');

	Route::group(['prefix' => 'training'], function(){

		Route::any('/', 'TrainingController@index');
		Route::any('pay', 'TrainingController@pay');
		Route::get('confirm', 'TrainingController@confirm');

	});
	

	Route::group(['prefix' => 'resources'], function(){

		Route::get('code-of-conduct', 'ResourcesController@codeOfConduct');
		Route::get('naa-constitution', 'ResourcesController@naaConstitution');
		Route::get('website-policy', 'ResourcesController@websitePolicy');

	});
	
	Route::group(['prefix' => 'profile'], function(){

		Route::get('/', 'ProfileController@index');
		Route::any('edit', 'ProfileController@edit');
		Route::post('upload', 'ProfileController@upload');
	});

	Route::group(['prefix' => 'professional'], function(){

		Route::get('/', 'ProfessionalProfileController@index');
		Route::post('work', 'ProfessionalProfileController@saveWorkExperience');
		Route::post('certification', 'ProfessionalProfileController@saveCertification');
		Route::get('work/remove/{id?}', 'ProfessionalProfileController@removeWorkExperience');
		Route::get('certification/remove/{id?}', 'ProfessionalProfileController@removeCertification');

	});
	
	
	Route::group(['prefix' => 'auction'], function(){
		
		Route::get('/', 'AuctionController@index');
		Route::get('list', 'AuctionController@listAuction');
		Route::any('upload', 'AuctionController@upload');
		Route::get('check-lot-id/{id?}', 'AuctionController@checkLotId');
		Route::post('save', 'AuctionController@save');
		Route::get('check-images', 'AuctionController@checkImages');
		Route::get('categories', 'AuctionController@createCategories');
		Route::get('pay/{id?}', 'AuctionController@pay');
		Route::get('auction/{id?}', 'AuctionController@index');

	});

	Route::group(['prefix' => 'auctions'], function(){

		Route::get('/', 'AuctionsController@index');

	});

});
