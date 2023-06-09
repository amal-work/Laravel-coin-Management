<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Credit;
use App\Models\Setting;
use Carbon\Carbon;
use App\MyLib\Apirone;
use Yajra\DataTables\DataTables;

class CreditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title="Get Credit";
        if ($request->ajax()) {
            $cards = Credit::where('is_del', 0)->where('user_id', Auth::id());

            return DataTables::of($cards)
                ->addIndexColumn()
                ->editColumn('status', function ($row) {
                    $badge = "badge-success";
                    if($row->status == "PAID") $badge = "badge-warning";
                    else if($row->status == "CLOSED") $badge = "badge-secondary"; 
                    $status = '<span style="width:80px;" class="badge '.$badge.'">'.$row->status.'</span>';
                    return $status;
                })
                ->editColumn('wallet_address', function ($row) {
                    $wallet = $row->coin_type.":".$row->wallet_address;
                    return $wallet;
                })               
                ->addColumn('action', function ($row) {
                    $btn = "";
                    if($row->status == "OPENED")
                        $btn = '<button type="button" data-id="'.$row->id.'" class="btn btn-success btnCheck">Check</button>';
                    return $btn;
                })
                ->editColumn('created_at', function($row){ 
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y'); 
                    return $formatedDate; 
                })
                ->rawColumns(['status', 'wallet_address', 'action'])
                ->make(true);
        }
        return view('user.credit.list', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save($type, Request $request){
        $key = array_search($type, ['BTC','LTC','DOGE']);
        if($key<0){
            return response()->json(["status" => "error", "data" => 'Please input the correct coin type.']);
        }
        
        $setting = Setting::find(1);
        $apirone = new Apirone($setting->apirone_account, $setting->apirone_trans_key);
        
        $credit = Credit::create(
            [
                'user_id' => Auth::id(),
                'coin_type' => $type,
                'coin_fee' => 10,
                
            ]);
        
        
        $res = $apirone->generateAddressByAccount($type, $credit->id);
        $rate = $apirone->getExchangeRate($type);
        if($res['status'] == 200){
            $credit->coin_price = $rate['data']->usd;
            $credit->wallet_address = $res['data']->address;
            $credit->save();
            
            return response()->json(["status" => "success", "data" => $credit]);
        }else{
            $credit->destroy();
            return response()->json(["status" => "failed", "data" => "Failed, try again later."]);
        }
        
    }
}
