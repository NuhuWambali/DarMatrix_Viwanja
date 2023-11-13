@extends('layouts.mainLayouts')
@section('title','Assign Plots')
@section('smallTitle','Assign Plots')
@section('content')
@include('sweetalert::alert')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header"><strong>Assign Plots</strong></div>
            <div class="card-body">
                <div class="example">
                    <div class="tab-content rounded-bottom">
                        <form action="{{ route('assign.plots') }}" method="post" enctype="multipart/form-data" id="assignForm">
                            @csrf
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <div class="mb-3 row">
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="inputName">Project</label>
                                        <input type="text" name="customer_id" value="{{$customer->id}}" hidden>
                                        <select class="form-control" id="project" name="project_id">
                                            <option value="" disabled selected>Select a Project</option>
                                            @foreach($projects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project')
                                            <p class="dismissAlert text-danger" id="dismissAlert">
                                                {{$message}}
                                            </p>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="plots">Plots</label>
                                        <select class="form-control" id="plots" name="plot_id">
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-1 pt-3">

                                            <button class="btn btn-primary mt-4" type="submit">Assign</button>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#project').change(function () {
            var projectId = $(this).val();
            if (projectId) {
                $.ajax({
                    type: 'GET',
                    url: '/get-plots/' + projectId,
                    success: function (data) {
                        console.log(data);
                        $('#plots').html(data);
                    }
                });
            } else {
                $('#plots').html('<option value="" disabled selected>Select a Project First</option>');
            }
        });
    });
</script>
@endsection
