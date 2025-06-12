<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AllRoutes extends Controller
{
    public function OnBoardingScreen(){
        return Inertia::render('screens/onboarding');
    }

}
