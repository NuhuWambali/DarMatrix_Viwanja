@extends('layouts.mainLayouts')
@section('title','Profile')
@section('smallTitle','Profile')
@section('content')
@include('sweetalert::alert')

<div class="card mb-4">
    <div class="card-header"><strong>User Profile</strong></div>
    <div class="card-body">
      <div class="example">
        <div class="tab-content rounded-bottom">
            <form action="{{route('updateProfile',$userInformations->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputFullname">Full Name</label>
                            <input class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" name="fullname" value="{{$userInformations->fullname}}" placeholder="Fullname">
                            @error('fullname')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputUsername">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{$userInformations->username}}" placeholder="Username">
                            @error('username')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputEmail">Email</label>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{$userInformations->email}}" placeholder="Email" readonly>
                            @error('email')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputPhone">Phone Number</label>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" id="phone" name="phone" value="{{$userInformations->phone}}" placeholder="Phone number" >
                            @error('phone')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputRole">Role</label>
                            <input class="form-control" type="text" value="{{ $userInformations->roles->role_name }}" readonly>
                            <input type="hidden" name="role_id" value="{{ $userInformations->roles->id }}">
                           @error('role_id')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label class="col-form-label" for="inputStatus">Status</label>
                            <input class="form-control @error('status') is-invalid @enderror" type="text" id="status" name="status" value="{{$userInformations->status}}" placeholder="Status" readonly >
                            @error('role')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                    </div>
                    <input class="form-control @error('id') is-invalid @enderror" type="number" id="id" name="id" value="{{$userInformations->id}}" placeholder="id" hidden>
                    <div class="row ">
                        <div class="col-sm-1 mt-2">
                            <button class="btn btn-primary mb-3" onclick="" type="submit">Edit</button>
                        </div>
                        <div class="col-sm-2 mt-2">
                          <a href="{{route('index')}}" style="color:#fff" class="btn btn-danger mb-3">Cancel</a></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the selected value from the disabled select and set it in the hidden input
        const selectField = document.querySelector('.form-control.d-none');
        const hiddenInput = document.querySelector('input[name="role_id"]');
        const textField = document.querySelector('input[readonly]');

        hiddenInput.value = selectField.value;
        textField.value = selectField.options[selectField.selectedIndex].text;
    });
</script>
