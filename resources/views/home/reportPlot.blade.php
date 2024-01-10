@extends('layouts.mainLayouts')
@section('title','Report')
@section('smallTitle','Customer Report')
@section('content')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-10 mt-1">
                    <h4 style="width:22em" class="my-2">All Plots </h4>
                </div>
                <div class="col-sm-2 my-3">
                    <h6>Download</h6>
                    <a href="{{route('downloadPlotsReportPDF')}}" class="btn btn-primary btn-sm">PDF</a>
                    <div class="btn  btn-outline-primary btn-sm">Excel</div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                            <th>#</th>
                            <th>Plot Number</th>
                            <th>Project</th>
                            <th>Size (SQM) </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($plots->count())
                            @foreach($plots as $index=>$plot)
                            <tr class="align-middle">
                                <td>
                                    <h6>{{$index+1}}</h6>
                                </td>
                                <td>
                                    <h6>{{$plot->plot_number}}</h6>
                                </td>
                                <td>
                                    <h6>{{$plot->project->name}}</h6>
                                </td>
                                <td>
                                    <h6>{{$plot->plot_size}}</h6>
                                </td>
                                <td>
                                    @if($plot->status == 0)
                                        <h6 class="text-center" style="background-color: red; border-radius: 16px; padding: 2px; color: white;">Taken</h6>
                                    @else
                                        <h6 class="text-center" style="background-color: green; border-radius: 16px; padding: 2px; color: white;">Available</h6>
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
