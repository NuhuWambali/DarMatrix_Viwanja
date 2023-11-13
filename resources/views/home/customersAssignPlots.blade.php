@extends('layouts.mainLayouts')
@section('title','Assign Plots')
@section('smallTitle','Assign Plots')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Assign Plots</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label class=" col-form-label" for="inputName">Project</label>
                                <select class="form-control @error('project') is-invalid @enderror" id="project" name="project" value="{{old('project')}}">
                                    @foreach($projects as $project)
                                    <option value="project">{{$project->name}}</option>
                                    @endforeach
                                </select>
                                @error('fullname')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="plots">Plots</label>
                                <select class="form-control" id="plots" name="plots">
                                    <option value="plot1">Plot 1</option>
                                    <option value="plot2">Plot 2</option>
                                    <option value="plot1">Plot 3</option>
                                    <option value="plot1">Plot 4</option>
                                    <option value="plot1">Plot 5</option>
                                    <option value="plot1">Plot 6</option>
                                    <option value="plot1">Plot 1</option>
                                    <option value="plot2">Plot 2</option>
                                    <option value="plot1">Plot 3</option>
                                    <option value="plot1">Plot 4</option>
                                    <option value="plot1">Plot 5</option>
                                    <option value="plot1">Plot 6</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                   <div class="mb-1 pt-3">
                                    <button class="btn btn-primary mt-4 " type="submit" >Assign</button>
                                   </div>
                            </div>
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
@endsection
