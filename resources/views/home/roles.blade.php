@extends('layouts.mainLayouts')
@section('title','roles')
@section('smallTitle','Roles')
@section('content')
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
            <div class="table-responsive">
            <table class="table border mb-0">
            <thead class="table-light fw-semibold">
                <tr class="align-middle">
                <th>#</th>
                <th >Role Name</th>
                </tr>
            </thead>
            <tbody>
                <tr class="align-middle">
                <td>
                    <h6>1</h6>
                </td>
            
                <td>
                    <h6>Administrator</h6>
                </td>
                
                </tr>
           
            </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection