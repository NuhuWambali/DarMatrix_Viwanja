@extends('layouts.mainLayouts')
@section('title','plot details')
@section('smallTitle','Project / Plot / plotDetails')
@section('content')
<table class="table table-bordered  table-responsive roundedCorners">
    <tbody>
        <tr>
            <th>Plot Number</th>
            <td>{{(int)$plot->plot_number}}</td>
            <th>Plot Size </th>
            <td>SQM : {{(int)$plot->plot_size}}</td></td>
        </tr>
        <tr>
            <th>Land Use</th>
            <td>{{$plot->land_use}}</td>
            <th>Price Per SQM</th>
            <td>Tsh {{number_format($plot->price_per_sqm)}}</td>
        </tr>
        <tr>
            <th>Installment Period</th>
            <td>{{$plot->installment_period}}</td>
            <th>Monthly Installment Price</th>
            <td>Tsh {{number_format($plot->monthly_installment_price)}}</td>
        </tr>
        <tr>
            <th>Total Cash </th>
            <td>{{number_format($plot->cash_price_per_sqm)}}</td>
            <th>Installment Total Price</th>
            <td>Tsh {{number_format($plot->installment_total_price)}}</td>
        </tr>
        <tr>
            <th>Desription 1</th>
            <td>{{$plot->description1}}</td>
            <th>Descripton 2</th>
            <td>{{$plot->description2}}</td>
        </tr>
        <tr>
            <th>Desription 3</th>
            <td>{{$plot->description3}}</td>
            <th>File</th>
            <td> @if($plot->file)<a href="{{ asset($plot->file) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>@else no file provided @endif</td>
        </tr>
        <tr>
            <th>Created by</th>
            <td>{{$plot->created_by}}</td>
            <th>Updated by</th>
            <td>{{$plot->updated_by}}</td>
        </tr>
        <tr>
            <th>Status</th>
            @if($plot->status=='1')
            <td style="color:green">Active</td>
            @else
            <td style="color:red">inActive</td>
            @endif
        </tr>


</tbody>
</table>
<div class="col-sm-2">
    <a href="{{route('viewPlots',$plot->project_id)}}" style="color:#fff" class="btn btn-primary mb-3" >back</a></button>
</div>

@endsection
