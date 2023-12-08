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
                @if($customers->count())
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
                    <a href="{{route('assignPlots',$customer->id)}}" class="btn btn-dark btn-sm" data-toggle="tooltip"  data-placement="top" title="Assign Plots"  style="color:#fff"><i class="fas fa-id-card" aria-hidden="true"></i></a>

                    <a href="{{route('customerDetails',$customer->id)}}" type="button" class="btn btn-primary btn-sm">
                        <i class='fas fa-eye'></i>
                    </a>
                    <a href="{{route('editCustomer',$customer->id)}}" type="button" class="btn btn-success btn-sm">
                        <i class='fas fa-edit'></i>
                    </a>
                    <a href="{{route('deleteCustomer',$customer->id)}}" class="btn btn-danger btn-sm" data-toggle="tooltip"  data-placement="top" title="Delete Customer"  style="color:#fff"><i class='fas fa-trash'></i></a>
                </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="12" class="text-center">no records found in database</td>
                </tr>
                @endif
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection
