<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\GeneralInfo;
use Illuminate\Support\Facades\DB;
use App\Models\Information;

class AdminController extends Controller
{

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
