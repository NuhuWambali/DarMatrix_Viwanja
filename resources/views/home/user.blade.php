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
                    <h4 style="width:22em">All Roles</h4>
                </div>  
            </div>  
            <div class="table-responsive">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Name</th>
                <th >Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($getRoles as $index=>$role) --}}
                <tr class="align-middle">
                <td>
                    <h6>dhgsdgsjd</h6>
                </td>
            
                <td>
                    <h6>sdgvjdhkds</h6>
                </td>
               
                {{-- <td>
                    @php
                    $allowedRoles = ['Admin', 'SuperAdmin', 'User', 'Manager', 'Finance', 'Surveyor'];
                    @endphp
                    @if(in_array($role->role_name, $allowedRoles))
                        <form action="{{ route('deleteRole', $role->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" disabled>Delete</button>
                        </form>
                    @else
                            <form action="{{ route('deleteRole', $role->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                    @endif --}}
                {{-- </td> --}}
                
                </tr>
              {{-- @endforeach --}}
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>

@endsection