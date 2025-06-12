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
  });



Route::controller(AdminController::class)->group(function(){
    Route::get('/yakubupafa/home','Home');
    Route::post('viewuserslists', 'GetListedMembers');
  });
  
  
