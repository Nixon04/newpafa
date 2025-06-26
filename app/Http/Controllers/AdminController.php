<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use App\Models\Information;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{


    public function checkVpn(Request $request)
        {
            try{
                $response = Http::get('https://vpnapi.io/api/?key=6d64b1fcc9ab492686d0b45bbee0ad84');
            return response()->json($response->json());
            }
            catch(\Exception $e){
                return response()->json([
                    'message' => $e->getMessage(),
                ]);
            }
        }

    public function GetListedMembers(Request $request){
        $request->validate([
            'itemvalue' => 'required',
        ]);
        $item = $request->input('itemvalue');
        try{
         $querygen = GeneralInfo::where('id', $item)->first();
         if($querygen){
            $queryinfo = Information::where('username', $querygen->email)->get();
            if($queryinfo){
                return response()->json([
                    'message' => $queryinfo
                ]);
            }else{
                return response()->json([
                    'message' => [],
                    'error' => 'No information found',
                ]);
            }
         }else{
            return response()->json([
                'message' => [],
                'error' => 'No Data Found',
            ]);
         }
        }
        catch(\Illuminate\Http\Client\ConnectionException $e){
            return response()->json([
                'message' => 'Network Connectivity Error',
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Oops seems something went wrong',
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
            ]);
        }
    }
    public function Home(){
        //  $queryinfo = Information::orderBy('id','DESC')->get();
         $querygeneral = GeneralInfo::orderBy('id', 'DESC')->get();

         if($querygeneral){
            $totalUsers = $querygeneral->count();
            $paid = $querygeneral->where('paid',1)->count();
         }


          return Inertia::render('yakubupafa/home', [
            'data' => $querygeneral,
            'general' => $querygeneral,
            'paid' => $paid,
            'totalUsers' => $totalUsers,
        ]);
      
    }
}
