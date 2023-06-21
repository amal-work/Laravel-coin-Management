<?php

namespace App\Http\Controllers\Admin\Card;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Card;
use App\Models\Country;
use App\Models\State;
use App\Models\Discount;
use App\Models\CardValue;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class CardController extends Controller
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

        $title = "Card Management";
		// $delete_exp_date = Card::where('exp_date','<', \DB::raw('NOW()'))->update([
        //     'is_del' => 1
		// ]);
        $countries = Card::where('is_purchased', 0)->groupBy('country')->select('country')->get();

        $categories = Card::where('is_purchased', 0)->groupBy('category')->select('category')->get();
		
        if ($request->ajax()) {
            $cards = Card::where('is_purchased', 0)
            // ->where('exp_date','>', \DB::raw('NOW()'))
            ->orderBy('created_at', 'DESC');

            return DataTables::of($cards)
                ->addIndexColumn()
                ->editColumn('type', function ($row) {
                    $card_type = substr($row->card_number, 0, 1);
                    $type = '<img alt="gallery thumbnail" style="width:45px; height:26px;" src="'.asset('user_assets/images/cards/'.$card_type).'.png">';
                    return $type;
                })
                
                ->editColumn('exp_date', function ($row) {
                    $yrdata= strtotime($row->exp_date);
                    return date('n/Y', $yrdata);
                })
                ->addColumn('bin', function ($row) {
                    $bin = substr($row->card_number, 0, 6);
                    return $bin;
                })
                ->addColumn('action', function ($row) {
                    
                    $btn = '';
                    if($row->is_purchased == 0){
                        $btn .= '<button type="button" data-id="'.$row->id.'" class="btn btn-sm btn-warning btnEdit">Edit</button>';
                        $btn .= '<button type="button" data-id="'.$row->id.'" class="btn btn-sm btn-danger btnDelete">Delete</button>';    
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
                        }else if($request->get('category') == "almostfree"){
                            $query2->where('is_del',"=", 1);
                        }  else {
                            $query2->where('category', 'like', '%'.$request->get('category').'%');
                        }
                        
                        
                    })
                    ->when($request->get('bin') != "", function ($query2) use ($request) {
                        $query2->where('card_number', 'like',  $request->get('bin').'%');
                    })                    
                    ->when($request->get('zip') != "", function ($query2) use ($request) {
                        $query2->where('zip', $request->get('zip'));
                    })
                    ->when($request->get('type') != "", function ($query2) use ($request) {
                        $query2->where('card_number', 'like', $request->get('type').'%');
                    });
                })
                ->rawColumns(['type', 'action'])
                ->make(true);
        }
        return view('admin.card.list', compact('title', 'categories', 'countries'));
    }

    //(post)
    public function edit($id = 0)
    {
        $title = "Edit";
        if ($id == 0) {
            $title = "Add";
        }

        $card = Card::where('id', $id)
            ->firstOrNew();

        $countries = Country::where('is_use', 1)->where('is_del', 0)->get();
        $states = State::where('is_use', 1)->where('is_del', 0)->get();

        return view('admin.card.detail', compact('title', 'id', 'card', 'countries', 'states'));
    }
    public function save($id, Request $request)
    {
        
        $data = [
            'type' => $request->post('type'),
            'cvv' => $request->post('cvv'),
            'exp_date' => $request->post('exp_date'),
            'category' => $request->post('category'),
            'price' => $request->post('price'),
            'name' => $request->post('name'),
            'email' => $request->post('email'),
            'phone' => $request->post('phone'),
            'card_number' => $request->post('card_number'),
            'card_address' => $request->post('card_address'),
            'country' => $request->post('country'),
            'state' => $request->post('state'),
            'city' => $request->post('city'),
            'zip' => $request->post('zip'),
            'is_del' => 0
        ];
        
        $card = Card::updateOrCreate(
            ['id' => $id],
            $data
        );
        $data = '<script>alert("Successfully saved");window.opener.location.reload();window.close();</script>';
        return view('test', compact('data'));
        //$user->image = asset('storage/'. $user->image);
        //return response()->json(["status" => "success", "data" => $card]);
    }

    

    //
    public function state($coinId, Request $request)
    {
        $status = $request->post('status');

        
       
        $coin = Coin::where('id', $coinId)
            ->update(            
                ['is_use' => $status]
            );
        //$user->image = asset('storage/'. $user->image);
        return response()->json(["status" => "success", "data" => $coin]);
    }

    public function search_state($id){
        $states = Card::where('country', $id)->where('is_del', 0)->where('is_purchased', 0)->groupBy('state')->select('state')->get();
        return response()->json(["status" => "success", "data" => $states]);
    }

    public function search_city($id){
        $cities = Card::where('state', $id)->where('is_del', 0)->where('is_purchased', 0)->groupBy('city')->select('city')->get();
        return response()->json(["status" => "success", "data" => $cities]);
    }
    
    public function upload_file(Request $request){
        $contents = file_get_contents($_FILES['file']['tmp_name']);
        $arrayContents = explode("\n", $contents);
        $input_cnt = count($arrayContents)-1;
        $data = [];
        $error_val = array();
        foreach ($arrayContents as $key => $item) {
            $vals = explode("|", $item);
            //'CreditCardNumber|Month|Year|Cvv|Name|StreetAddress|City|State|ZipCode|PhoneNr|Email|Country';
            if($key == $input_cnt){
                break;
            }
            if(count($vals) != 12 || $key == $input_cnt){
                $error_val[] = $key;
                continue;
                //return response()->json(["status" => "failed", "data" => "Format error. \n Line number: $key"]); 
            }
             
            $itemData = array(
                'image' => '',
                'cvv' => $vals[3],
                'name' => $vals[4],
                'email' => $vals[10],
                'phone' => $vals[9],
                'card_number' => $vals[0],
                'card_address' => $vals[5],
                'exp_date' => date('Y-m-d', strtotime($vals[2].'-'.$vals[1].'-01')),
                'category' => $request->post('category'),
                'price' => $request->post('price'),
                'country' => $vals[11],
                'state' => $vals[7],
                'city' => $vals[6],
                'zip' => $vals[8],
                'is_del' => 0
            );
            $data[] = $itemData;
        }
        Card::insert($data);
        
        $error_cnt = count($error_val);
        $success_cnt = $input_cnt - $error_cnt;//
        return response()->json(["status" => "success", "data" => compact('input_cnt', 'success_cnt', 'error_cnt', )]);
    }

    //display the card's value
    public function card_value_edit()
    {
        $data = CardValue::where('flag', 1)->first();
        return view('admin.card.almost_free', compact('data'));
    }
    //display the card's value
    public function mega_card_edit()
    {
        $data = CardValue::where('flag', 0)->first();
        return view('admin.card.mega_discount', compact('data'));
    }
    
    //update the card's value(1: almost free, 0: mega discount)
    public function card_change($id, Request $request)
    {
        $obj = CardValue::where('flag', $id)->first();
        $obj->price = $request->charge;        
        $obj->save();
        if(($obj->save())&& ($id==1)){
            $cards = Card::where('is_purchased', 0)				
                ->where('is_del', "=", 1)
				->orderBy('created_at', 'DESC')->update([
                    'price' => $request->charge
                ]);        
            return redirect('admin/card/card_value_edit')->with('success','Almost Free Card Value Updated!');
        }else if(($obj->save())&& ($id==0)){ //mega discount value
            $cards = Card::where('is_purchased', 0)				
                ->whereBetween(
                'exp_date',
                    [
                        new Carbon('first day of next month'),
                        new Carbon('last day of next month'),

                    ]
                )
				->orderBy('created_at', 'DESC')->update([
                    'price' => $request->charge
                ]);
            
            return redirect('admin/card/mega_card_edit')->with('success','Mega Discount Value Updated!');
        }            
    }
}
