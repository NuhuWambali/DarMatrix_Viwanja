<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Customer, Order,PaymentMethod, Plot, Project};
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
        if($existingOrder) {
            Alert::error('Error','Order already exists for this plot!');
            return redirect()->route('assignPlots', $customer_id);
        }
        $createOrder = new Order;
        $createOrder->customer_id = $validatedOrderData['customer_id'];
        $createOrder->plot_id = $validatedOrderData['plot_id'];
        $createOrder->payment_method_id = $validatedOrderData['payment_method_id'];
        $createOrder->payment_way = $validatedOrderData['payment_way'];
        $createOrder->signed_by = $username;
        $createOrder->save();
        $plot = Plot::find($validatedOrderData['plot_id']);
        if($plot){
            $plot->status = 0;
            $plot->save();
        }
        Alert::success('Success', 'Order Created Successfully!');
        return redirect()->route('assignPlots', $customer_id);
    }

    public function deleteOrder($id){
        $deleteOrder = Order::findOrFail($id);
        $plotId=$deleteOrder->plot_id;
        if ($plotId) {
            $deleteOrder->delete();
            $editPlot = Plot::findOrFail($plotId);
            $editPlot->status = 1;
            $editPlot->save();
            Alert::success('Success', 'Order Deleted Successfully and Plot Status Updated!');
            return redirect()->back();
        } else {
            Alert::error('Error', 'Plot not found for this order.');
            return redirect()->back();
        }
    }


}
