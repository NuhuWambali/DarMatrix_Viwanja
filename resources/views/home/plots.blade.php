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
                     <a href="{{route('viewAddPlot')}}" type="button" class="btn btn-primary" >
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

                        <tr class="align-middle">
                        <td>
                            <h6>1</h6>
                        </td>
                        <td>
                            <h6>fjuerre</h6>
                        </td>
                        <td>
                            <h6>erfgbujcbe</h6>
                        </td>
                        <td>
                            <h6>rfvgjrer</h6>
                        </td>
                        <td>
                            <h6>jhfbsdjfj</h6>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="" type="button" class="btn btn-success btn-sm">
                                        <i class='fas fa-eye'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                    <a href="" type="button" class="btn btn-primary btn-sm">
                                        <i class='fas fa-edit'></i>
                                    </a>
                                </div>
                                <div class="col-sm-3">
                                </a>
                                <form action=""  method="post" enctype="multipart/form-data">
                                    @csrf
                                <button type="submit" class="btn btn-danger btn-sm"  data-toggle="tooltip"  data-placement="top" title="Delete Project"  style="color:#fff"><i class='fas fa-trash'></i></button>
                            </div>

                        </td>
                        </tr>

                    </tbody>
            </table>
            </div>
      </div>
    </div>
</div>
@endsection
