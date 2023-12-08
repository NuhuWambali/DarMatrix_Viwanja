<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Order,Payment};

class OrderController extends Controller
{
    //
    public function getOrderDetails($id)
    {
        $order=Order::findOrFail($id);
        $payment = Payment::where('order_id',$id);
        return view('partials.order-details')
        ->with(['order'=>$order, 'payment'=>$payment]);
    }
}
