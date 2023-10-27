@extends('layouts.mainLayouts')
@section('title','projects')
@section('smallTitle','Projects')

@section('content')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2 mb-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Add Project
                      </button>

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
                        {{-- <th class="text-center">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                        <td>
                            <h6>nuhu</h6>
                        </td>

                        <td>
                            <h6>nuhu</h6>
                        </td>
                        <td>
                            <h6>nuhu</h6>
                        </td>
                        <td>
                            <h6>nuhu</h6>
                        </td>
                        <td>
                            <h6>nuhu</h6>
                        </td>
                    {{-- <td>
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="{{route('userDetails',$user->id)}}" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top"title="View" style="color:#fff"> <i class='fas fa-eye'></i></a>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{route('getEditUser',$user->id)}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top"title="Edit" > <i class='fas fa-edit'></i></a>
                            </div>
                            <div class="col-sm-3">
                                @if($user->status=='Active')
                                <form action="{{route('deactivateUser', ['id' => $user->id]) }}" id="edit-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" onclick="confirmation(event,{{ $user->id }})" class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top"title="Deactivate" style="color:#fff"> <i class='fas fa-lock'></i></button>
                                </form>
                               @else
                                <form action="{{route('activateUser', ['id' => $user->id]) }}" id="edit-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" onclick="confirmation(event,{{ $user->id }})"  class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top"title="Activate" style="color:#fff"> <i class='fas fa-lock-open'></i></button>
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
                    </td> --}}
                        </tr>
                    {{-- @endforeach --}}
                    </tbody>
            </table>
            </div>
      </div>
    </div>
</div>




<!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 100%; width: 80%;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header"><strong>Add User</strong></div>
                    <div class="card-body">
                      <div class="example">
                        <div class="tab-content rounded-bottom">
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="inputFullname">Fullname</label>
                                        <div class="col-sm-8">
                                        <input class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" name="fullname" value="{{old('fullname')}}" placeholder="Enter Fullname">
                                        @error('fullname')
                                        <p class="dismissAlert text-danger" id="dismissAlert">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="inputPassword">Username</label>
                                        <div class="col-sm-8">
                                        <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{old('username')}}" placeholder="Enter Username">
                                        @error('username')
                                        <p class="dismissAlert text-danger" id="dismissAlert">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </div>

                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="inputEmail">Email</label>
                                        <div class="col-sm-8">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{old('email')}}" placeholder="Enter Email" >
                                        @error('email')
                                        <p class="dismissAlert text-danger" id="dismissAlert">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="inputPhone">Phone</label>
                                        <div class="col-sm-8">
                                        <input class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone">
                                        @error('phone')
                                        <p class="dismissAlert text-danger" id="dismissAlert">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label" for="inputRoleId">Role</label>
                                        <div class="col-sm-8">
                                            {{-- <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                                                <option value="" selected disabled>Select role</option>
                                                @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->role_name}}</option>
                                                @endforeach
                                            </select> --}}

                                        @error('role_id')
                                        <p class="dismissAlert text-danger" id="dismissAlert">
                                            {{$message}}
                                        </p>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-sm-2">

                                        </div>
                                        <div class="col-sm-1 mt-2">
                                            <button class="btn btn-primary mb-3" type="submit">Add</button>
                                        </div>
                                        <div class="col-sm-2 mt-2">
                                          <a href="" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
  @endsection
