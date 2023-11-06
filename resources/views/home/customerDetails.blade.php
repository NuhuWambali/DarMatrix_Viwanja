@extends('layouts.mainLayouts')
@section('title','Customer Details')
@section('smallTitle','Customer / Details')
@section('content')
<div class="table-responsive">


<table class="table table-bordered  roundedCorners">
    <tbody>
        <tr>
            <th>Fullname</th>
            <td>{{$customerDetails->fullname}}</td>
            <th>Email</th>
            <td>{{$customerDetails->email}}</td></td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{$customerDetails->phone_number}}</td>
            <th>Address</th>
            <td>{{$customerDetails->address}}</td>
        </tr>
        <tr>
            <th>Date Of Birth</th>
            <td>{{$customerDetails->date_of_birth}}</td>
            <th>NIDA</th>
            <td>{{$customerDetails->national_id_number}}</td>

        </tr>
        <tr>
            <th>Description 1</th>
            <td>{{$customerDetails->description1}}</td>
            <th>Description 2</th>
            <td>{{$customerDetails->description2}}</td>
        </tr>
        <tr>
            <th>Description 3</th>
            <td>{{$customerDetails->description3}}</td>
            <th>Description 4</th>
            <td>{{$customerDetails->description4}}</td>
        </tr>
        <tr>
            <th>Description 5</th>
            <td>{{$customerDetails->description5}}</td>
            <th>Description 6</th>
            <td>{{$customerDetails->description6}}</td>
        </tr>
        <tr>
            <th>File</th>
            <td> @if($customerDetails->file)<a href="{{ asset($customerDetails->file) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>@else no file provided @endif</td>
            <th>Created at</th>
            <td>{{$customerDetails->created_at}}</td>
        </tr>
        <tr>
            <th>Updated at</th>
            <td>{{$customerDetails->updated_at}}</td>
            <th>Created By</th>
            <td>{{$customerDetails->created_by}}</td>
        </tr>
        <tr>
            <th>Updated By</th>
            <td>{{$customerDetails->modified_by}}</td>
            <th>Status</th>
            @if($customerDetails->status=='1')
            <td style="color:green">Active</td>
            @else
            <td style="color:red">inActive</td>
            @endif
        </tr>
    </tbody>
</table>
</div>
<div class="col-sm-2">
    <a href="{{route('viewCustomers')}}" style="color:#fff" class="btn btn-primary mb-3" >back</a></button>
</div>
@endsection
