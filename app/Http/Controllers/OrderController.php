<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer, Order, Payment, PaymentMethod, Plot, Project};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    //
    public function assignPlotsPage($id){
        $customer = Customer::findOrFail($id);
        $projects = Project::all();
        $payment_methods=PaymentMethod::all();
        $orders = Order::where('customer_id', $customer->id)->with('project','plot')->get();
        return view('home.customersAssignPlots', compact('customer', 'projects', 'orders','payment_methods'));
    }
    public function assignPlots(Request $request){
        $username=Auth::user()->username;
        $customer_id = $request->customer_id;
        $validatedOrderData = $request->validate([
            'customer_id' => 'required',
            'project_id' => 'required',
            'plot_id' => 'required',
            'payment_way'=>'required',
            'payment_method_id'=>'required'
        ]);
        $existingOrder = Order::where('plot_id', $validatedOrderData['plot_id'])->first();
        if ($existingOrder) {
            Alert::error('Error','Order already exists for this plot!');
            return redirect()->route('assignPlots', $customer_id);
        }
        $createOrder = new Order;
        $createOrder->customer_id = $validatedOrderData['customer_id'];
        $createOrder->project_id = $validatedOrderData['project_id'];
        $createOrder->plot_id = $validatedOrderData['plot_id'];
        $createOrder->payment_method_id = $validatedOrderData['payment_method_id'];
        $createOrder->payment_way = $validatedOrderData['payment_way'];
        $createOrder->save();
        $plot = Plot::find($validatedOrderData['plot_id']);
        if($plot){
            $plot->status = 0;
            $plot->save();
        }
//        DB::table('payments')->insert([
//            'order_id' => $createOrder->id,
//            'total_amount'=>null,
//            'amount_paid'=>'',
//            'amount_remain' => '',
//            'payment_status' => 1,
//            'installment_number' => '',
//            'created_by'=>$username,
//            'updated_by'=>$username
//        ]);
        Alert::success('Success', 'Order Created Successfully!');
        return redirect()->route('assignPlots', $customer_id);
    }

}
