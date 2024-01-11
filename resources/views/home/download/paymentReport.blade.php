<!DOCTYPE html>
< lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
    .table {
            margin: 0;
            padding: 0;
        }

        .table th,
        .table td {
            padding: 2px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header " style="background-color: #525151;border-radius:0 0 7% 7%;"></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <i class="far fa-building text-danger fa-6x float-start"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <ul class="list-unstyled float-end">
                                <li class="text-primary" style="font-size: 30px;">DarMatrix Viwanja</li>
                                <li>123, Elm Street</li>
                                <li>0688-349-680</li>
                                <li>darmatrix@gmail.com</li>
                            </ul>
                        </div>
                    </div>

                    <div class="row text-center">
                        <h5 class="text-uppercase text-center mt-3" style="font-size: 40px;">Payment Report</h5>
                        <p>{{$randomInvoiceNumber}}</p>
                    </div>

                    <div class="row">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    {{-- <th scope="col">Project</th> --}}
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Remain</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $index=>$payment)
                                <tr>
                                    <td>{{$payment->order->customer->fullname}}</td>
                                    <td>{{number_format($payment->total_amount)}}</td>
                                    {{-- <td> {{$payment->order->project->name}}</td> --}}
                                    <td>{{number_format($payment->amount_paid)}}</td>
                                    <td>{{number_format($payment->amount_remain)}}</td>
                                    @if($payment->payment_status==1)
                                    <td>on Progress</td>
                                    @else
                                    <td>Complete</td>
                                    @endif
                                </tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td><strong>{{number_format($payments->sum('total_amount'))}}</strong></td>
                                    <td><strong>{{number_format($payments->sum('amount_paid'))}}</strong></td>
                                    <td><strong>{{number_format($payments->sum('amount_remain'))}}</strong></td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-8">
                            <ul class="list-unstyled float-end me-0">

                                <li><span class="float-start" style="margin-right: 35px;">Amount Paid: {{number_format($payments->sum('amount_paid'))}}</span><i
                                    class="fas fa-dollar-sign"></i> </li>
                                <li> <span class="me-5">Amount Remain : </span><i class="fas fa-dollar-sign"></i> {{number_format($payments->sum('amount_remain'))}}</li>
                                <li><span class="me-3 float-start">Total Amount : {{number_format($payments->sum('total_amount'))}}</span><i class="fas fa-dollar-sign"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xl-8" >
                            <p class=" text-center text-bg-primary"
                                style="font-size: 20px; color: re; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
                                Company InCome: Tsh
                                <span><i class="fas fa-dollar-sign "></i>{{number_format($payments->sum('amount_paid'))}} </span></p>
                        </div>

                    </div>

                    <div class="row mt-2 mb-5">
                        <p class="fw-bold text-black">Created At: <span class="text-muted">{{$date}}</span></p>
                        <p class="fw-bold mt-3">Signed By: <span class="text-muted">{{$username}}</span></p>
                    </div>

                </div>
            </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
