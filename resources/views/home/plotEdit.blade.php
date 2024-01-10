@extends('layouts.mainLayouts')
@section('title','Edit Plot')
@section('smallTitle','Project / Plot / plotEdit')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Edit Plot</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('editPlot',$plot->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputName">Land Use</label>
                                <select class="form-control @error('land_use') is-invalid @enderror" id="land_use" name="land_use" value="{{old('land_use')}}">
                                    <option value="Residential" @if($plot->land_use==='Residential') selected  @endif >Residential</option>
                                    <option value="Commercial"  @if($plot->land_use==='Commercial')  selected @endif  >Commercial</option>
                                    <option value="Industrial"  @if($plot->land_use==='Industrial') selected  @endif >Industrial</option>
                                    <option value="Agricultural" @if($plot->land_use==='Agricultural') selected @endif  >Agricultural</option>
                                    <option value="Recreational" @if($plot->land_use==='Recreational') selected  @endif >Recreational</option>
                                    <option value="Educational" @if($plot->land_use==='Educational') selected @endif  >Educational</option>
                                    <option value="Healthcare" @if($plot->land_use==='Healthcare')  selected @endif >Healthcare</option>
                                    <option value="Public and Civic"  @if($plot->land_use==='Public and Civic') selected @endif  >Public and Civic</option>
                                    <option value="Transportation" @if($plot->land_use==='Transportation') selected  @endif >Transportation</option>
                                    <option value="Utilities"  @if($plot->land_use==='Utilities') selected  @endif >Utilities</option>
                                    <option value="Religious"  @if($plot->land_use==='Religious') selected @endif  >Religious</option>
                                    <option value="Mixed-Use" @if($plot->land_use==='Mixed-Use') selected  @endif >Mixed-Use</option>
                                    <option value="Open Space" @if($plot->land_use==='Open Space') selected @endif  >Open Space</option>
                                    <option value="Historic or Cultural" @if($plot->land_use==='Historic or Cultural') selected @endif  >Historic or Cultural</option>
                                    <option value="Vacant or Undeveloped" @if($plot->land_use==='Vacant or Undeveloped') selected @endif >Vacant or Undeveloped</option>
                                    <option value="Other"  @if($plot->land_use==='Other') selected @endif >Other</option>
                                </select>
                            </div>
                            <input class="form-control @error('project_id') is-invalid @enderror" type="number" id="project_id" name="project_id" value="{{$plot->project_id}}" placeholder="Enter Plot Number" hidden>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAddress">Plot Number</label>
                                <input class="form-control @error('plot_number') is-invalid @enderror" type="text" id="plot_number" name="plot_number" value="{{$plot->plot_number}}" placeholder="Enter Plot Number">
                                @error('plot_number')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputSize">Plot Size ( in sqm )</label>
                                <input class="form-control @error('plot_size') is-invalid @enderror" type="number" id="plot_size" name="plot_size" value="{{$plot->plot_size}}" placeholder="Enter Plot Size">
                                @error('plot_size')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputRegion">Installment Price Per Sqm</label>
                                <input class="form-control @error('installment_price_per_sqm') is-invalid @enderror" type="number" id="installment_price_per_sqm" name="installment_price_per_sqm" value="{{$plot->installment_price_per_sqm}}" placeholder="Enter Installment Price">
                                @error('installment_price_per_sqm')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputTotalPlots">Cash Price Per Sqm</label>
                                <input class="form-control @error('cash_price_per_sqm') is-invalid @enderror" type="number" id="cash_price_per_sqm" name="cash_price_per_sqm" value="{{$plot->cash_price_per_sqm}}" placeholder="Enter Cash Price Per SQM">
                                @error('cash_price_per_sqm')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAvailablePlots">File @if($plot->file)<a href="{{ asset($plot->file) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>@else no file provided @endif</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" value="{{$plot->file}}" placeholder="Enter File">
                                @error('file')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class="col-form-label" for="inputDescription">Description 1</label>
                                <input class="form-control @error('description1') is-invalid @enderror" type="text" id="description1" name="description1" value="{{$plot->description1}}" placeholder="Enter Description 1">
                                @error('description1')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="col-form-label" for="inputDescription">Description 2</label>
                                <input class="form-control @error('description2') is-invalid @enderror" type="text" id="description2" name="description2" value="{{$plot->description2}}" placeholder="Enter Description 2">
                                @error('description2')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="col-form-label" for="inputDescription">Description 3</label>
                                <input class="form-control @error('description3') is-invalid @enderror" type="text" id="description3" name="description3" value="{{$plot->description3}}" placeholder="Enter Description 3">
                                @error('description3')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputStatus">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="1" @if($plot->status===1) selected @endif>Active</option>
                                    <option value="0" @if($plot->status===0) selected @endif>inActive</option>
                                </select>
                                @error('status')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                            <div class="row mt-4">
                                <div class="col-sm-2" >
                                  <button type="submit" style="float:right" class="btn btn-primary" >
                                      Save
                                    </button>
                                </div>
                                <div class="col-sm-2">
                                    <a href="{{route('viewPlots',$plot->project_id)}}" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
                                </div>
                                <div class="col-sm-8">
                                  </div>
                            </div>
                      </div>
                    </div>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
