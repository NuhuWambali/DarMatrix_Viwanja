@extends('layouts.mainLayouts')
@section('title','Report')
@section('smallTitle','Payment Report')
@section('content')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-10 mt-1">
                    <h4 style="width:22em" class="my-2">All Payments</h4>
                </div>
                <div class="col-sm-2 my-3">
                    <h6>Download</h6>
                    <a href="{{route('downloadPaymentsReportPDF')}}" class="btn btn-primary btn-sm">PDF</a>
                    <div class="btn  btn-outline-primary btn-sm">Excel</div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                            <th>#</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Paid</th>
                            <th>Remain</th>
                            <th>Installment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($payments->count())
                            @foreach($payments as $index=>$payment)
                            <tr class="align-middle">
                                <td>
                                    <h6>{{$index+1}}</h6>
                                </td>
                                <td>
                                    <h6>{{$payment->order->customer->fullname}}</h6>
                                </td>
                                <td>
                                    <h6>{{number_format($payment->total_amount)}}</h6>
                                </td>
                                <td>
                                    <h6>{{number_format($payment->amount_paid)}}</h6>
                                </td>
                                <td>
                                   <h6>{{number_format($payment->amount_remain)}}</h6>
                                </td>
                                <td>
                                    <h6>{{$payment->installment_number}}</h6>
                                 </td>
                                 <td>
                                    @if($payment->payment_status=='1')
                                    <h6 class="text-center" style="background-color: blue; border-radius: 16px; padding: 2px; color: white;">On Progress</h6>
                                    @else
                                    <h6 class="text-center" style="background-color: green; border-radius: 16px; padding: 2px; color: white;">Complete</h6>
                                    @endif
                                 </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="12" class="text-center my-5">no records found in database</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
