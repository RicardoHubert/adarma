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
                                        <label for="category_id" class="col-md-2 col-form-label">Category Name</label>
                                        <div class="col-sm-12">
                                                <select name="category_id" class="form-control @error('category_id') border-danger @enderror py-3" id="category_id">
                                                    <option selected disabled>--- Choose One ---</option>
                                                    @foreach ($category as $row)
                                                        <option value="{{ $row->id }}" {{ (collect(old('category_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="col-sm-4 col-form-label">Nama Buyer</label>
                                    <div class="col-sm-12">
                                        <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" />
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="negara_tujuan" class="col-sm-4 col-form-label">Negara Tujuan</label>
                                    <div class="col-sm-12">
                                        <input id="negara_tujuan" name="negara_tujuan" type="text" class="form-control @error('negara_tujuan') is-invalid @enderror" value="{{ old('negara_tujuan') }}" />
                                        @error('negara_tujuan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_buyer" class="col-sm-2 col-form-label">No.Handphone</label>
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
                                        <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_perusahaan" class="col-sm-4 col-form-label">Nama Perusahaan</label>
                                    <div class="col-sm-12">
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
                                    <div class="col-sm-12">
                                        <input id="alamat_perusahaan" name="alamat_perusahaan" type="text" class="form-control @error('alamat_perusahaan') is-invalid @enderror" value="{{ old('alamat_perusahaan') }}" />
                                        @error('alamat_perusahaan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kebutuhan" class="col-sm-4 col-form-label">Kebutuhan</label>
                                    <div class="col-sm-12">
                                        <input id="kebutuhan" name="kebutuhan" type="text" class="form-control @error('kebutuhan') is-invalid @enderror" value="{{ old('kebutuhan') }}" />
                                        @error('kebutuhan')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="payment_terms" class="col-sm-4 col-form-label">Payment Terms</label>
                                    <div class="col-sm-12">
                                        <input id="payment_terms" name="payment_terms" type="text" class="form-control @error('payment_terms') is-invalid @enderror" value="{{ old('payment_terms') }}" />
                                        @error('payment_terms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="shipping_terms" class="col-sm-4 col-form-label">Shipping Terms</label>
                                    <div class="col-sm-12">
                                        <input id="shipping_terms" name="shipping_terms" type="text" class="form-control @error('shipping_terms') is-invalid @enderror" value="{{ old('shipping_terms') }}" />
                                        @error('shipping_terms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="note" class="col-sm-4 col-form-label">Note / Catatan</label>
                                    <div class="col-sm-12">
                                        <input id="note" name="note" type="text" class="form-control @error('note') is-invalid @enderror" value="{{ old('note') }}" />
                                        @error('note')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>          
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('buyer.index') }}" class="btn btn-light mr-2">Cancel</a>
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
