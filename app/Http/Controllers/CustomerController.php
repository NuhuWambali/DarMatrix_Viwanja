<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\{Customer,Order,Project,Plot};

class CustomerController extends Controller
{
    //
    public function viewCustomers(){
       $customers=Customer::all();
        return view('home.customers',compact('customers'));
    }

    public function addCustomerPage(){
        return view('home.customerAdd');
    }

    public function addCustomer(Request $request, Customer $customer){
        $authUserName=Auth::user()->username;
        $addCustomer = new Customer;
        $validatedCustomerData=$request->validate([
            'fullname'=>'required',
            'phone_number'=>'required',
            'email'=>'required|unique:customers|email',
            'date_of_birth'=>'required',
            'national_id_number'=>'required|numeric|unique:customers',
            'address'=>'required',
            'status'=>'required',
        ]);
        $addCustomer = new Customer;
        $addCustomer->fullname=$validatedCustomerData['fullname'];
        $addCustomer->phone_number=$validatedCustomerData['phone_number'];
        $addCustomer->email=$validatedCustomerData['email'];
        $addCustomer->date_of_birth=$validatedCustomerData['date_of_birth'];
        $addCustomer->address=$validatedCustomerData['address'];
        $addCustomer->national_id_number=$validatedCustomerData['national_id_number'];
        $addCustomer->description1=$request->description1;
        $addCustomer->description2=$request->description2;
        $addCustomer->description3=$request->description3;
        $addCustomer->description4=$request->description4;
        $addCustomer->description5=$request->description5;
        $addCustomer->description6=$request->description6;
        if($request->file){
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $addCustomer->file = '/storage/' . $filePath;
        }
        $addCustomer->status=$validatedCustomerData['status'];
        $addCustomer->created_by=$authUserName;
        $addCustomer->modified_by=$authUserName;
        $addCustomer->save();
        Alert::success('Success', 'Customer Added Successfully!');
        return to_route('viewCustomers');
    }

    public function customerDetails($id){
        $customerDetails=Customer::findOrFail($id);
        return view('home.customerDetails',compact('customerDetails'));
    }

    public function editCustomerPage($id){
        $editCustomer=Customer::findOrFail($id);
        return view('home.customerEdit',compact('editCustomer'));
    }

    public function editCustomer($id,Request $request){
        $editCustomer=Customer::findOrFail($id);
        $authUserName=Auth::user()->username;
        $addCustomer = new Customer;
        $validatedCustomerData=$request->validate([
            'fullname'=>'required',
            'phone_number'=>'required',
            'email'=>'required|email',
            'date_of_birth'=>'required',
            'national_id_number'=>'required|numeric',
            'address'=>'required',
            'status'=>'required',
        ]);
        $editCustomer->fullname=$validatedCustomerData['fullname'];
        $editCustomer->phone_number=$validatedCustomerData['phone_number'];
        $editCustomer->email=$validatedCustomerData['email'];
        $editCustomer->date_of_birth=$validatedCustomerData['date_of_birth'];
        $editCustomer->address=$validatedCustomerData['address'];
        $editCustomer->national_id_number=$validatedCustomerData['national_id_number'];
        $editCustomer->description1=$request->description1;
        $editCustomer->description2=$request->description2;
        $editCustomer->description3=$request->description3;
        $editCustomer->description4=$request->description4;
        $editCustomer->description5=$request->description5;
        $editCustomer->description6=$request->description6;
        if($request->file){
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $addCustomer->file = '/storage/' . $filePath;
        }
        $editCustomer->status=$validatedCustomerData['status'];
        $editCustomer->created_by=$authUserName;
        $editCustomer->modified_by=$authUserName;
        $editCustomer->save();
        Alert::success('Success', 'Customer Edited Successfully!');
        return to_route('viewCustomers');
    }


    public function deleteCustomer($id){
        $deleteCustomer=Customer::findOrFail($id);
        $deleteCustomer->delete();
        Alert::success('Success', 'Customer Deleted Successfully');
        return to_route('viewCustomers');
    }


    public function assignPlotsPage($id){
        $customer = Customer::findOrFail($id);
        $projects = Project::all();
        $payment_methods=PaymentMethod::all();
        $orders = Order::where('customer_id', $customer->id)->with('project','plot')->get();
        return view('home.customersAssignPlots', compact('customer', 'projects', 'orders','payment_methods'));
    }

    public function assignPlots(Request $request){
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
        Alert::success('Success', 'Order Created Successfully!');
        return redirect()->route('assignPlots', $customer_id);
    }


}
