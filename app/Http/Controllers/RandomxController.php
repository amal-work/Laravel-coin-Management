<?php

namespace App\Http\Controllers;

use App\Models\Randomx;
use Illuminate\Http\Request;

class RandomxController extends Controller
{
    public function Fetch()
    {
        $data = Randomx::first();
        return view('admin.random', compact('data'));
    }
    public function Change(Request $request)
    {
        $status = null;
            if($request->status == "on")
            {
                $status = 1;
            }else{
                $status = 0;
            }
            $obj = Randomx::find(1);
            $obj->number = $request->number;
            $obj->status = $status;
            $obj->update();
    
            return redirect('admin/random/number')->with('success','Number x Updated.');
     }
}
