@extends('layouts.mainLayouts')
@section('title','Plots')
@section('smallTitle','Project / Plots')
@section('content')
@include('sweetalert::alert')
<div class="card mb-4">
    <div class="card-body">
      <div class="">
           <div class="row">
                <div class="col-sm-2 mb-3">
                     <a href="{{route('viewAddPlot',$project_id)}}" type="button" class="btn btn-primary" >
                        Add Plot
                      </a>
                </div>
                <div class="col-sm-10 ml-5 mt-1 text-center">
                    <h4 style="width:22em" class="mb-3">All Plots</h4>
                </div>
            </div>
            <div class="table">
            <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                        <th>#</th>
                        <th >Plot Number</th>
                        <th >Size( in sqm )</th>
                        <th >Land Use</th>
                        <th >Price</th>
                        <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($plots as $index=>$plot)
                        <tr class="align-middle">
                        <td>
                            <h6>{{$index+1}}</h6>
                        </td>
                        <td>
                            <h6>{{$plot->plot_number}}</h6>
                        </td>
                        <td>
                            <h6>{{(int)$plot->plot_size}}</h6>
                        </td>
                        <td>
                            <h6>{{$plot->land_use}}</h6>
                        </td>
                        <td>
                            <h6>{{number_format($plot->installment_total_price)}}</h6>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="{{route('plotDetails',$plot->id)}}" type="button" class="btn btn-success btn-sm">
                                        <i class='fas fa-eye'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a href="{{route('plotEdit',$plot->id)}}" type="button" class="btn btn-primary btn-sm">
                                        <i class='fas fa-edit'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                </a>
                                <form action="{{route('deletePlot',$plot->id)}}"  method="post" enctype="multipart/form-data">
                                    @csrf
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip"  data-placement="top" title="Delete Project"  style="color:#fff"><i class='fas fa-trash'></i></button>
                            </div>

                        </td>
                        </tr>
                     @endforeach
                    </tbody>
            </table>

            </div>
            <div class="col-sm-2 mt-3">
                <a href="{{route('projects',$plot->project_id)}}" style="color:#fff" class="btn btn-primary btn-sm mb-3" >back</a></button>
            </div>
      </div>
    </div>
</div>
@endsection
