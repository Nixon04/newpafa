<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllRoutes;
use App\Http\Controllers\AdminController;


Route::controller(AllRoutes::class)->group(function(){
    Route::get('/', 'OnBoardingScreen');
    Route::get('/screens/starting/questions', 'Questions');
    Route::post('/senduserpost', 'PostAnswers');
    Route::get('/screens/starting/description', 'DescriptionVideo');
    Route::get('/screens/social/identity', 'SocialReach');
    Route::get('/langpreference', 'LangPreference');
    Route::get('/resumepayment/initialize/{id}', 'ResumePayment');
    Route::get('/mail','MailDesign');
    Route::get('/privacy','Privacy');
  });



Route::controller(AdminController::class)->group(function(){
    Route::get('/yakubupafa/home','Home');
    Route::post('viewuserslists', 'GetListedMembers');
    Route::post('/checkvpn','checkVpn');
  });
  
  
