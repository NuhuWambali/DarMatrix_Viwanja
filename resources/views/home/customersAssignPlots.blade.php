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
                                        <select class="form-control @error('project_id') is-invalid @enderror" id="project" name="project_id">
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
                                        <select class="form-control  @error('plot_id') is-invalid @enderror" id="plots" name="plot_id">
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="payment_way">Select Payment Way</label>
                                        <select class="form-control @error('payment_way') is-invalid @enderror" id="payment_way" name="payment_way">
                                            <option value="installment">Installment</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="col-form-label" for="payment_way">Method</label>
                                        <select class="form-control @error('payment_method_id') is-invalid @enderror" id="payment_method_id" name="payment_method_id">
                                            @foreach($payment_methods as $payment_method)
                                            <option value="{{$payment_method->id}}">{{$payment_method->name}}</option>
                                            @endforeach
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
                    @if($orders->count())
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

                            <a href="{{route('payment',$order->id)}}" class="btn btn-dark btn-sm"  >
                                <i class="fas fa-money-bill" aria-hidden="true"></i> Pay
                            </a>
                        </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="align-middle">
                            <td colspan="12" class="text-center">
                               No Record Found in Database
                            </td>
                        </tr>
                        @endif
                    </tbody>
                    </table>
                    </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="modal exampleModal" id="exampleModal" tabindex="">--}}
{{--    <div class="modal-dialog modal-dialog-centered" style="max-width: 900px;">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <!-- Modal Title -->--}}
{{--                @if($orders->count())--}}
{{--                <h5 class="modal-title text-primary">{{$order->project->name }} | Payment Section</h5>--}}
{{--                @else--}}
{{--                <h5 class="modal-title text-primary"> Payment Section</h5>--}}
{{--                @endif--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            @include('partials.order-details')--}}
{{--    </div>--}}
{{--</div>--}}

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


@endsection
