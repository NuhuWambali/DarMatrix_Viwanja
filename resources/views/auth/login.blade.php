@extends('layouts.auth.authMainLayouts')
@section('content')
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <form action="{{route('createLogin')}}" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                @if(session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h1>Login</h1>
                <p class="text-medium-emphasis">Sign In to your account</p>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                    </svg></span>
                  <input class="form-control" type="text" placeholder="Email" id="email" name="email" @error('email') is-invalid @enderror value="{{old('email')}}">
                 
                </div>
                @error('email')
                <p class="dismissAlert text-danger" id="dismissAlert">
                     {{$message}}
                </p>
              @enderror
                <div class="input-group mb-3"><span class="input-group-text">
                  <svg class="icon">
                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                  </svg></span>
                  <input class="form-control" type="password" placeholder="Password" id="password" name="password" @error('password') is-invalid @enderror value="{{old('password')}}">
                </div>
                @error('password')
                  <p class="dismissAlert text-danger" id="dismissAlert">
                       {{$message}}
                  </p>
                @enderror
                <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="submit">Login</button>
                  </div>
                  <div class="col-6 text-end">
                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
            <div class="card col-md-5 text-white bg-primary py-5">
              <div class="card-body text-center">
                <div>
                  <h2>Dar Matrix Viwanja</h2>
                  <p>Discover the future of real estate at Darmatrix Viwanja</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection