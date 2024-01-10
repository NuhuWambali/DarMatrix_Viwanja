@extends('layouts.mainLayouts')
@section('title','Setting')
@section('smallTitle','Setting')
@section('content')
@include('sweetalert::alert')

<div class="card mb-4">
    <div class="card-header"><strong>Setting</strong></div>
    <div class="card-body">
      <div class="example">
        <div class="row">
            <div class="col-6">
                <div class="card mb-4">
                    <div class="card-header"><strong>Change Password</strong></div>
                    <div class="card-body">
                        <form action="{{route('changePassword',$userId=Auth::user()->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="inputclass mb-3">
                                    <div class="d-flex">
                                        <label for="inputRole" style="width:60%">New Password</label>
                                        <input class="form-control" type="text" name="newPassword" id="newPassword" value="{{old('newPassword')}}" placeholder="Enter New Password">
                                    </div>
                                        @error('newPassword')
                                            <p class="dismissAlert text-danger" id="dismissAlert">
                                                {{$message}}
                                            </p>
                                        @enderror
                                </div>
                                <div class="inputclass mb-3">
                                    <div class="d-flex">
                                        <label for="inputRole" style="width:60%">Confirm Password</label>
                                        <input class="form-control" type="text" id="confirmPassword" name="confirmPassword" value="{{old('confirmPassword')}}" placeholder="Confirm Password">
                                    </div>
                                        @error('confirmPassword')
                                            <p class="dismissAlert text-danger" id="dismissAlert">
                                                {{$message}}
                                            </p>
                                        @enderror
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <button class="btn btn-primary mb-3"  type="submit" onclick="">Change</button>
                                    </div>
                                    <div class="col-3">
                                    <a href="{{route('index')}}" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
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
@endsection

