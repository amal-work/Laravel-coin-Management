<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Card;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Models\Randomx;
use App\Models\CardSell;
use App\Models\Discount;
use App\Models\SiteSetting;
use App\Models\UserLiveCard;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
	public $count = 1;
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
		$discount = Discount::all()->first();
		$title = "Buy Cards";
	
		// $start    = (new DateTime($now->format('Y-m-d')))->modify('first day of this month');
        // $end      = (new DateTime(($now->addMonths($futureM))->format('Y-m-d')))->modify('first day of next month');
		// $next_month = Carbon::create(Carbon::now()->year, Carbon::now()->month+1, )
		
		$before_start = new Carbon('first day of last month');
		$before_end = new Carbon('last day of last month');		

		$next_start = new Carbon('first day of next month');
		$next_end = new Carbon('last day of next month');		

		// Card::where('exp_date', '<', $before_end)->update([
		// 	'is_del' => 1,
		// 	'category' => "Almost Free"
		// ]);

		// Card::where('exp_date', '<', $next_end)
		// 	  ->where('exp_date', '>', $next_start)->update([			
		// 	'category' => "MEGA DISCOUNT"
		// ]);		

		//dd(Carbon::now(), Carbon::now()->addDays(30));
		$countries = Card::where('is_del', 0)->where('is_purchased', 0)->groupBy('country')->select('country')->get();
		$categories = Card::where('is_del', 0)->where('is_purchased', 0)->groupBy('category')->select('category')->get();
		// $bins = Card::where('is_del', 0)->where('is_purchased', 0)->groupBy('card_number')->select(\DB::raw('SUBSTRING(card_number, 1, 4) as bin'))->get();

		if ($request->ajax()) {
			$cards = Card::where('is_purchased', 0)
				->where('is_del', 0)
				->orderBy('created_at', 'DESC');
				// ->where('exp_date', '>', \DB::raw('NOW()'))				
			// $a =Card::whereBetween('exp_date', [now()->startOfMonth(), now()->endOfMonth()])
			// 	->orderBy('exp_date', 'asc')
			// 	->take(3);

			// $cards = Card::where('is_purchased', 0)
			// 	->where('exp_date', '>', \DB::raw('NOW()'))
			// 	->orderBy('created_at', 'DESC');

			// $cards = $a->merge($b);

			// $products = Product::orderBy('expiry_date', 'asc')
            //         ->orderBy('created_at', 'desc')
            //         ->where('expiry_date', '<', now())
            //         ->take(3)
            //         ->get()
            //         ->merge(
            //             Product::orderBy('expiry_date', 'asc')
            //                 ->orderBy('created_at', 'desc')
            //                 ->where('expiry_date', '>=', now())
            //                 ->get()
            //         );

// 			$cards = Card::whereBetween(
// 				'exp_date',
// 				[
// 					Carbon::now()->startOfMonth(),
// 					Carbon::now()->endOfMonth()
// 				]
// 			)
//                     ->take(3)
// 					->union(
// 						Card::where("is_del",1)->take(3)
// 					)
					
// 					->union(
// 						Card::where('is_purchased', 0)
// 				->where('exp_date', '>', \DB::raw('NOW()'))
// 				->orderBy('created_at', 'DESC')
// 					);


			return DataTables::of($cards)
				->addIndexColumn()
				->addColumn('check', function ($row) {
					$discount = Discount::all()->first();
					$check = '<input type="checkbox" name="chkCard[]" value="' . $row->id . '" data-price="' . $row->price * (1 - ($discount->discount / 100)) . '" data-price-ref="' . $row->price . '" class="chkRow">';
					return $check;
				})
				->editColumn('type', function ($row) {
					$card_type = substr($row->card_number, 0, 1);
					$type = '<img alt="gallery thumbnail" style="width:45px; height:26px;" src="' . asset('user_assets/images/cards/' . $card_type) . '.png">';
					return $type;
				})
				->editColumn('exp_date', function ($row) {
					$yrdata = strtotime($row->exp_date);
					return date('n/Y', $yrdata);
				})
				->addColumn('bin', function ($row) {
					$bin = substr($row->card_number, 0, 6);
					return $bin;
				})
				->addColumn('action', function ($row) {
					$discount = Discount::all()->first();
					if ($row->is_del == 0) {
						$btn = '<div class="btn-wrap btn-wrap-' . $row->id . '"><div class="btn-item mb-1"><button type="button" data-id="' . $row->id . '" data-type="0" class="btn btn-warning btnEdit btn-sm">Buy NoRef($' . number_format($row->price * (1 - ($discount->discount / 100)), 1) . ')</button></div><div class="btn-item"><button type="button" data-id="' . $row->id . '" data-type="1" class="btn btn-success btnEdit btn-sm">Buy Ref($' . number_format($row->price, 1) . ')</button></div></div>';
					} else {
						$btn = '<div class="btn-wrap btn-wrap-' . $row->id . '"><div class="btn-item mb-1"><button type="button" data-id="' . $row->id . '" data-type="0" class="btn btn-warning btnEdit btn-sm">Buy NoRef($' . number_format($row->price * (1 - ($discount->discount / 100)), 1) . ')</button></div></div>';
					}
					return $btn;
				})
				->filter(function ($query) use ($request) {
					$query->when($request->get('country') != "", function ($query2) use ($request) {
						$query2->where('country', $request->get('country'));
					})
						->when($request->get('state') != "", function ($query2) use ($request) {
							$query2->where('state', $request->get('state'));
						})
						->when($request->get('category') != "", function ($query2) use ($request) {
							if ($request->get('category') == "megadiscount") {
								$query2->whereBetween(
									'exp_date',
									[
										new Carbon('first day of next month'),
										new Carbon('last day of next month'),

									]
								);
							} else if ($request->get('category') == "almostfree") {
								$query2->where('is_del', "=", 1);
							} else {
								$query2->where('category', 'like', '%' . $request->get('category') . '%');								
							}
						})
						->when($request->get('category') == "", function ($query2) use ($request) {
							$query2->where('is_del', "<>", 1);
						})
						->when($request->get('bin') != "", function ($query2) use ($request) {
							$query2->where('card_number', 'like',  $request->get('bin') . '%');
						})

						->when($request->get('zip') != "", function ($query2) use ($request) {
							$query2->where('zip', $request->get('zip'));
						})
						->when($request->get('type') != "", function ($query2) use ($request) {
							$query2->where('card_number', 'like', $request->get('type') . '%');
						});
				})
				->rawColumns(['type', 'action', 'check'])
				->make(true);
		}
		return view('user.card.list', compact('title', 'categories', 'countries', 'discount'));
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function save($id, Request $request)
	{
		$discount = Discount::all()->first();
		$buyType = $request->post('type');
		$checkOption = $request->post('check');
		$gate = $request->post('gate');
		$card = Card::find($id);
		$user = User::find(Auth::id());
		$setting_keys = unserialize(SiteSetting::where('name', 'checker_key')->first()->value);
		$setting_prices = unserialize(SiteSetting::where('name', 'checker_price')->first()->value);
		$gateName = 'AUTH';
		//check balance
		$cardprice = 0;
		$totalPrice = 0;
		$feeprice = 0;
		$btnRef = 0;

		if ($buyType == 0) { //Button name is Buy No REF
			$cardprice = $card->price * (1 - ($discount->discount / 100));
			$totalPrice = $cardprice;
			$btnRef = 0;
		} else {//Button name is Buy REF.
			$btnRef = 1;
			$cardinfo = $card->card_number . '|' . date('n|y', strtotime($card->exp_date)) . '|' . $card->cvv;
			$cardprice = $card->price;
			if ($checkOption == 1) {//checkbox is checked
				$feeprice = floatval(array_key_exists('chk_cards_buy', $setting_prices['check_buycard']) ? $setting_prices['check_buycard']['chk_cards_buy'] : 0);
				$totalPrice = $cardprice + $feeprice;
				if ($user->money < $feeprice || $user->money < $totalPrice) {
					return response()->json(["status" => "not enough money", "data" => 'Top up your account']);
				}

				$keyApi = array_key_exists('chk_cards_key', $setting_keys) ? $setting_keys['chk_cards_key'] : null;
				$url = 'https://api.chk.cards/v1/cards?key=' . $keyApi . '&card=' . $cardinfo . '&format=json&cc_format=1&safe_checking=0&bypass_prepaid=1';
				$getApi = SiteSetting::getAPI($url);
				$result = json_decode($getApi)->result;
				if ($result == 'DECLINED') {
					$totalPrice = $feeprice;
					$user->money = $user->money - $totalPrice;
					$user->save();
					$card->is_del = 1;  ///category is amlost free !!
					$card->category = "Almost Free";
					$card->save();
					//$card->update(['is_del' => 1]);
					return response()->json(["status" => "dead card", "data" => 'DEAD CARD. Your account will be charged a $' . number_format($totalPrice, 1) . ' check fee.', 'fee' => $totalPrice, 'msg' => 'Dead card', 'result' => $result]);
				} elseif ($result != 'APPROVED' && $result != 'ERROR') {
					$totalPrice = $feeprice;
					$user->money = $user->money - $totalPrice;
					$card->is_del = 1;
					$card->save();
					$user->save();
					return response()->json(["status" => "dead card", "data" => 'DEAD CARD. Your account will be charged a $' . number_format($totalPrice, 1) . ' check fee.', 'fee' => $totalPrice, 'msg' => 'Error card', 'result' => $result]);
				}
			} else {//checkbox is unchecked
				switch ($gate) {
					case 1:
						$feeprice = floatval(array_key_exists('checkcc_ru_auth_buy', $setting_prices['check_buycard']) ? $setting_prices['check_buycard']['checkcc_ru_auth_buy'] : 0);
						$gateName = 'AUTH';
						break;
					case 2:
						$feeprice = floatval(array_key_exists('checkcc_ru_sale_buy', $setting_prices['check_buycard']) ? $setting_prices['check_buycard']['checkcc_ru_sale_buy'] : 0);
						$gateName = 'SALE';
						break;
					case 3:
						$feeprice = floatval(array_key_exists('checkcc_ru_avs_buy', $setting_prices['check_buycard']) ? $setting_prices['check_buycard']['checkcc_ru_avs_buy'] : 0);
						$gateName = 'AVS';
						break;
					case 4:
						$feeprice = floatval(array_key_exists('checkcc_ru_charge_buy', $setting_prices['check_buycard']) ? $setting_prices['check_buycard']['checkcc_ru_charge_buy'] : 0);
						$gateName = 'CHARGE';
						break;
				}
				$totalPrice = $cardprice + $feeprice;
				if ($user->money < $feeprice || $user->money < $totalPrice) {
					return response()->json(["status" => "not enough money", "data" => 'Top up your account']);
				}
				$keyApi = array_key_exists('checkcc_ru_key', $setting_keys) ? $setting_keys['checkcc_ru_key'] : null;
				$url = 'https://api.check-cc.ru/?key=' . $keyApi . '&cc=' . $cardinfo . '&gate=' . $gateName;
				$getApi = SiteSetting::getAPI($url);
				$result = json_decode($getApi);
				if ($result->status == 'dead') {
					$totalPrice = $feeprice;
					$user->money = $user->money - $totalPrice;
					$user->save();
					$card->is_del = 1;
					$card->category = "Almost Free";
					$card->save();
					//$card->update(['is_del' => 1]);
					return response()->json(["status" => "dead card", "data" => 'DEAD CARD. Your account will be charged a $' . number_format($totalPrice, 1) . ' check fee.', 'fee' => $totalPrice]);
				} elseif ($result->status != 'live' && $result->status != 'error') {
					$totalPrice = $feeprice;
					$user->money = $user->money - $totalPrice;
					$card->is_del = 1;
					$card->save();
					$user->save();
					return response()->json(["status" => "dead card", "data" => 'DEAD CARD. Your account will be charged a $' . number_format($totalPrice, 1) . ' check fee.', 'fee' => $totalPrice]);
				}
			}
		}

		if ($user->money < $totalPrice) {
			return response()->json(["status" => "not enough money", "data" => 'Top up your account']);
		}
		$user->money = $user->money - $totalPrice;
		$user->save();

		$yrdata = strtotime($card->exp_date);
		$exp_date = date('n/Y', $yrdata);
		$info = $card->card_number . '|' .
			$exp_date . '|' .
			$card->cvv . '|' .
			$card->card_name . '|' .
			$card->card_address . '|' .
			$card->city . '|' .
			$card->state . '|' .
			$card->zip . '|' .
			$card->phone . '|' .
			$card->email . '|' .
			$card->country;
		CardSell::create(
			[
				'user_id' => Auth::id(),
				'card_id' => $id,
				'cur_price' => $cardprice,
				'btn_ref' => $btnRef,
				'info' => $info
			]
		);

		$card->is_purchased = 1;
		$card->save();
		return response()->json(["status" => "success", "data" => 'You have successfully purchased this card.']);
	}
	

	/**
	 * Save multiple cards.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function saves(Request $request)
	{
		$ids = $request->post('products');
		$cards = Card::whereIn('id', explode('|', $ids))->get();
		$user = User::find(Auth::id());
		$rows = [];

		$discount = Discount::all()->first();
		foreach ($cards as $key => $card) {
			$cardprice = $card->price * (1 - ($discount->discount / 100));
			if ($user->money < $cardprice) {
				return response()->json(["status" => "not enough money", "data" => 'You haven\'t enough cash to purchase all checked cards. \n purchased: ' . ($key + 1), "rows" => $rows]);
			}
			$user->money = $user->money - $cardprice;
			$user->save();
			$yrdata = strtotime($card->exp_date);
			$exp_date = date('n/Y', $yrdata);
			$info = $card->card_number . '|' .
				$exp_date . '|' .
				$card->cvv . '|' .
				$card->card_name . '|' .
				$card->card_address . '|' .
				$card->city . '|' .
				$card->state . '|' .
				$card->zip . '|' .
				$card->phone . '|' .
				$card->email . '|' .
				$card->country;
			CardSell::create(
				[
					'user_id' => Auth::id(),
					'card_id' => $card->id,
					'cur_price' => $cardprice,
					'info' => $info
				]
			);

			$card->is_purchased = 1;
			$card->save();
			$rows[] = $card->id;
		}

		return response()->json(["status" => "success", "data" => 'You have successfully purchased all checked cards.', "rows" => $rows]);
	}

	public function checkCards()
	{
		$title = "Check Cards";
		$setting_prices = unserialize(SiteSetting::where('name', 'checker_price')->first()->value);
		return view('user.card.check', compact(['title', 'setting_prices']));
	}

	public function processcheckCards(Request $request)
	{
		$card = implode("|", $request->post('card'));
		$checkOption = $request->post('checkOption');
		$gate = $request->post('gate');
		$cc = $request->post('cc');
		$mes = $request->post('mes');
		$ano = $request->post('ano');
		$cvv = $request->post('cvv');
		$feelive = 0;
		$feedead = 0;
		$cardinfo = $cc . '|' . $mes . '|' . substr($ano, -2) . '|' . $cvv;
		$user = User::find(Auth::id());
		$status = 'unknown';
		$chkOrange = 'CHK.CARDS';
		$msg = $cardinfo . '| Unknown | Credits:' . $user->money . ' | Checked With: ' . $chkOrange;
		$setting_keys = unserialize(SiteSetting::where('name', 'checker_key')->first()->value);
		$setting_prices = unserialize(SiteSetting::where('name', 'checker_price')->first()->value);
		$credit = 0;
		$gateName = 'AUTH';
		if ($checkOption == 1) {
			$feelive = floatval(array_key_exists('chk_cards', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards'] : 0);
			$feedead = floatval(array_key_exists('chk_cards_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['chk_cards_dead'] : 0);
			$chkOrange = 'CHK.CARDS';
			if ($feelive <= $feedead) {
				$credit = $feedead;
			} else {
				$credit = $feelive;
			}
			if ($user->money < $credit) {
				$status = 'not enough money';
				$msg = $cardinfo . '| Low Credits | Credits:' . $user->money;
			} else {
				$keyApi = array_key_exists('chk_cards_key', $setting_keys) ? $setting_keys['chk_cards_key'] : null;
				$url = 'https://api.chk.cards/v1/cards?key=' . $keyApi . '&card=' . $cardinfo . '&format=json&cc_format=1&safe_checking=0&bypass_prepaid=1';
				$getApi = SiteSetting::getAPI($url);
				$result = json_decode($getApi)->result;
				if ($result == 'APPROVED') {
					$user->money = $user->money - $feelive;
					$user->save();
					$status = 'live';
					$msg = $cardinfo . '| Your card is alive. | Credits:' . $user->money;
					UserLiveCard::create([
						'user_id' => Auth::id(),
						'card_info' => $card
					]);
				} elseif ($result == 'DECLINED') {
					$user->money = $user->money - $feedead;
					$user->save();
					$status = 'dead';
					$msg = $cardinfo . '| Your card was declined. | Credits:' . $user->money;
				} else {
					$status = 'unknown';
					$msg = $cardinfo . '| ' . $result . ' | Credits:' . $user->money;
				}
			}
		} else {
			switch ($gate) {
				case 1:
					$feelive = floatval(array_key_exists('checkcc_ru_auth', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_auth'] : 0);
					$feedead = floatval(array_key_exists('checkcc_ru_auth_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_auth_dead'] : 0);
					$gateName = 'AUTH';
					break;
				case 2:
					$feelive = floatval(array_key_exists('checkcc_ru_sale', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_sale'] : 0);
					$feedead = floatval(array_key_exists('checkcc_ru_sale_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_sale_dead'] : 0);
					$gateName = 'SALE';
					break;
				case 3:
					$feelive = floatval(array_key_exists('checkcc_ru_avs', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_avs'] : 0);
					$feedead = floatval(array_key_exists('checkcc_ru_avs_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_avs_dead'] : 0);
					$gateName = 'AVS';
					break;
				case 4:
					$feelive = floatval(array_key_exists('checkcc_ru_charge', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_charge'] : 0);
					$feedead = floatval(array_key_exists('checkcc_ru_charge_dead', $setting_prices['check_cards']) ? $setting_prices['check_cards']['checkcc_ru_charge_dead'] : 0);
					$gateName = 'CHARGE';
					break;
			}
			$chkOrange = 'CHECK-CC.RU';
			if ($feelive <= $feedead) {
				$credit = $feedead;
			} else {
				$credit = $feelive;
			}
			if ($user->money < $credit) {
				$status = 'not enough money';
				$msg = $cardinfo . '| Low Credits | Credits:' . $user->money;
			} else {
				$keyApi = array_key_exists('checkcc_ru_key', $setting_keys) ? $setting_keys['checkcc_ru_key'] : null;
				$url = 'https://api.check-cc.ru/?key=' . $keyApi . '&cc=' . $cardinfo . '&gate=' . $gateName;
				$getApi = SiteSetting::getAPI($url);
				$result = json_decode($getApi);

				if ($result->status == 'live') {
					$user->money = $user->money - $feelive;
					$user->save();
					$status = 'live';
					$msg = $cardinfo . '| ' . explode(" ", $result->msg)[4] . ' | Credits:' . $user->money;
					UserLiveCard::create([
						'user_id' => Auth::id(),
						'card_info' => $card
					]);
				} elseif ($result == 'dead') {
					$user->money = $user->money - $feedead;
					$user->save();
					$status = 'dead';
					$msg = $cardinfo . '| ' . explode(" ", $result->msg)[4] . ' | Credits:' . $user->money;
				} elseif ($result == 'error') {
					$status = 'error';
					$msg = $cardinfo . '| ' . $result->msg . ' | Credits:' . $user->money;
				} else {
					$status = 'unknown';
					$msg = $cardinfo . '| ' . $result->msg . ' | Credits:' . $user->money;
				}
			}
		}
		return response()->json(["status" => $status, "msg" => $msg]);
	}

	public function search_state($id)
	{
		$states = Card::where('country', $id)->where('is_del', 0)->where('is_purchased', 0)->groupBy('state')->select('state')->get();
		return response()->json(["status" => "success", "data" => $states]);
	}

	public function search_city($id)
	{
		$cities = Card::where('state', $id)->where('is_del', 0)->where('is_purchased', 0)->groupBy('city')->select('city')->get();
		return response()->json(["status" => "success", "data" => $cities]);
	}
}
