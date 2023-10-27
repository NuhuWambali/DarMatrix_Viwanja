@extends('layouts.mainLayouts')
@section('title','Edit User')
@section('smallTitle','User / Edit')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add User</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{ route('editUser', ['id' => $user->id]) }}" id="edit-form-{{ $user->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="inputFullname">Fullname</label>
                            <div class="col-sm-8">
                            <input class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" name="fullname" value="{{$user->fullname}}" placeholder="Enter Fullname">
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
                            <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{$user->username}}" placeholder="Enter Username">
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
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{$user->email}}" placeholder="Enter Email" >
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
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value="{{$user->phone}}" placeholder="Enter phone">
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

                                <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @if ($user->role_id === $role->id) selected @endif>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
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
                                <button class="btn btn-primary mb-3"  type="submit" onclick="confirmation(event,{{ $user->id }})">Edit</button>
                            </div>
                            <div class="col-sm-2 mt-2">
                              <a href="{{route('user')}}" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
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

@endsection
