@extends('layouts.mainLayouts')
@section('title','Payment')
@section('smallTitle','Payment')
@section('content')
    @include('sweetalert::alert')
    <div class="card mb-4">
        <div class="card-body">
            <div class="">
                <div class="row">
                    <div class="text-center mb-4">
                        <h4 style="width:22em" class="text-center"> Plot number : {{$orderDetails->plot->plot_number}} - Payment Section</h4>
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
                        <td>{{$orderDetails->plot->installment_period}} Month</td>
                    </tr>
                    <tr>
                        <th>Amount Paid</th>
                        <td>Tsh. {{number_format($paymentDetails->amount_paid)}}</td>
                        <th>Amount Remain</th>
                        <td>Tsh. {{number_format($paymentDetails->amount_remain)}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                <button type="button" class="btn btn-primary">Pay</button>
            </div>
        </div>
    </div>

@endsection
