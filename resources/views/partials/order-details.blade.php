<h4>{{$order->project->name}} Payment Section</h4>
<div class="modal-body">
    <table class="table table-bordered  roundedCorners">
        <tbody>
            @if($payment->count())
            <tr>
                <th>Project Name</th>
                <td>{{$order->project->name}}</td>
                <th>Plot Number</th>
                <td>{{$order->plot->plot_number}}</td></td>
            </tr>
            <tr>
                <th>Price Per Sqm</th>
                <td>{{number_format($order->plot->price_per_sqm)}}</td>
                <th>Total Price</th>
                <td>{{number_format($order->plot->installment_total_price)}}</td></td>
            </tr>
            @else
            <h4>No Payment History For This Plot</h4>
            <hr>
            <tr>
                <th>Project Name</th>
                <td>{{$order->project->name}}</td>
                <th>Plot Number</th>
                <td>{{$order->plot->plot_number}}</td></td>
            </tr>

            @endif
        </tbody>
    </table>
    <div class="example">
        <div class="tab-content rounded-bottom">
            <form action="{{route('makePayment')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label" for="inputPassword">Amount</label>
                        <div class="col-sm-10 ml-3">
                        <input class="form-control @error('down_amount') is-invalid @enderror" type="text" id="down_amount" name="down_amount" value="{{old('down_amount')}}" required>
                        @error('down_amount')
                        <p class="dismissAlert text-danger" id="dismissAlert">
                            {{$message}}
                        </p>
                        @enderror
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


