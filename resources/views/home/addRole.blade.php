@extends('layouts.mainLayouts')
@section('title','Add Roles')
@section('smallTitle','Roles / Addrole')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add Role</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('addrole')}}" method="post">
                    @csrf         
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="inputPassword">Role Name</label>
                            <div class="col-sm-8">
                            <input class="form-control @error('role_name') is-invalid @enderror" id="inputPassword" type="text" id="role_name" name="role_name" value="{{old('role_name')}}">
                            </div>
                            @error('role_name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="col-sm-2"> 
                                  <button class="btn btn-primary mb-3" type="submit">Add</button>
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