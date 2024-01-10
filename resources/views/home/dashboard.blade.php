@extends('layouts.mainLayouts')
@section('title','Dashboard')
@section('content')
@section('smallTitle','Dashboard')
@include('sweetalert::alert')
<div class="row">
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-primary">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{$totalCustomers}} <span class="fs-6 fw-normal">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                </svg></span></div>
            <div>Customers</div>
          </div>
          <div class="dropdown">
            <i class="fa fa-users fa-3x"></i>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart1" height="70"></canvas>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-info">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{$totalProjects}} <span class="fs-6 fw-normal">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                </svg></span></div>
            <div>Total Projects</div>
          </div>
          <div class="dropdown">
            <i class="fas fa-project-diagram fa-3x"></i>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart2" height="70"></canvas>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-warning">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">{{$totalPlots}} <span class="fs-6 fw-normal">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-top"></use>
                </svg></span></div>
            <div>Total Plots</div>
          </div>
          <div class="dropdown">
            <i class="fa fa-area-chart fa-3x"></i>
          </div>
        </div>
        <div class="c-chart-wrapper mt-3" style="height:70px;">
          <canvas class="chart" id="card-chart3" height="70"></canvas>
        </div>
      </div>
    </div>
   
    <div class="col-sm-6 col-lg-3">
      <div class="card mb-4 text-white bg-success">
        <div class="card-body pb-0 d-flex justify-content-between align-items-start">
          <div>
            <div class="fs-4 fw-semibold">Tsh. {{number_format($netAmount) }}<span class="fs-6 fw-normal">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom"></use>
                </svg></span></div>
            <div>Net Amount</div>
          </div>
          <div class="dropdown">
          </div>
        </div>
        <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
          <canvas class="chart" id="card-chart4" height="70"></canvas>
        </div>
      </div>
    </div>

</div>
@endsection
