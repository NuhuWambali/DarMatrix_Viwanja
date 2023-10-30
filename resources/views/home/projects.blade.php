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
                        <a href="{{route('projectDetails', $project->id)}}" type="button" class="btn btn-primary btn-sm">
                            <i class='fas fa-eye'></i>
                        </a>
                        <a href="" type="button" class="btn btn-primary btn-sm">
                            <i class='fas fa-edit'></i>
                        </a>

                        </td>
                        </tr>
                    @endforeach
                    </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection
<div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 100%; width: 80%;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="card-header"><strong>Add Project</strong></div>
                    <div class="card-body">
                      <div class="example">
                        <div class="tab-content rounded-bottom">


                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

      </div>
    </div>
</div>


