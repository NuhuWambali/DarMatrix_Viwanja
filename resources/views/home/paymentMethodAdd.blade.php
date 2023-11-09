@extends('layouts.mainLayouts')
@section('title','AddPaymentMethod')
@section('smallTitle','Payment Method / Add')
@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header"><strong>Add Payment Method</strong></div>
        <div class="card-body">
          <div class="example">
            <div class="tab-content rounded-bottom">
                <form action="{{route('addPaymentMethod')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="inputPassword">Name</label>
                            <div class="col-sm-7">
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name')}}" required>
                            @error('name')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label" for="inputPassword">Description</label>
                            <div class="col-sm-7">
                            <input class="form-control @error('description') is-invalid @enderror" type="text" id="description" name="description" value="{{old('description')}}" >
                            @error('description')
                            <p class="dismissAlert text-danger" id="dismissAlert">
                                {{$message}}
                            </p>
                            @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1">
                            <button class="btn btn-primary mb-3" type="submit">Add</button>
                        </div>
                        <div class="col-sm-2">
                          <a href="{{route('paymentMethod')}}" style="color:#fff" class="btn btn-danger mb-3" >Cancel</a></button>
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
