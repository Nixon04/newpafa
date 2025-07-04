<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Webhook extends Controller
{
    public function webHook(Request $request){
        $paymentDetails = $request->getContent();
        $headers = $request->headers->all();

        $headersJson = json_encode($headers);
        $eventTarget = json_decode($paymentDetails);

        if($eventTarget->event == 'charge.completed'){
            Log::info('Charge Status' , ['status' => $eventTarget->data]);
        }
        else{
            Log::info('Charge Status', ['status' => 'Failure to fetch']);
        }
    }
}
