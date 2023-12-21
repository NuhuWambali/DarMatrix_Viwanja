<div class="modal-body">
    <table class="table table-bordered  roundedCorners">
        <tbody>
            <tr>
                @if($order->payment_way==="installment")
                <th>Price Per Sqm</th>
                <td>Tsh. {{number_format($order->plot->installment_price_per_sqm)}}</td>
                @else
                    <th>Price Per Sqm</th>
                    <td>Tsh. {{number_format($order->plot->cash_price_per_sqm)}}</td>
                @endif
                @if($order->payment_way==="installment")
                <th>Total  Price</th>
                <td>Tsh. {{number_format($order->plot->installment_total_value)}}</td>
                @else
                    <th>Total Cash Price</th>
                    <td>Tsh. {{$order->plot->cash_total_value}}</td>
                @endif
            </tr>
        </tbody>
    </table>
    <div class="example">
        <div class="tab-content rounded-bottom">
            <form action="{{route('addPayment',$order->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="inputPassword">Amount</label>
                        <div class="col-8 ml-3">
                            <input class="form-control @error('down_amount') is-invalid @enderror" type="text" id="down_amount" name="down_amount" value="{{old('down_amount')}}" required>
                        @error('down_amount')
                        <p class="dismissAlert text-danger" id="dismissAlert">
                            {{$message}}
                        </p>
                        @enderror
                        </div>
                        <div class="col-2 ml-3">
                           <button type="submit" class="btn btn-primary">Pay</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


