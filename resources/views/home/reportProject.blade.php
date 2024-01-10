@extends('layouts.mainLayouts')
@section('title','Report')
@section('smallTitle','Project Report')
@section('content')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-10 mt-1">
                    <h4 style="width:22em" class="my-2">All Projects</h4>
                </div>
                <div class="col-sm-2 my-2">
                    <h6>Download</h6>
                    <a href="{{route('downloadProjectsReportPDF')}}" class="btn btn-primary btn-sm">PDF</a>
                    <div class="btn  btn-outline-primary btn-sm">Excel</div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Region</th>
                            <th>Status</th>
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
                                    <h6>{{$project->address}}</h6>
                                </td>
                                <td>
                                    <h6>{{$project->region}}</h6>
                                </td>
                                <td>
                                    @if($project->status == 0)
                                        <h6 class="text-center" style="background-color: red; border-radius: 16px; padding: 2px; color: white;">inActive</h6>
                                    @else
                                        <h6 class="text-center" style="background-color: green; border-radius: 16px; padding: 2px; color: white;">Active</h6>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">no records found in database</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
