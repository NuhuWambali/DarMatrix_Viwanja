@extends('layouts.mainLayouts')
@section('title','roles')
@section('smallTitle','Roles')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2">
                <a href="{{route('getAddRole')}}" class="btn btn-primary mb-3" type="submit">Add Role</a>
                </div>
                <div class="col-sm-10 ml-5 mt-1 text-center">
                    <h4 style="width:22em">All Roles</h4>
                </div>
            </div>
            <div class="table">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($getRoles ->count())
                @foreach($getRoles as $index=>$role)
                <tr class="align-middle">
                <td>
                    <h6>{{$index+1}}</h6>
                </td>

                <td>
                    <h6>{{$role->role_name}}</h6>
                </td>

                <td>
                    <div class="row">
                        <div class="col-3">
                                @php
                                $allowedRoles = ['Admin', 'SuperAdmin', 'User', 'Manager', 'Finance', 'Surveyor'];
                                @endphp
                                @if(in_array($role->role_name, $allowedRoles))
                                    <form action="{{ route('deleteRole', $role->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" style="color:#fff" disabled>Delete</button>
                                    </form>
                                @else
                                        <form action="{{ route('deleteRole', $role->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:#fff" data-toggle="tooltip" data-placement="top" title="Delete Role">Delete</button>
                                        </form>
                                @endif
                        </div>
                        @php
                        $allowedRoles = ['Admin', 'SuperAdmin', 'User', 'Manager', 'Finance', 'Surveyor'];
                        @endphp
                          @if(!in_array($role->role_name, $allowedRoles))
                        <div class="col-3">
                            <a href="{{route('editRole',$role->id)}}"  class="btn btn-dark btn-sm disable-link" data-toggle="tooltip" data-placement="top"title="Edit Role">Edit</a>
                        </div>

                        @endif
                    </div>
                </td>

                </tr>
              @endforeach
              @else
              <tr>
                <td colspan="12" class="text-center">no records found in database</td>
              </tr>
              @endif
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection
