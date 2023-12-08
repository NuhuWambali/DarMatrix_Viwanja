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
                <h4 class="text-center my-4">My Plots Order</h4>
                <div class="table">
                    <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                        <th>#</th>
                        <th >Name</th>
                        <th>Project</th>
                        <th>Plot Number</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $index=>$order )
                        <tr class="align-middle">
                        <td>
                            <h6>{{$index+1}}</h6>
                        </td>
                        <td>
                            <h6>{{$customer->fullname}}</h6>
                        </td>
                        <td>
                            <h6>{{$order->project->name }}</h6>
                        </td>
                        <td>
                            <h6>{{$order->plot->plot_number}}</h6>
                        </td>

                        <td>
                            <a href="#" class="btn btn-dark btn-sm pay-button" data-toggle="tooltip" data-placement="top" title="Pay" style="color:#fff" data-bs-toggle="modal" data-bs-target="#exampleModal" data-order-id="{{$order->id}}">
                                <i class="fas fa-money-bill" aria-hidden="true"></i> Pay
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
</div>
{{-- modal --}}
<div class="modal exampleModal" id="exampleModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 650px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Pay</button>
        </div>
      </div>
    </div>
</div>

<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#project').change(function () {
            var projectId = $(this).val();
            if (projectId) {
                $.ajax({
                    type: 'GET',
                    url: '/get-plots/' + projectId,
                    success: function (data) {
                        $('#plots').html(data);
                    }
                });
            } else {
                $('#plots').html('<option value="" disabled selected>Select a Project First</option>');
            }
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('.pay-button').click(function (e) {
            e.preventDefault();
            var orderId = $(this).data('order-id');
            $.ajax({
                type: 'GET',
                url: '/get-order-details/' + orderId,
                success: function (data) {
                    // Extracting title and content separately
                    var title = $(data).filter('h4').text();
                    var bodyContent = $(data).not('h4').html();
                    // Setting the title and body content to the modal
                    $('#exampleModal .modal-body').html(bodyContent);
                    $('#exampleModal .modal-title').text(title).addClass('text-primary');
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
</script>


@endsection
