@extends('layouts.mainLayouts')
@section('title','Customers')
@section('smallTitle','customers')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2">
                <a href="{{route('addCustomerPage')}}" class="btn btn-primary  mb-3" type="submit">Add Customer</a>
                </div>
                <div class="col-sm-10 ml-5 mt-1 text-center">
                    <h4 style="width:22em">All Customers</h4>
                </div>
            </div>
            <div class="table">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $index=>$customer)
                <tr class="align-middle">
                <td>
                    <h6>{{$index+1}}</h6>
                </td>
                <td>
                    <h6>{{$customer->fullname}}</h6>
                </td>
                <td>
                    <h6>{{$customer->email}}</h6>
                </td>
                <td>
                    <h6>{{$customer->address}}</h6>
                </td>
                <td>
                    <div class="row">

                        <div class="col-3">
                            <a href="{{route('customerDetails',$customer->id)}}" type="button" class="btn btn-primary btn-sm">
                                <i class='fas fa-eye'></i>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('editCustomer',$customer->id)}}" type="button" class="btn btn-success btn-sm">
                                <i class='fas fa-edit'></i>
                            </a>
                        </div>
                        <div class="col-3">
                            <form action="{{route('deleteCustomer',$customer->id)}}"  method="post" enctype="multipart/form-data">
                                @csrf
                            <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip"  data-placement="top" title="Delete Customer"  style="color:#fff"><i class='fas fa-trash'></i></button>
                        </div>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection
