<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Plots Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        /* Table styles */
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 4px;
            border-bottom: 1px solid #eee;
            vertical-align: top; /* Ensure text aligns to top in cells */
        }

        .invoice-table th {
            background-color: #f9f9f9;
            font-weight: bold;
        }

        /* Footer styles */
        .invoice-footer {
            margin-top: 30px;
            font-size: 16px;
            color: #888;
            text-align: center;
            font-weight: bold;
        }

        /* Additional styling */
        .invoice-table tr:nth-child(even) {
            background-color: #f5f5f5; /* Lighter background for even rows */
        }

        .align-middle {
            vertical-align: middle; /* Vertically align content in table cells */
        }
        .table-bordered {
    border: 1px solid #ddd;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #ddd;
}
.invoice-table td h6 {
    margin: 0; /* Remove default margin */
    padding: 2px; /* Adjust padding */
    line-height: 1; /* Set line-height to 1 for tighter spacing */
}
    </style>

</head>
<body>
    <div class="invoice">
        <div class="header " style="background-color: #525151; height:20; width:100%; border-radius:0 0 7% 7%;"></div>
        <div class="row">
            <div class="col-xl-12">
                <i class="far fa-building text-danger fa-6x float-start"></i>
            </div>
        </div>
        <div class="row mt-4" >
            <div class="col-xl-12">
                <ul class="list-unstyled float-end">
                    <li class="text-primary" style="font-size: 30px;">DarMatrix Viwanja</li>
                    <li>123, Elm Street</li>
                    <li>0688-349-680</li>
                    <li>darmatrix@gmail.com</li>
                </ul>
            </div>
            <div class="row text-center">
                <h5 class="text-uppercase text-center mt-3" style="font-size: 40px;">Plots Report</h5>
                <p>{{$randomInvoiceNumber}}</p>
            </div>
        </div>
        <table class="invoice-table table-bordered">
            <thead class="table ">
                <tr class="align-middle">
                <th>#</th>
                <th >Plot Number</th>
                <th >Project</th>
                <th >Size</th>
                <th >Installment </th>
                <th >Cash</th>
                <th >Status</th>
                </tr>
            </thead>
            <tbody>
                @if($plots->count())
                @foreach($plots as $index=>$plot)
                <tr class="align-middle">
                <td>
                    <h6>{{$index+1}}</h6>
                </td>

                <td>
                    <h6>{{$plot->plot_number}}</h6>
                </td>
                <td>
                    <h6>{{$plot->project->name}}</h6>
                </td>
                <td>
                    <h6>{{$plot->plot_size}}</h6>
                </td>
                <td>
                    <h6>{{number_format($plot->installment_price_per_sqm)}}</h6>
                </td>
                <td>
                    <h6>{{number_format($plot->cash_price_per_sqm)}}</h6>
                </td>
                <td>
                    @if($plot->status==1)
                    <h6>Available</h6>
                    @else
                    <h6>Taken</h6>
                    @endif
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
        {{-- <hr> --}}
        <div class="row mt-2 mb-5 mt-3">
            <p class="fw-bold text-black">Created At: <span class="text-muted">{{$date}}</span></p>
            <p class="fw-bold mt-3">Signed By: <span class="text-muted">{{$username}}</span></p>
        </div>

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>
</html>
