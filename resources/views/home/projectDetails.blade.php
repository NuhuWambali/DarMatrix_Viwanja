@extends('layouts.mainLayouts')
@section('title','Project Details')
@section('smallTitle','Project / Details')
@section('content')
<table class="table table-bordered  roundedCorners">
    <tbody>
        <tr>
            <th>Project Name</th>
            <td>{{$projectDetails->name}}</td>
            <th>Address</th>
            <td>{{$projectDetails->address}}</td></td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{$projectDetails->city}}</td>
            <th>Region</th>
            <td>{{$projectDetails->region}}</td>
        </tr>
        <tr>
            <th>Total Plots</th>
            <td>{{$projectDetails->total_plots}}</td>
            <th>Available Plots</th>
            <td>{{$projectDetails->available_plots}}</td>
        </tr>
        <tr>
            <th>Unavailable Plots</th>
            <td>{{$projectDetails->unavailable_plots}}</td>
            <th>Status</th>
            @if($projectDetails->status=='1')
            <td style="color:green">Active</td>
            @else
            <td style="color:red">inActive</td>
            @endif
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$projectDetails->description}}</td>
            <th>Plots  Number</th>
            <td>{{$projectDetails->plots_no}}</td>
        </tr>
        <tr>
            <th>Block</th>
            <td>{{$projectDetails->block}}</td>
            <th>Price</th>
            <td>{{number_format($projectDetails->price_per_sqm)}}</td>
        </tr>
        <tr>
            <th>Installment Period</th>
            <td>{{$projectDetails->installment_period}}</td>
            <th>File</th>
            <td>File</td>
        </tr>
        <tr>
            <th>Start Date</th>
            <td>{{$projectDetails->start_date}}</td>
            <th>End Date</th>
            <td>end_date</td>
        </tr>
        <tr>
            <th>Created Date</th>
            <td>{{$projectDetails->created_at}}</td>
            <th>Created By</th>
            <td>{{$projectDetails->created_by}}</td>
        </tr>
</tbody>
</table>
<div class="col-sm-2">
    <a href="{{route('projects')}}" style="color:#fff" class="btn btn-primary mb-3" >back</a></button>
</div>
@endsection

