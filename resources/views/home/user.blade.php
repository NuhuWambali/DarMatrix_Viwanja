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
            <div class="table-responsive">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Fullname</th>
                <th >Username</th>
                <th >Email</th>
                <th >Phone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getUser as $index=>$user)
                <tr class="align-middle">
                <td>
                    <h6>{{$index+1}}</h6>
                </td>
            
                <td>
                    <h6>{{$user->fullname}}</h6>
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
              @endforeach
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>

@endsection