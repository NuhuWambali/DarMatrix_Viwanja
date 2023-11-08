@extends('layouts.mainLayouts')
@section('title','users')
@section('smallTitle','users')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2">
                <a href="{{route('getAddUser')}}" class="btn btn-primary mb-3" type="submit">Add User</a>
                </div>
                <div class="col-sm-10 ml-5 mt-1 text-center">
                    <h4 style="width:22em">All User</h4>
                </div>
            </div>
            <div class="table">
            <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                        <th>#</th>
                        <th >Username</th>
                        <th >Email</th>
                        <th >Phone</th>
                        <th >Status</th>
                        <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getUser as $index=>$user)
                        <tr class="align-middle">
                        <td>
                            <h6>{{$index+1}}</h6>
                        </td>

                        <td>
                            <h6>{{$user->username}}</h6>
                        </td>
                        <td>
                            <h6>{{$user->email}}</h6>
                        </td>
                        <td>
                            <h6>{{$user->phone}}</h6>
                        </td>
                        <td>
                            @if($user->status == 'inActive')
                                <h6 class="text-center" style="background-color: red; border-radius: 16px; padding: 2px; color: white;">{{$user->status}}</h6>
                            @else
                                <h6 class="text-center" style="background-color: green; border-radius: 16px; padding: 2px; color: white;">{{$user->status}}</h6>
                            @endif
                        </td>

                    <td>
                        <div class="row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-3">
                                <a href="{{route('getEditUser',$user->id)}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"title="Edit" > <i class='fas fa-edit'></i></a>
                            </div>
                            <div class="col-sm-3">
                                @if($user->status=='Active')
                                <form action="{{route('deactivateUser', ['id' => $user->id]) }}" id="edit-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" onclick="deactivateUserConfirmation(event,{{ $user->id }})" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top"title="Deactivate" style="color:#fff"> <i class='fas fa-lock'></i></button>
                                </form>
                               @else
                                <form action="{{route('activateUser', ['id' => $user->id]) }}" id="edit-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" onclick="activateUserConfirmation(event,{{ $user->id }})"  class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"title="Activate" style="color:#fff"> <i class='fas fa-lock-open'></i></button>
                                </form>
                              @endif
                            </div>
                            <div class="col-sm-3">
                                <form action="{{route('resendPassword',['id' => $user->id])}}" id="resend-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <button type="submit" onclick="resendPasswordConfirmation(event,{{ $user->id }})" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top"title="Resend Password" style="color:#fff"><i class='fas fas fa-circle-notch'></i></button>
                                </form>
                            </div>

                        </div>
                    </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            </div>
      </div>
    </div>
</div>

@endsection

