@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Data Entry Payment Terms</h4>
                    <form class="form-sample" action="{{ route('dataentry_payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">
                            Fill in the input form below to upload an <code>Category</code>
                        </p>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Payment Terms</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name_payment" type="text" class="form-control @error('name_payment') is-invalid @enderror" value="{{ old('name_payment') }}"/>

                                        @error('name_payment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('dataentry_payment.index') }}" class="btn btn-light mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>

    </div>
  </div>
  <!-- content-wrapper ends -->

@endsection
