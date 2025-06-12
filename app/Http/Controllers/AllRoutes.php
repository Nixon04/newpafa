<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use App\Models\Information;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AllRoutes extends Controller
{
    public function OnBoardingScreen(){
        return Inertia::render('screens/onboarding');
    }

    public function Questions(){
        return Inertia::render('screens/starting/questions');
    }

    public function SocialReach(){
        return Inertia::render('screens/social/identity');
    }

    public function DescriptionVideo(){
        return Inertia::render('screens/starting/description');
    }

    public function PostAnswers(Request $request){
        $request->validate([
            'data' =>'required',
            'fullname' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
            'members',
        ]);

        try{
            $querycheck = GeneralInfo::where('email', $request->input('email'))->first();
            if($querycheck){
                return response()->json(['message' => 'Already registered', 'status' => 'error']);
            }

        $querydata = json_decode($request->input('data'), true);

        foreach($querydata as $entry){
          $queryinfo  =  new Information([
            'username' => $request->input('email') ,
            'data' => $entry,
        
          ]);
          $queryinfo->save();
        }
        $referenceid = Str::uuid();

        $date  = Carbon::now()->setTimeZone('Africa/Lagos')->format('Y,m D h:i:a A');
        $querygeneral = new GeneralInfo([
            'fullname' => $request->input('fullname'), 
            'contact' => $request->input('contact'), 
            'email' => $request->input('email'), 
            'members' => $request->input('members') ?? '0',
            'reference' => $referenceid,
            'reg_date' => $date, 
        ]);
        $querygeneral->save();
        return response()->json(['message' => 'successfully updated', 'status' => 'success']);
        }catch(\Exception $e){
          return response()->json([ 'code' => 'Oops seems something went wrong', 'status' => 'error', 'message' =>  $e->getMessage()]);
       }
    }

}
