<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function addPayment(Request $request, $id) {

        $username = Auth::user()->username;
        $order = Order::find($id);
        $projectId=$order->customer_id;
        $total_amount = ($order->plot->payment_way == 'cash') ? $order->plot->cash_total_value : $order->plot->installment_total_value;
        $validatedCustomerData=$request->validate([
            'down_amount' => ['numeric', 'lte:' . $total_amount],
        ], [
            'down_amount.lte' => 'Down payment must be less than or equal to the total amount.',
        ]);
        $existingPayment = Payment::where('order_id', $order->id)->first();
        if($validatedCustomerData<= $total_amount){
            if ($existingPayment) {
                $existingPayment->amount_paid += $validatedCustomerData;
                $existingPayment->amount_remain = $total_amount - $existingPayment->amount_paid;
                $existingPayment->installment_number += 1;
                if ( $existingPayment->amount_paid >= $total_amount) {
                    Alert::error('Error', 'Amount is Greater than total amount');
                    return to_route('assignPlots',$projectId);
                }
                else{
                    $existingPayment->payment_status = ($existingPayment->amount_paid === $total_amount) ? 'done' : 'On Progress';
                    $existingPayment->updated_by = $username;
                    $existingPayment->updated_at = now();
                    $existingPayment->save();
                    Alert::success('Success', 'Payment is made successfully');
                    return to_route('assignPlots',$projectId);
                }
            }
            else {
                $addPayment = new Payment;
                $addPayment->order_id = $order->id;
                $addPayment->total_amount = $total_amount;
                $addPayment->amount_paid = $validatedCustomerData;
                $addPayment->amount_remain = $total_amount - $validatedCustomerData;
                $addPayment->installment_number = 1;
                if ( $existingPayment->amount_paid >= $total_amount) {
                    Alert::error('Error', 'Amount is Greater than total amount');
                    return to_route('assignPlots',$projectId);
                }
                else{
                    $addPayment->payment_status = ($validatedCustomerData>= $total_amount) ? 'done' : 'On Progress';
                    $addPayment->created_by = $username;
                    $addPayment->updated_by = $username;
                    $addPayment->created_at = now();
                    $addPayment->updated_at = now();
                    $addPayment->save();
                    Alert::success('Success', 'Payment is made successfully');
                    return to_route('assignPlots',$projectId);
                }
            }
        }
        else{
            Alert::error('Error', 'Amount is Greater than total amount');
            return to_route('assignPlots',$projectId);
        }


    }

   public function paymentDetails($orderId){
       $paymentDetails=Payment::findOrFail($orderId);
       $orderDetails=Order::findOrFail($orderId);
        return view('home.payment',compact('paymentDetails','orderDetails'));
   }

}
