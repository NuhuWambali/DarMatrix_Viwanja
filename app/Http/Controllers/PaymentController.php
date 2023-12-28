<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
//    public function addPayment(Request $request, $id) {
//        $username = Auth::user()->username;
//        $order = Order::find($id);
//        $projectId=$order->customer_id;
//        $total_amount = ($order->plot->payment_way == 'cash') ? $order->plot->cash_total_value : $order->plot->installment_total_value;
//        $validatedCustomerData=$request->validate([
//            'down_amount' => ['numeric', 'lte:' . $total_amount],
//        ], [
//            'down_amount.lte' => 'Down payment must be less than or equal to the total amount.',
//        ]);
//        $existingPayment = Payment::where('order_id', $order->id)->first();
//        if($validatedCustomerData<= $total_amount){
//
//        else{
//            Alert::error('Error', 'Amount is Greater than total amount');
//            return to_route('assignPlots',$projectId);
//        }
//
//
//    }

    public function paymentDetails($id)
    {

        $orderDetails = Order::findOrFail($id);
        $paymentDetails = Payment::where('order_id', $id)->first();
        return view('home.payment', compact('orderDetails', 'paymentDetails'));
    }

    public function addPayment(Request $request, $id){
        $username = Auth::user()->username;
        $orderDetails = Order::findOrFail($id);
        $paymentDetails = Payment::where('order_id', $id)->first();
        $totalAmount = ($orderDetails->plot->payment_way == 'cash') ? $orderDetails->plot->cash_total_value : $orderDetails->plot->installment_total_value;
        if($paymentDetails){
            $amountPaid = $paymentDetails ? $paymentDetails->amount_paid : 0; // Assuming $paymentDetails is available
            $validatedCustomerData = $request->validate([
                'amount' => ['numeric', 'lte:' . ($totalAmount - $amountPaid)],
            ], [
                'amount.lte' => 'Payment must be less than or equal to the remaining amount.',
            ]);
        }
        $validatedCustomerData=$request->validate(['amount' => ['numeric', 'lte:' . $totalAmount], ], [
            'amount.lte' => 'payment must be less than or equal to the total amount.',
        ]);
        try {
            $addPayment = $paymentDetails ?? new Payment();
            if (!$paymentDetails) {
                $amountRemain = $totalAmount -  $validatedCustomerData['amount'];
                $addPayment->amount_paid = $validatedCustomerData['amount'];
                $installmentNumber = $addPayment->installment_number + 1;
            } else {
                $addPayment->amount_paid += $validatedCustomerData['amount'];
                $amountRemain = $totalAmount - $addPayment->amount_paid;
                $installmentNumber = $addPayment->installment_number + 1;
            }

            $addPayment->order_id = $orderDetails->id;
            $addPayment->total_amount = $totalAmount;
            $addPayment->amount_remain = $amountRemain;
            $addPayment->installment_number = $installmentNumber;
            $addPayment->payment_status = 1;
            $addPayment->created_by = $username;
            $addPayment->updated_by = $username;
            $addPayment->save();
            DB::table('payment_transactions')->insert([
                'payment_id' => $addPayment->id,
                'amount_paid'=>$validatedCustomerData['amount'],
                'installation_number'=>$installmentNumber,
                'transaction_time' => now(),
                'created_by'=>$username
            ]);
            Alert::success('Success', 'Payment is made successfully');
            return redirect()->route('payment', $orderDetails->id);
        }
        catch (ModelNotFoundException $exception) {
            Alert::error('Error', 'Order or Payment not found.');
            return redirect()->back();
        }
    }
}
