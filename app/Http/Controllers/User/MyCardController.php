<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CardSell;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class MyCardController extends Controller
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
        $title="My Cards";
        if ($request->ajax()) {
            $cards = CardSell::where('is_del', 0)->where('user_id', Auth::id())->orderBy('created_at', 'DESC');

            return DataTables::of($cards)
                ->addIndexColumn()                
                
                ->addColumn('action', function ($row) {
					if(!isset($row->card->exp_date)){
						$diff = 1;
					}else{
						$diff = strtotime('now') - strtotime($row->card->exp_date);
					}
                    $badge = "badge-success"; $status = "Live"; 

                    if($diff > 0) {$badge = "badge-danger"; $status = "Expired";}
                    $btn = '<span style="width:50px;" class="badge '.$badge.'">'.$status.'</span>';
                    return $btn;
                })
                ->editColumn('vote', function ($row) {		
                    // if($row->vote == 1){
                        
                    // }else{
                    //     $type = '';
                    // }
                    $type = '<button id="thumbup" data-type="1"><img alt="thumbnail" style="width:31px; height:30px;" src="' . asset('user_assets/images/cards/') . '/thumbup.png"></button>';
                    $type.='<button id="thumbdown" data-type="0"><img alt="thumbnail" style="width:31px; height:30px;" src="' . asset('user_assets/images/cards/') . '/thumbdown.png"></button>';
                    return $type;
                })            
                ->editColumn('created_at', function($row){ 
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y'); 
                    return $formatedDate; 
                })
                ->rawColumns(['info', 'action', 'vote'])
                ->make(true);
        }
        return view('user.my_card.list', compact('title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save($id, Request $request){
        return;
       
        // $card = Card::find($id);
        // $user = User::find(Auth::id());

        // if($card->is_purchased == 1){
        //     return response()->json(["status" => "error", "data" => 'Someone has already purchased this card.']);
        // }else if($card->price > $user->money){
        //     return response()->json(["status" => "error", "data" => 'You must buy more credit to get this card.']);
        // }

        
        // $user->money = $user->money - $card->price;
        // $user->buy_sum = $user->buy_sum + $card->price;
        // $user->save();
        // CardSell::create(
        //     [
        //         'user_id' => Auth::id(),
        //         'card_id' => $id,
        //         'cur_price' => $card->price,
        //     ]);

        // $card->is_purchased = 1;
        // $card->save();
        // return response()->json(["status" => "success", "data" => 'You have successfully purchased this card.']);
    }

    /**
	 * Save the card's vote.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function vote_save($id, Request $request){   
		$cardSell = CardSell::find($id);
        $cardSell->vote = intval($request->voteType);
        
        if($cardSell->save())
            return response()->json(["status" => "success", "data" => 'You are succeed to set Like/Dislike feedback!']);
        else    
            return response()->json(["status" => "error", "data" => 'You failed to add Like/Dislike feedback!']);
	}
}
