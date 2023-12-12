@extends('layouts.mainLayouts')
@section('title','Payment Method')
@section('smallTitle','Payment Method')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-4">
                <a href="{{route('addPaymentMethodPage')}}" class="btn btn-primary bt-sm mb-3" type="submit">Add </a>
                </div>
                <div class="row">
                    <div class="col-sm-12 ml-5 my-1 text-center" >
                        <h4 style="width:22em;margin-left:7em">All Payment Method</h4>
                    </div>
                </div>

            </div>
            <div class="table">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Name</th>
                <th>Description</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($allPaymentMethods->count())
                @foreach($allPaymentMethods as $index=>$paymentMethod)
                <tr class="align-middle">
                <td>
                    <h6>{{$index+1}}</h6>
                </td>
                <td>
                    <h6>{{$paymentMethod->name}}</h6>
                </td>
                <td>
                    <h6>{{$paymentMethod->description}}</h6>
                </td>
                <td>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('editPaymentMethodPage',$paymentMethod->id)}}"  class="btn btn-primary btn-sm " data-toggle="tooltip" data-placement="top"title="Edit Payment Method"><i class='fas fas fa-edit'></i></a>
                        </div>
                        <div class="col-3">
                                 <form action="{{route('deletePaymentMethod',$paymentMethod->id)}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:#fff" data-toggle="tooltip" data-placement="top" title="Delete Payment Method"><i class='fas fas fa-trash'></i></button>
                                </form>
                        </div>

                    </div>
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

