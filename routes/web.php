<?php
use App\Model\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
 

// Route::get('login', 'User\Auth\LoginController@login')->name('user.login');
// Route::post('login-post', 'User\Auth\LoginController@loginPost')->name('user.login.post');
// Route::get('logout', 'User\Auth\LoginController@logout')->name('user.logout.get');


Route::get('/', function () {
    $rs_fatch = Illuminate\Support\Facades\DB::select(DB::raw("SELECT * from `template_type` limit 1"));
    return redirect()->route('template.index',[$rs_fatch[0]->temp_type,$rs_fatch[0]->lang_type]);
 
});
Route::get('refreshcaptcha', 'Auth\TemplateController@refreshCaptcha')->name('refresh.captcha');
Route::post('admission', 'Admin\TemplateController@admission')->name('admin.admission');
Route::post('messageform', 'Admin\TemplateController@messageform')->name('admin.messageform');
Route::post('registration', 'Admin\TemplateController@messageform')->name('admin.messageform');
 Route::post('registration', 'BladeEditorController@registration')->name('property.register');

Route::get('{temp_id}/{lang_id}/index', 'Admin\TemplateController@index')->name('template.index');
Route::get('{temp_id}/{lang_id}/about', 'Admin\TemplateController@about')->name('template.about');
Route::get('{temp_id}/{lang_id}/project', 'Admin\TemplateController@project')->name('template.project');
Route::get('{temp_id}/{lang_id}/gallery', 'Admin\TemplateController@gallery')->name('template.gallery');
Route::get('{temp_id}/{lang_id}/teacher', 'Admin\TemplateController@teacher')->name('template.teacher');
Route::get('{temp_id}/{lang_id}/events', 'Admin\TemplateController@events')->name('template.events');
Route::get('{temp_id}/{lang_id}/{rec_id}/events-detail', 'Admin\TemplateController@eventsDetail')->name('template.events.detail');
Route::get('{temp_id}/{lang_id}/contact-us', 'Admin\TemplateController@contact')->name('template.contact');
Route::get('{temp_id}/{lang_id}/registration/{id}', 'Admin\TemplateController@registration')->name('template.registration');
Route::post('registration-submit', 'Admin\TemplateController@registrationsubmit')->name('template.registration.submit');
Route::get('registration-list', 'Admin\TemplateController@registrationlist')->name('template.registration.list');
Route::get('otp-verify/{registration_id}', 'Admin\TemplateController@otpVerify')
     ->name('registration.otp.verify');
Route::post('otp-check/{registration_id}', 'Admin\TemplateController@otpCheck')
     ->name('registration.otp.check');
Route::get('{temp_id}/{lang_id}/calendar', 'Admin\TemplateController@calendar')->name('template.calendar');
Route::get('{temp_id}/{lang_id}/CBSEMandatoryDisclosure', 'Admin\TemplateController@CBSEMandatoryDisclosure')->name('template.CBSEMandatoryDisclosure');

Route::get('{temp_id}/{lang_id}/{rec_id}/morepage', 'Admin\TemplateController@morePage')->name('template.morepage'); 
Route::get('{temp_id}/{lang_id}/whos-message', 'Admin\TemplateController@whosMessage')->name('template.whos.message'); 
Route::get('{temp_id}/{lang_id}/{rec_id}/singal-message', 'Admin\TemplateController@singalMessage')->name('template.singal.message'); 
Route::get('{temp_id}/{lang_id}/fount-features', 'Admin\TemplateController@features')->name('template.features'); 
Route::get('{temp_id}/{lang_id}/{rec_id}/fount-singal-features', 'Admin\TemplateController@singalFeatures')->name('template.singal.features'); 
Route::get('{temp_id}/{lang_id}/fount-infrastructure', 'Admin\TemplateController@infrastructure')->name('template.infrastructure'); 
Route::get('{temp_id}/{lang_id}/fount-notice', 'Admin\TemplateController@notice')->name('template.notice'); 

