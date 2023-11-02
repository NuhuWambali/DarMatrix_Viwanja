@extends('layouts.mainLayouts')
@section('title','Add Plot')
@section('smallTitle','Project / Plots / Add Plot ')
@section('content')

<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add Plot</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('addPlot')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputName">Land Use</label>
                                <select class="form-control @error('land_use') is-invalid @enderror" id="land_use" name="land_use">
                                    <option value="" selected disabled>Select Land Use</option>
                                    <option value="Residential">Residential</option>
                                    <option value="Commercial">Commercial</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Agricultural">Agricultural</option>
                                    <option value="Recreational">Recreational</option>
                                    <option value="Educational">Educational</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Public and Civic">Public and Civic</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Utilities">Utilities</option>
                                    <option value="Religious">Religious</option>
                                    <option value="Mixed-Use">Mixed-Use</option>
                                    <option value="Open Space">Open Space</option>
                                    <option value="Historic or Cultural">Historic or Cultural</option>
                                    <option value="Vacant or Undeveloped">Vacant or Undeveloped</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <input class="form-control @error('project_id') is-invalid @enderror" type="number" id="project_id" name="project_id" value="{{$project_id}}" placeholder="Enter Plot Number" hidden>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAddress">Plot Number</label>
                                <input class="form-control @error('plot_number') is-invalid @enderror" type="text" id="plot_number" name="plot_number" value="{{old('plot_number')}}" placeholder="Enter Plot Number">
                                @error('plot_number')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputSize">Plot Size ( in sqm )</label>
                                <input class="form-control @error('plot_size') is-invalid @enderror" type="number" id="plot_size" name="plot_size" value="{{old('plot_size')}}" placeholder="Enter Plot Size">
                                @error('plot_size')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputRegion">Monthly Installment Price</label>
                                <input class="form-control @error('monthly_installment_price') is-invalid @enderror" type="number" id="monthly_installment_price" name="monthly_installment_price" value="{{old('monthly_installment_price')}}" placeholder="Enter Installment Price">
                                @error('monthly_installment_price')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputTotalPlots">Cash Price Per Sqm</label>
                                <input class="form-control @error('cash_price_per_sqm') is-invalid @enderror" type="number" id="cash_price_per_sqm" name="cash_price_per_sqm" value="{{old('cash_price_per_sqm')}}" placeholder="Enter Cash Price Per SQM">
                                @error('cash_value')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAvailablePlots">File</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" value="{{old('file')}}" placeholder="Enter File">
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
                                <input class="form-control @error('description1') is-invalid @enderror" type="text" id="description1" name="description1" value="{{old('description1')}}" placeholder="Enter Description 1">
                                @error('description1')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="col-form-label" for="inputDescription">Description 2</label>
                                <input class="form-control @error('description2') is-invalid @enderror" type="text" id="description2" name="description2" value="{{old('description2')}}" placeholder="Enter Description 2">
                                @error('description')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class="col-form-label" for="inputDescription">Description 3</label>
                                <input class="form-control @error('description3') is-invalid @enderror" type="text" id="description3" name="description3" value="{{old('description3')}}" placeholder="Enter Description 3">
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
                                    <option value="1">Active</option>
                                    <option value="0">inActive</option>
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
                                  {{-- <a href="{{route('viewPlots')}}" type="button" style="color:#fff" class="btn btn-danger"  >
                                      Cancel
                                  </a> --}}
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
