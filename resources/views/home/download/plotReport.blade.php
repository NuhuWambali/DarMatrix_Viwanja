<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <style>
        /* Overall styles */
        body {
            font-family: 'Sofia Pro', sans-serif;
            margin: 0;
            padding: 10px;
            background-color: #f4f4f4;
            color: #333;
        }

        .invoice {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 10px;
        }

        /* Header styles */
        .invoice-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .invoice-title {
            font-size: 40px;
            margin-bottom: 5px;
            color: #2196F3; /* Shade of blue */
        }

        .invoice-details {
            font-size: 18px;
            color: #777;
        }

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
        <div class="invoice-header">
            <h1 class="invoice-title">DarMatrix Viwanja</h1>
            <div class="invoice-details">
                <p><strong>Invoice Report: </strong>All Plots</p>
                <p><strong>Date: </strong> {{$date}}</p>
                <p><strong>Total Plots: </strong> {{$totalPlots}}</p>
            </div>
        </div>
        <table class="invoice-table table-bordered">
            <thead class="table ">
                <tr>
                <th>#</th>
                <th >Plot Number</th>
                <th >Ploject</th>
                <th >Size (SQM)</th>
                <th >Status</th>
                </tr>
            </thead>
            <tbody>
                @if($plots->count())
                @foreach($plots as $index=>$plot)
                <tr>
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
                    @if($plot->status == 1)
                        <h6 >Available</h6>
                    @else
                        <h6 >Taken</h6>
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

        <div class="invoice-footer">
            <p>Thank you for your business!</p>
        </div>
    </div>
</body>
</html>

