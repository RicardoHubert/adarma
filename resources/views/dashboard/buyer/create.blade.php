@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Buyer</h4>

                    <form class="form-sample" action="{{ route('buyer.store') }}" method="POST">
                        @csrf
                        <p class="card-description">
                            Fill in the input form below to adding a<code>Buyer</code>
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-4 col-form-label">Nama Buyer</label>
                                    <div class="col-sm-8">
                                        <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_buyer" class="col-sm-2 col-form-label">No.Handphone</label>
                                    <div class="col-sm-10">
                                        <input id="no_buyer" name="no_buyer" type="text" class="form-control @error('no_buyer') is-invalid @enderror" value="{{ old('no_buyer') }}" />
                                        @error('no_buyer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_perusahaan" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input id="nama_perusahaan" name="nama_perusahaan" type="text" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan') }}" />
                                        @error('nama_perusahaan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat_perusahaan" class="col-sm-2 col-form-label">Alamat Perusahaan</label>
                                    <div class="col-sm-10">
                                        <input id="alamat_perusahaan" name="alamat_perusahaan" type="text" class="form-control @error('alamat_perusahaan') is-invalid @enderror" value="{{ old('alamat_perusahaan') }}" />
                                        @error('alamat_perusahaan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
<!-- 
							<div class="col-md-6">
                                <div class="form-group row">
                                    <label for="no_buyer" class="col-sm-2 col-form-label">No.Handphone</label>
                                    <div class="col-sm-10">
                                        <input id="no_buyer" name="no_buyer" type="text" class="form-control @error('no_buyer') is-invalid @enderror" value="{{ old('no_buyer') }}" />
                                        @error('no_buyer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('writer.index') }}" class="btn btn-light mr-2">Cancel</a>
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
