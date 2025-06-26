<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Information;
use App\Mail\ReceiptId;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AllRoutes extends Controller
{

    public function MailDesign(){
        return view('emails.user');
    }

    public function Privacy(){
        return Inertia::render('screens/privacy_policy');
    }

    public function OnBoardingScreen(){
        return Inertia::render('screens/onboarding');
    }

    public function Questions(){
        return Inertia::render('screens/starting/questions');
    }

    public function LangPreference(){
        return Inertia::render('screens/starting/langpreference');
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
        $referenceid = Str::uuid();

        try{
            DB::beginTransaction();
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

        Mail::to($request->input('email'))->send(new ReceiptId($request->input('fullname'), $referenceid));

        DB::commit();
        return response()->json(['message' => 'successfully updated', 'status' => 'success']);
        }catch(\Exception $e){
            Log::info('PostAnswers', ['status' => $e->getMessage(), 'line' => $e->getLine()]);
            DB::rollBack();
          return response()->json([ 'status' => 'error', 'message' => 'Oops seems something went wrong, please try again']);
       }
    }


    public function ResumePayment($id){
    
        return Inertia::render('/resumepayment/initialize/', ['id' => $id ]);
    }

}
