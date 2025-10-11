<?php


Route::get('login', 'Auth\LoginController@login')->name('admin.login');
Route::post('login-post', 'Auth\LoginController@loginPost')->name('admin.login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::get('loginwithotp', 'Auth\LoginController@loginwithotp')->name('user.login');
Route::post('user-login-post', 'Auth\LoginController@userloginPost')->name('user.login.post');
Route::get('user-otp-form/{mobile}', 'Auth\LoginController@otpForm')->name('admin.otp.form');
Route::post('user-verifyOtp/{mobile}', 'Auth\LoginController@verifyOtp')->name('admin.verify.otp');

Route::group(['middleware' => 'admin'], function() {
    Route::post('blade/update', 'BladeEditorController@updateContent')->name('admin.blade.update');
    Route::post('blade/upload-image', 'BladeEditorController@uploadImage')->name('admin.blade.uploadImage');

	Route::get('dashboard', 'DashboardController@dashboard')->name('admin.dashboard');

		Route::group(['prefix' => 'common'], function() {
			Route::get('pdfview/{path}', 'CommonController@ShowPdfFile')->name('admin.common.pdf.viewer');
		});

		Route::group(['prefix' => 'report'], function() {
			Route::get('/', 'ReportController@index')->name('admin.report.index');
			Route::post('show', 'ReportController@Show')->name('admin.report.show');
			Route::get('status', 'ReportController@status')->name('admin.report.status');
		});

 		Route::group(['prefix' => 'web-gallery'], function() {
 			Route::get('banner', 'WebGalleryController@bannerIndex')->name('admin.web.gallery.banner.index');
 			Route::get('addform/{id}', 'WebGalleryController@bannerForm')->name('admin.web.gallery.banner.form');
 			Route::post('store/{id}', 'WebGalleryController@bannerStore')->name('admin.web.gallery.banner.store');
 			Route::get('delete/{id}', 'WebGalleryController@delete')->name('admin.web.gallery.banner.delete');

 			Route::get('features', 'WebGalleryController@featuresIndex')->name('admin.web.gallery.features.index');
 			Route::get('features-addform/{id}', 'WebGalleryController@featuresForm')->name('admin.web.gallery.features.form');
 			Route::post('features-store/{id}', 'WebGalleryController@featuresStore')->name('admin.web.gallery.features.store');
 			Route::get('features-delete/{id}', 'WebGalleryController@featuresDelete')->name('admin.web.gallery.features.delete');

 			Route::get('features-detail', 'WebGalleryController@featuresDetailIndex')->name('admin.web.gallery.features.detail.index');
 			Route::get('features-detai-addform/{id}', 'WebGalleryController@featuresDetailForm')->name('admin.web.gallery.features.detail.form');
 			Route::post('features-detai-store/{id}', 'WebGalleryController@featuresDetailStore')->name('admin.web.gallery.features.detail.store');
 			Route::get('features-detai-delete/{id}', 'WebGalleryController@featuresDetailDelete')->name('admin.web.gallery.features.detail.delete');

 			Route::get('infrastructure', 'WebGalleryController@infrastructureIndex')->name('admin.web.gallery.infrastructure.index');
 			Route::get('infrastructure-addform/{id}', 'WebGalleryController@infrastructureForm')->name('admin.web.gallery.infrastructure.form');
 			Route::post('infrastructure-store/{id}', 'WebGalleryController@infrastructureStore')->name('admin.web.gallery.infrastructure.store');
 			Route::get('infrastructure-delete/{id}', 'WebGalleryController@infrastructureDelete')->name('admin.web.gallery.infrastructure.delete');

 			Route::get('teacher-index', 'WebGalleryController@teacherIndex')->name('admin.web.gallery.teacher.index');
 			Route::get('teacher-addform/{id}', 'WebGalleryController@teacherForm')->name('admin.web.gallery.teacher.form');
 			Route::post('teacher-store/{id}', 'WebGalleryController@teacherStore')->name('admin.web.gallery.teacher.store');
 			Route::get('teacher-delete/{id}', 'WebGalleryController@teacherDelete')->name('admin.web.gallery.teacher.delete');

 			Route::get('gallery-index', 'WebGalleryController@galleryIndex')->name('admin.web.gallery.gallery.index');
 			Route::post('gallery-store', 'WebGalleryController@galleryStore')->name('admin.web.gallery.gallery.store');
 			Route::get('gallery-delete/{id}', 'WebGalleryController@galleryDelete')->name('admin.web.gallery.gallery.delete');
 			Route::get('gallery-update/{id}', 'WebGalleryController@galleryUpdate')->name('admin.web.gallery.gallery.update');

 			Route::get('event-index', 'WebGalleryController@eventIndex')->name('admin.web.gallery.event.index');
 			Route::get('event-addform/{id}', 'WebGalleryController@eventForm')->name('admin.web.gallery.event.form');
 			Route::post('event-store/{id}', 'WebGalleryController@eventStore')->name('admin.web.gallery.event.store');
 			Route::get('event-delete/{id}', 'WebGalleryController@eventDelete')->name('admin.web.gallery.event.delete');

 			Route::get('about-index', 'WebGalleryController@aboutIndex')->name('admin.web.gallery.about.index');
 			Route::post('about-store', 'WebGalleryController@aboutStore')->name('admin.web.gallery.about.store');

 			Route::get('facts-index', 'WebGalleryController@factsIndex')->name('admin.web.gallery.facts.index');
 			Route::post('facts-store', 'WebGalleryController@factsStore')->name('admin.web.gallery.facts.store');

 			Route::get('add-more-page', 'WebGalleryController@addMorePage')->name('admin.web.gallery.add.more.page');
 			Route::get('more-page-addform/{id}', 'WebGalleryController@morePageForm')->name('admin.web.gallery.more.page.form');
 			Route::post('more-page-store/{id}', 'WebGalleryController@morePageStore')->name('admin.web.gallery.more.page.store');
 			Route::get('more-page-status/{id}', 'WebGalleryController@morePageStatus')->name('admin.web.gallery.more.page.status');

 			Route::get('MandatoryDisclosure', 'WebGalleryController@MandatoryDisclosure')->name('admin.web.gallery.MandatoryDisclosure');
 			Route::get('MandatoryDisclosure-addform/{id}', 'WebGalleryController@MandatoryDisclosureForm')->name('admin.web.gallery.MandatoryDisclosure.form');
 			Route::post('MandatoryDisclosure-store/{id}', 'WebGalleryController@MandatoryDisclosureStore')->name('admin.web.gallery.MandatoryDisclosure.store');
 			Route::get('MandatoryDisclosure-status/{id}', 'WebGalleryController@MandatoryDisclosureStatus')->name('admin.web.gallery.MandatoryDisclosure.status');
 			
 			Route::get('whos-who-index', 'WebGalleryController@whosWhoIndex')->name('admin.web.gallery.whos.who.index');
 			Route::get('whos-who-addform/{id}', 'WebGalleryController@whosWhoForm')->name('admin.web.gallery.whos.who.form');
 			Route::post('whos-who-store/{id}', 'WebGalleryController@whosWhoStore')->name('admin.web.gallery.whos.who.store');
 			Route::get('whos-who-delete/{id}', 'WebGalleryController@whosWhoDelete')->name('admin.web.gallery.whos.who.delete');

 			Route::get('popup-flash', 'WebGalleryController@popupFlase')->name('admin.web.gallery.popup.flash');
 			Route::post('popup-flash-store', 'WebGalleryController@popupFlaseStore')->name('admin.web.gallery.popup.flash.store');

 			Route::get('notice-board-index', 'WebGalleryController@noticeBoardIndex')->name('admin.web.gallery.notice.board.index');
 			Route::get('notice-board-addform/{id}', 'WebGalleryController@noticeBoardForm')->name('admin.web.gallery.notice.board.form');
 			Route::post('notice-board-store/{id}', 'WebGalleryController@noticeBoardStore')->name('admin.web.gallery.notice.board.store');
 			Route::get('notice-board-delete/{id}', 'WebGalleryController@noticeBoardDelete')->name('admin.web.gallery.notice.board.delete');
      	});

      	Route::group(['prefix' => 'school/detail'], function() {
      		Route::get('index', 'SchoolDetailsController@index')->name('admin.school.details.index');
			Route::post('store', 'SchoolDetailsController@store')->name('admin.school.details.store');
      	});

      	//Document Types
		Route::prefix('document-type')->group(function () {
		    Route::get('dt-index', 'DocumentTypeController@index')->name('admin.document.type');
		    Route::get('dt-edit/{id}', 'DocumentTypeController@edit')->name('admin.document.type.edit');
		    Route::post('dt-store/{id}', 'DocumentTypeController@store')->name('admin.document.type.store');
		    Route::get('dt-delete/{id}', 'DocumentTypeController@delete')->name('admin.document.type.delete');
		});

		//Projects
		Route::prefix('projects')->group(function () {
		    Route::get('p-index', 'ProjectsController@index')->name('admin.projects.index');
		    Route::get('p-form/{id}', 'ProjectsController@addform')->name('admin.projects.form');
		    Route::post('p-store/{id}', 'ProjectsController@store')->name('admin.projects.store');
		    Route::get('p-delete/{id}', 'ProjectsController@delete')->name('admin.projects.delete');
		});
});