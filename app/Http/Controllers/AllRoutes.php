<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Information;
use App\Mail\ReceiptId;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Client\ConnectionException;

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

    public function DescriptionVideo($id){
        return Inertia::render('screens/starting/description', [
            'id' => $id,
        ]);
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
        return response()->json([
            'message' => 'successfully updated',
            'reference_id' => $referenceid,
            'status' => 'success'
        ]);

        }catch(\Exception $e){
            Log::info('PostAnswers', ['status' => $e->getMessage(), 'line' => $e->getLine()]);
            DB::rollBack();
          return response()->json([ 'status' => 'error', 'message' => 'Oops seems something went wrong, please try again']);
       }
    }


    public function ResumePayment($id){
    
        return Inertia::render('/resumepayment/initialize/', ['id' => $id ]);
    }


    public function PaymentInit(Request $request){
        $request->validate([
            'id' => 'required',
            'amount' => 'required|integer|min:1',
        ]);
         $id = $request->input('id');

         $querycheck = GeneralInfo::where('reference', $id)->first();
         if($querycheck){
            $email = $querycheck->email;
            $fullname = $querycheck->fullname;
            $contact = $querycheck->contact;
         }

        try{
            DB::beginTransaction();
        $ref = Carbon::now()->format('YmdHis') .'_'. Str::uuid();

        $headers = [
            'Authorization' => 'Bearer '.env('FLUTTERWAVE_SECRET_KEY'),
            'Content-Type' => 'application/json',
        ];

        $payload = [
            'amount' => $request->input('amount'),
            'tx_ref' => $ref,
            'currency' => 'NGN',
            'redirect_url' => 'http://127.0.0.1:8000/screens/social/identity',
            'customer'=> [
                'email' => $email,
                'name' => $fullname,
                'phonenumber' => $contact,
            ],
        ];

        $response = Http::withHeaders($headers)->post('https://api.flutterwave.com/v3/payments', $payload);
        if($response && $response->successful()){
            DB::commit();
            $json_message = json_decode($response->body());
            Log::info('Link check' ,['status' => $json_message->data->link]);
            return response()->json([
                'message' => $json_message->data->link,
                'status' => 'success',
            ]);
        }
    }

    catch(ConnectionException $e){
        DB::rollBack();
        return response()->json([
            'message' => 'Network Connection',
            'status' => 'error',
        ]);
    }

    catch(\Exception $e){
        DB::rollBack();
        Log::info('PaymentInitError', ['status' => $e->getMessage(), 'line' => $e->getLine()]);
        return response()->json([
            'message' => 'Oops seems something went wrong',
            'status' => 'error',
        ]);
    }

   }

}
