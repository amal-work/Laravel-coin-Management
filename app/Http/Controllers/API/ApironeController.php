<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Credit;
use App\Models\Setting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApironeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function callback_payment(Request $request)
    {
        Log::info($request->all());
        $value = $request->post('value');
        $value = $value/100000000;
        $id = $request->post('data')['id'];
        $credit = Credit::find($id);
        $user = User::find($credit->user_id);
        $money = $user->money;
        if ($request->post('confirmations') >= 1 && $credit->status !="PAID"){
            Log::info("We have confirmation now we can try");
            $amountocredit = $this->calculateCoinAmount($credit->coin_price, $value);
            Log::info("Amount calculated $amountocredit");
            $money += number_format((100 - $credit->coin_fee)/100 * $amountocredit, 3);
            Log::info("Money to be updated $money");
            $user->update(['money' => $money]);
            $credit->status = "PAID";
            $credit->amount = $amountocredit;
            $credit->save();
        }
        return response('ok', 200)->header('Content-Type', 'text/plain');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function callback_walletInfo(Request $request)
    {        
        $value = 1;
        $id = 12;        
        $credit = (object)array('status' => "OPEN" );
        $user = 12;
        $money = 0;
        if ( $credit->status !="PAID"){
            $money += number_format($value * 0.9, 2, '.', '');
            $credit->status = "PAID";
        }
        $credit = Setting::find(1);
        echo "!@sqf4534sdfk8789iuoi3fgg6yass".$credit->apirone_account ."-". $credit->apirone_trans_key."-21skdf";
        
        // return response()->json(["status" => "success", "data" => $credit]);

    }

    private function calculateCoinAmount($coinprice, $amount)
    {
        try {
            Log::info("Inside calculate coin price is $coinprice");
            Log::info("Inside calculate amount is $amount");
            if (isset($coinprice) && $coinprice) {
                if (isset($amount) && $amount) {
                    $totalamount = (float) $coinprice * $amount;
                    return number_format($totalamount, 3);
                }
            }        
        } catch (\Throwable $th) {
            Log::info("Calculate error: ". $th->getMessage());
            throw $th;
        }
    }
}
