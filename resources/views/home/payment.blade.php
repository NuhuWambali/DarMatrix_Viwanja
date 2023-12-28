@extends('layouts.mainLayouts')
@section('title','Payment')
@section('smallTitle','Payment')
@section('content')
    @include('sweetalert::alert')
    <div class="card mb-4">
        <div class="card-body">
            <div class="">
                <div class="row">
                    <div class="text-center mb-4 col-8">
                        <h4 style="width:22em" class="text-center "> Plot number : {{$orderDetails->plot->plot_number}} - Payment Section</h4>
                    </div>
                    <div class="col-2">

                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Payment History
                        </button>
                    </div>
                </div>
                <table class="table table-bordered roundedCorners">
                    <tbody>
                    <tr>
                        <th>Total Amount</th>
                        @if($orderDetails->payment_way==="installment")
                        <td>Tsh. {{number_format($orderDetails->plot->installment_total_value)}}</td>
                        @else
                            <td>Tsh. {{number_format($orderDetails->plot->cash_total_value)}}</td>
                        @endif
                            <th>Duration</th>
                        @if(empty($paymentDetails))
                        <td>0 / {{$orderDetails->plot->installment_period}} Month</td>
                        @else
                            <td>{{$paymentDetails->installment_number}} / {{$orderDetails->plot->installment_period}} Month</td>
                        @endif
                    </tr>
                    <tr>
                        @if(empty($paymentDetails))
                            <th>Amount Paid</th>
                            <td>Tsh. 0</td>
                            <th>Amount Remain</th>
                            <td>
                                @if($orderDetails->payment_way === "installment")
                                    Tsh. {{ number_format($orderDetails->plot->installment_total_value) }}
                                @else
                                    Tsh. {{ number_format($orderDetails->plot->cash_total_value) }}
                                @endif
                            </td>
                        @else
                            <th>Amount Paid</th>
                            <td>Tsh. {{ number_format($paymentDetails->amount_paid) }}</td>
                            <th>Amount Remain</th>
                            <td>Tsh. {{ number_format($paymentDetails->amount_remain) }}</td>
                        @endif

                    </tr>
                    @if(empty($paymentDetails))
                    <tr>
                        <th>Payment Status</th>
                        <td colspan="12" class="text-center text-success">Not Initiated</td>
                    </tr>
                    @else
                        <tr>
                            <th>Payment Status</th>
                            @if($paymentDetails->amount_paid>=$paymentDetails->total_amount)
                            <td colspan="12" class="text-center text-success">Payment Done</td>
                            @else
                                <td colspan="12" class="text-center text-primary">On Progress</td>
                            @endif
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <form action="{{route('addPayment',$orderDetails->id)}}" method="post">
            @csrf
        <div class="mb-3  ml-3 row">
            <label class="col-sm-2  " for="input" style="padding-left: 30px">Enter Amount</label>
            <div class="col-sm-7">
                <input class="form-control @error('amount') is-invalid @enderror" type="text" id="amount" name="amount" value="{{old('amount')}}" required>
                @error('amount')
                <p class="dismissAlert text-danger" id="dismissAlert">
                    {{$message}}
                </p>
                @enderror
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary">Pay</button>
            </div>
        </div>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Transaction History</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Transaction Number</th>
                            <th scope="col">Date</th>
                            <th scope="col">Signed by</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paymentTransactions as $index=>$paymentTransaction)
                        <tr>
                            <th scope="row">{{$index+1}}</th>
                            <td>Tsh. {{number_format($paymentTransaction->amount_paid)}}</td>
                            <td>{{$paymentTransaction->installation_number}}</td>
                            <td>{{$paymentTransaction->transaction_time}}</td>
                            <td>{{$paymentTransaction->created_by}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection
