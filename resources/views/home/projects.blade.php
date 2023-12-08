@extends('layouts.mainLayouts')
@section('title','projects')
@section('smallTitle','Projects')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2 mb-3">
                     <a href="{{route('addProjectPage')}}" type="button" class="btn btn-primary" >
                        Add Project
                      </a>
                </div>
                <div class="col-sm-10 ml-5 mt-1 text-center">
                    <h4 style="width:22em" class="mb-3">All Projects</h4>
                </div>
            </div>
            <div class="table">
            <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                        <th>#</th>
                        <th >Name</th>
                        <th >Address</th>
                        <th >Total Plots</th>
                        <th >Price</th>
                        <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($projects->count())
                        @foreach($projects as $index=>$project)
                        <tr class="align-middle">
                        <td>
                            <h6>{{$index+1}}</h6>
                        </td>
                        <td>
                            <h6>{{$project->name}}</h6>
                        </td>
                        <td>
                            <h6>{{$project->city}}</h6>
                        </td>
                        <td>
                            <h6>{{$project->total_plots}}</h6>
                        </td>
                        <td>
                            <h6>{{number_format($project->price_per_sqm)}}</h6>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="{{route('projectDetails', $project->id)}}" type="button" class="btn btn-success btn-sm">
                                        <i class='fas fa-eye'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{route('editProjectPage',$project->id)}}" type="button" class="btn btn-primary btn-sm">
                                        <i class='fas fa-edit'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                </a>
                                <form action="{{route('deleteProject',$project->id)}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip"  data-placement="top" title="Delete Project"  style="color:#fff"><i class='fas fa-trash'></i></button>
                            </div>
                            <div class="col-sm-3">
                                <a href="{{route('viewPlots',$project->id)}}" type="button" class="btn btn-primary btn-sm">Plots</a>
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



