<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DicountController extends Controller
{
    public function Fetch()
    {
        $data = Discount::first();
        return view('admin.discount', compact('data'));
    }
    public function Change(Request $request)
    {
        if ($request->discount > 100) {
            return redirect('admin/discount')->with('failed','Invalid Discount.');
        }else {
            $obj = Discount::find(1);
            $obj->discount = $request->discount;
            $obj->update();
    
            return redirect('admin/discount')->with('success','Discount Updated.');
        }
    }
}
