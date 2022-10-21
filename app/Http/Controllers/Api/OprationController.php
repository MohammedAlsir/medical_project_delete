<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medicine;
use App\Models\Order;
use App\Traits\ApiMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OprationController extends Controller
{
    use ApiMessage;

    public function get_medicine()
    {
        $medicine = Medicine::with('pharma')->where('amount', '>=', '1')->orderBy('id', 'DESC')->get();

        return $this->returnData('medicine', $medicine);
    }

    public function order(Request $request)
    {
        $data = $request->validate([
            'medicine_id'     => 'required',
            'amount'  => 'required'
        ]);
        if (!Medicine::find($request->medicine_id)) {
            return $this->returnMessage(false, 'هذا الدواء غير موجود', 200);
        }

        $order = new Order();
        $order->medicine_id = $request->medicine_id;
        $order->status = '1';
        $order->amount = $request->amount;
        $order->pharma_id = Medicine::find($request->medicine_id)->pharma_id;
        $order->user_id = Auth::user()->id;
        $order->save();

        return $this->returnData('order', $order);
    }

    public function get_order()
    {

        $order = Order::with('medicine')->where('user_id', Auth::user()->id)->get();


        return $this->returnData('order', $order);
    }
}