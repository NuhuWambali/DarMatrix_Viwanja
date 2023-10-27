@extends('layouts.mainLayouts')
@section('title','user details')
@section('smallTitle','user / user-details')
@section('content')

<div class="card mb-4">
    <div class="card-body">
      <div class="">   
           <div class="row">
                <div class="col-sm-12 my-3">
                    <h4 style="">All User</h4>
                </div>  
            </div>  
            <table class="table table-bordered  roundedCorners">
                <tbody>
                  <tr>
                    <th>Fullname</th>
                    <td>{{$userDetails->fullname}}</td>
                    <th>Username</th>
                    <td>{{$userDetails->username}}</td></td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{$userDetails->email}}</td>
                    <th>Phone</th>
                    <td>{{$userDetails->phone}}</td>
                  </tr>
                  <tr>
                    <th>Status</th>
                      @if($userDetails->status=='Active')
                      <td style="color:green">{{$userDetails->status}}</td>
                      @else
                      <td style="color:red">{{$userDetails->status}}</td>
                      @endif
                  </tr>
                </tbody>
              </table>
              <div class="col-sm-2 mt-2"> 
                <a href="{{route('user')}}" class="btn btn-danger mb-3" >Back</a></button>
              </div> 
      </div>
    </div>
</div>

@endsection