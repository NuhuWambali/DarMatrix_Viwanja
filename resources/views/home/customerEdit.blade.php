@extends('layouts.mainLayouts')
@section('title','Edit Customer')
@section('smallTitle','Customer / Edit Customer')
@section('content')

      <div class="card mb-4">
        <div class="card-header"><strong>Add Customer</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('editCustomer',['id' => $editCustomer->id])}}"  id="edit-customer-form-{{ $editCustomer->id }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputFullname">Full Name</label>
                                <input class="form-control @error('fullname') is-invalid @enderror" type="text" id="fullname" name="fullname" value="{{$editCustomer->fullname}}" placeholder="Fullname">
                                @error('fullname')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputEmail">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{$editCustomer->email}}" placeholder="Email">
                                @error('email')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputPhone">Phone Number</label>
                                <input class="form-control @error('phone_number') is-invalid @enderror" type="text" id="phone_number" name="phone_number" value="{{$editCustomer->phone_number}}" placeholder="Phone number" >
                                @error('phone_number')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDOB">Date Of Birth</label>
                                <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date" id="date_of_birth" name="date_of_birth" value="{{$editCustomer->date_of_birth}}" placeholder="Date of birth">
                                @error('date_of_birth')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputNida">National Id Number</label>
                                <input class="form-control @error('national_id_number') is-invalid @enderror" type="number" id="national_id_number" name="national_id_number" value="{{$editCustomer->national_id_number}}" placeholder="National Id Number" >
                                @error('national_id_number')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputAddress">Address</label>
                                <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{$editCustomer->address}}" placeholder="Address">
                                @error('address')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription1">Description 1</label>
                                <input class="form-control @error('description1') is-invalid @enderror" type="text" id="description1" name="description1" value="{{$editCustomer->description1}}" placeholder="Description 1">
                                @error('description1')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription2">Description 2</label>
                                <input class="form-control @error('description2') is-invalid @enderror" type="text" id="description2" name="description2" value="{{$editCustomer->description2}}" placeholder="Description 2" >
                                @error('description2')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription3">Description 3</label>
                                <input class="form-control @error('description3') is-invalid @enderror" type="text" id="description3" name="description3" value="{{$editCustomer->description3}}" placeholder="Description 3">
                                @error('description3')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription4">Description 4</label>
                                <input class="form-control @error('description4') is-invalid @enderror" type="text" id="description4" name="description4" value="{{$editCustomer->description4}}" placeholder="Description 4">
                                @error('description4')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription5">Description 5</label>
                                <input class="form-control @error('description5') is-invalid @enderror" type="text" id="description5" name="description5" value="{{$editCustomer->description5}}" placeholder="Description 5" >
                                @error('description5')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="col-form-label" for="inputDescription6">Description 6</label>
                                <input class="form-control @error('description6') is-invalid @enderror" type="text" id="description6" name="description6" value="{{$editCustomer->description6}}" placeholder="Description 6">
                                @error('description6')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>

                        </div>
                        <div class="mb-3 row">
                            <div class="col-4">
                                <label class=" col-form-label" for="inputFile">File @if($editCustomer->file)<a href="{{ asset($editCustomer->file) }}" target="_blank" class="btn btn-sm btn-primary">View File</a>@else no file provided @endif</label>
                                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file" value="{{$editCustomer->file}}" placeholder="Enter File">
                                @error('file')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                                <label class=" col-form-label" for="inputStatus">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="1" @if($editCustomer->status===1) selected @endif>Active</option>
                                    <option value="0" @if($editCustomer->status===0) selected @endif>inActive</option>
                                </select>
                                @error('status')
                                <p class="dismissAlert text-danger" id="dismissAlert">
                                    {{$message}}
                                </p>
                                @enderror
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-1 mt-2">
                                <button class="btn btn-primary mb-3" onclick="EditCustomerOnconfirmation(event,{{ $editCustomer->id }})" type="submit">Edit</button>
                            </div>
                            <div class="col-sm-2 mt-2">
                              <a href="{{route('viewCustomers')}}" style="color:#fff" class="btn btn-danger mb-3">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
@endsection
