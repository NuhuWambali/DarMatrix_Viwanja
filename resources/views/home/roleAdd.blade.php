@extends('layouts.mainLayouts')
@section('title','Add Roles')
@section('smallTitle','Roles / Addrole')
@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add Role</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('addrole')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label" for="inputPassword">Name</label>
                            <div class="col-sm-7">
                            <input class="form-control @error('role_name') is-invalid @enderror" type="text" id="role_name" name="role_name" value="{{old('role_name')}}" required>
                            @error('role_name')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                            </div>
                            <div class="col-sm-1">
                                  <button class="btn btn-primary mb-3" type="submit">Add</button>
                            </div>
                            <div class="col-sm-2">
                                <a href="{{route('roles')}}" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
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

