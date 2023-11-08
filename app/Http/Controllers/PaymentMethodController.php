<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
// use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentMethodController extends Controller
{
    //
    public function paymentMethodPage(){
        $allPaymentMethods = PaymentMethod::orderBy('created_at','desc')->get();
        return view('home.paymentMethod',compact('allPaymentMethods'));
    }

    public function addPaymentMethodPage(){
        return view('home.paymentMethodAdd');
    }

    public function addPaymentMethod(Request $request){
        $validatedData=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $addPaymentMethod=new PaymentMethod;
        $addPaymentMethod->name=$validatedData['name'];
        $addPaymentMethod->description=$validatedData['description'];
        if (PaymentMethod::where('name', $addPaymentMethod->name)->exists()) {
            return redirect()->back()->withErrors(['name' => 'The Payment method already exists in the database.'])->withInput();
        }
        $addPaymentMethod->save();
        Alert::success('Success', 'Payment Method Added Successfully!');
        return to_route('paymentMethod');
    }

    public function editPaymentMethodPage($id){
        $paymentMethods=PaymentMethod::findOrFail($id);
        return view('home.paymentMethodEdit',compact('paymentMethods'));
    }

    public function editPaymentMethod(Request $request,$id){
        $editPaymentMethod=PaymentMethod::findOrFail($id);
        $validatedData=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);
        $editPaymentMethod->name=$validatedData['name'];
        $editPaymentMethod->description=$validatedData['description'];
        $editPaymentMethod->save();
        Alert::success('Success','Payment Method Edited Successfully');
        return to_route('paymentMethod');
    }

    public function deletePaymentMethod($id){
        $deletePaymentMethod=PaymentMethod::findOrFail($id);
        $deletePaymentMethod->delete();
        Alert::success('Success','Payment method Deleted Successfully');
        return to_route('paymentMethod');
    }

}
