@extends('layouts.mainLayouts')
@section('title','Add Project')
@section('smallTitle','Project / Add Project')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add User</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('addProject')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputName">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}" placeholder="Enter Project name">
                                @error('name')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAddress">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{old('address')}}" placeholder="Enter Address">
                                @error('address')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputCity">City</label>
                                <input class="form-control @error('city') is-invalid @enderror" type="text" id="city" name="city" value="{{old('city')}}" placeholder="Enter City">
                                @error('city')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">




                            <div class="col-4">
                                <label class=" col-form-label" for="inputRegion">Region</label>
                                <input class="form-control @error('region') is-invalid @enderror" type="text" id="region" name="region" value="{{old('region')}}" placeholder="Enter Region">
                                @error('region')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputTotalPlots">Total Plots</label>
                                <input class="form-control @error('total_plots') is-invalid @enderror" type="number" id="total_plots" name="total_plots" value="{{old('total_plots')}}" placeholder="Enter Total plots">
                                @error('total_plots')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputAvailablePlots">Available Plots</label>
                                <input class="form-control @error('available_plots') is-invalid @enderror" type="number" id="available_plots" name="available_plots" value="{{old('available_plots')}}" placeholder="Enter Available plots" min="0">
                                @error('available_plots')
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
                                <label class="col-form-label" for="inputDescription">Description</label>
                                <input class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" value="{{old('description')}}" placeholder="Enter Description">
                                @error('description')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputPlots">Plots Number</label>
                                <input class="form-control @error('plots_number') is-invalid @enderror" type="text" id="plots_number" name="plots_number" value="{{old('plots_number')}}" placeholder="Enter plots number" min="0">
                                @error('plots_number')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputBlock">Block</label>
                                <input class="form-control @error('block') is-invalid @enderror" type="text" id="block" name="block" value="{{old('block')}}" placeholder="Enter Block">
                                @error('block')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputFile">File</label>
                                <input class="form-control @error('file_path') is-invalid @enderror" type="file" id="file_path" name="file_path" value="{{old('file_path')}}" placeholder="Enter File Path">
                                @error('file_path')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputInstallmentPeriod">Installment Period</label>
                                <input class="form-control @error('installment_period') is-invalid @enderror" type="text" id="installment_period" name="installment_period" value="{{old('installment_period')}}" placeholder="Enter Installment Period" min="0">
                                @error('installment_period')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label class=" col-form-label" for="inputPricePerSqm">Price Per Sqm</label>
                                <input class="form-control @error('price_per_sqm') is-invalid @enderror" type="numbe" id="price_per_sqm" name="price_per_sqm" value="{{old('price_per_sqm')}}" placeholder="Enter Price Per Sqm" min="0">
                                @error('price_per_sqm')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputStartDate">Start Date</label>
                                <input class="form-control @error('start_date') is-invalid @enderror" type="date" id="start_date" name="start_date" value="{{old('start_date')}}" placeholder="Enter Start Date">
                                @error('start_date')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
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
                        <div class="col-4 mt-5">

                            <div class="row">
                                <div class="col-sm-6" >
                                  <button type="submit" style="float:right" class="btn btn-primary" >
                                      Save
                                    </button>
                                </div>
                                <div class="col-sm-6">
                                  <a href="{{route('projects')}}" type="button" style="color:#fff" class="btn btn-danger"  >
                                      Cancel
                                  </a>
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
</div>
</div>

@endsection
