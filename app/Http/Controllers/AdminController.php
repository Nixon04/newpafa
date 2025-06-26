<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Models\Information;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{

    public function checkVpn(Request $request)
    {
        try {
            $ip = app()->environment('local') ? '102.90.117.42' : $request->ip();
            
            $cache_key = "check" .$ip;
            $fetch_api = "cache";

            $data = Cache::remember($cache_key, now()->addHours(6), function () use ($ip){
                $fetch_api = "api";
                $response = Http::get("https://vpnapi.io/api/{$ip}?key=" .env('VPNAPIKEY'));
                return $response->successful() ? $response->json() : null;
            });

            if(!$data){
                return response()->json([
                    'message' => "Response Not found",
                    'status' => 'error',
                ]);
            }

             Log::info('CheckVPN', ['ip' => $ip, [  'fetch_from' => $fetch_api, 'vpn_data' => $data,]]);
            return response()->json($data);

        } catch (\Exception $e) {
            Log::info('CheckVpn', ['status' => $e->getMessage()]);
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
