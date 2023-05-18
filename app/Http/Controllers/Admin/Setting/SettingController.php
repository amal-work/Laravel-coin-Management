<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\SiteSetting;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class SettingController extends Controller
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

        $title = "User Management";

        if ($request->ajax()) {
            $users = User::where('type', 'USER')
                ->where('level', '<', 9)
                ->orderBy('name');

            return DataTables::of($users)
                ->addIndexColumn()
                
                ->editColumn('is_use', function ($row) {
                    $checked = $row->is_use == 1 ? "checked" : "";
                    $btn='<div>
                        <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" '.$checked.' id="chkUse_'.$row->id.'">
                        <label class="custom-control-label" for="chkUse_'.$row->id.'"></label>
                        </div>
                    </div>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="btn btn-primary btnEdit">Edit</button>';
                    $btn .= '<button type="button" data-id="' . $row->id . '" style="font-size:10px !important;" class="ml-1 btn btn-danger btnDelete">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action', 'level', 'is_use'])
                ->make(true);
        }
        return view('admin.user.list', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guide(Request $request)
    {
        $title = "Guide";
        $guide = Setting::first()->guide;
        return view('admin.setting.guide', compact('title', 'guide'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveGuide(Request $request)
    {
        
        $guide = $request->post('guide');
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'guide' => $guide,
            ]
        );
        
        return redirect()->route('admin.setting.guide');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function bank(Request $request)
    {
        $title = "APIRONE";
        $setting = Setting::first();
        return view('admin.setting.bank', compact('title', 'setting'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveBank(Request $request)
    {
        
        $apirone_account = $request->post('apirone_account');
        $apirone_trans_key = $request->post('apirone_trans_key');
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'apirone_account' => $apirone_account,
                'apirone_trans_key' => $apirone_trans_key,
            ]
        );
        
        return redirect()->route('admin.setting.bank');
        
    }
	
	
	//checker price api settings
	public function checkPrice(Request $request){
        $title = "Checker price API";
		$s_checker_price = unserialize(SiteSetting::where('name', 'checker_price')->first()->value);
        return view('admin.setting.checkprice', compact('title', 's_checker_price'));
    }
	
	public function saveCheckPrice(Request $request){
		//cardbuy page
        $chk_cards_buy = $request->post('chk_cards_buy');
		$checkcc_ru_auth_buy = $request->post('checkcc_ru_auth_buy');
		$checkcc_ru_sale_buy = $request->post('checkcc_ru_sale_buy');
		$checkcc_ru_avs_buy = $request->post('checkcc_ru_avs_buy');
		$checkcc_ru_charge_buy = $request->post('checkcc_ru_charge_buy');
		$chk_cards_buy_dead = $request->post('chk_cards_buy_dead');
		$checkcc_ru_auth_buy_dead = $request->post('checkcc_ru_auth_buy_dead');
		$checkcc_ru_sale_buy_dead = $request->post('checkcc_ru_sale_buy_dead');
		$checkcc_ru_avs_buy_dead = $request->post('checkcc_ru_avs_buy_dead');
		$checkcc_ru_charge_buy_dead = $request->post('checkcc_ru_charge_buy_dead');

		//cards check page
		$chk_cards = $request->post('chk_cards');
		$checkcc_ru_auth = $request->post('checkcc_ru_auth');
		$checkcc_ru_sale = $request->post('checkcc_ru_sale');
		$checkcc_ru_avs = $request->post('checkcc_ru_avs');
		$checkcc_ru_charge = $request->post('checkcc_ru_charge');
		$chk_cards_dead = $request->post('chk_cards_dead');
		$checkcc_ru_auth_dead = $request->post('checkcc_ru_auth_dead');
		$checkcc_ru_sale_dead = $request->post('checkcc_ru_sale_dead');
		$checkcc_ru_avs_dead = $request->post('checkcc_ru_avs_dead');
		$checkcc_ru_charge_dead = $request->post('checkcc_ru_charge_dead');
		
        SiteSetting::updateOrCreate(
            ['name' => 'checker_price'],
            [
				'value' => serialize([
					'check_buycard' => [
						'chk_cards_buy' => $chk_cards_buy,
						'checkcc_ru_auth_buy' => $checkcc_ru_auth_buy,
						'checkcc_ru_sale_buy' => $checkcc_ru_sale_buy,
						'checkcc_ru_avs_buy' => $checkcc_ru_avs_buy,
						'checkcc_ru_charge_buy' => $checkcc_ru_charge_buy,
						'chk_cards_buy_dead' => $chk_cards_buy_dead,
						'checkcc_ru_auth_buy_dead' => $checkcc_ru_auth_buy_dead,
						'checkcc_ru_sale_buy_dead' => $checkcc_ru_sale_buy_dead,
						'checkcc_ru_avs_buy_dead' => $checkcc_ru_avs_buy_dead,
						'checkcc_ru_charge_buy_dead' => $checkcc_ru_charge_buy_dead
					],
					'check_cards' => [
						'chk_cards' => $chk_cards,
						'checkcc_ru_auth' => $checkcc_ru_auth,
						'checkcc_ru_sale' => $checkcc_ru_sale,
						'checkcc_ru_avs' => $checkcc_ru_avs,
						'checkcc_ru_charge' => $checkcc_ru_charge,
						'chk_cards_dead' => $chk_cards_dead,
						'checkcc_ru_auth_dead' => $checkcc_ru_auth_dead,
						'checkcc_ru_sale_dead' => $checkcc_ru_sale_dead,
						'checkcc_ru_avs_dead' => $checkcc_ru_avs_dead,
						'checkcc_ru_charge_dead' => $checkcc_ru_charge_dead
					]
				])
            ]
        );
        return redirect()->route('admin.setting.checkprice');
    }
	
	//checker key api settings
	public function checkKeyApi(Request $request){
        $title = "Checker key API";
		$s_checker_key = unserialize(SiteSetting::where('name', 'checker_key')->first()->value);
        return view('admin.setting.checkkey', compact('title', 's_checker_key'));
    }
	
	public function saveCheckKeyApi(Request $request){
        $chk_cards_key = $request->post('chk_cards_key');
		$checkcc_ru_key = $request->post('checkcc_ru_key');
		
        SiteSetting::updateOrCreate(
            ['name' => 'checker_key'],
            [
				'value' => serialize([
					'chk_cards_key' => $chk_cards_key,
					'checkcc_ru_key' => $checkcc_ru_key
				])
            ]
        );
        return redirect()->route('admin.setting.checkkey');
    }
}
