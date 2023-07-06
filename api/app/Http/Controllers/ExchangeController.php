<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exchange;
use Carbon\Carbon;

class ExchangeController extends Controller
{
    public function setExchange(Request $request)
    {
        $amount = $request->get('exchange');
        $exchange = new Exchange();
        $exchange->amount = $amount;
        $exchange->added_date = Carbon::now()->addHours(4);
        $exchange->save();

        return response()->json(['status' => 'success']);
    }

    public function getExchange()
    {
        $exchange = Exchange::latest()->first();
        if($exchange){
            $readyExchange = [
                "amount" => $exchange->amount,
                "date" => Carbon::createFromFormat('Y-m-d',  $exchange->added_date)->format('d/m/Y'),
            ];
            return response()->json($readyExchange);
        };
        return response()->json(['status' => 'success', 'message' => 'Չկա նշված գումար'], 200);
    }
    
}
