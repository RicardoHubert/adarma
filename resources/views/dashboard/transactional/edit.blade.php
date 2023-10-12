@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Transactional</h4>

                    <form class="form-sample" action="{{ route('transactional.update', $transactional->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="card-description">
                            Change in the input form below to update a<code>Transactional</code>
                        </p>

						<div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_produk" class="col-sm-4 col-form-label">Full Name Product</label>
                                    <div class="col-sm-12">
                                        <input id="nama_produk" name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ $transactional->buyer->nama_produk }}" />
                                        @error('nama_produk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dataentry_product_id" class="col-md-2 col-form-label">Product Name</label>
                                    <div class="col-sm-12">
										<select name="dataentry_product_id" class="form-control @error('dataentry_product_id') border-danger @enderror py-3" id="dataentry_product_id">
											<option selected disabled>--- Choose One ---</option>
											@foreach ($dataentry as $row)
												<option value="{{ $row->id }}" @if($row->dataentry_product_id === $row->id) selected @endif {{ (collect(old('dataentry_product_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->product }}</option>
											@endforeach
										</select>

                                        @error('dataentry_product_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id" class="col-md-2 col-form-label">Category Name</label>
                                    <div class="col-sm-12">
										<select name="category_id" class="form-control @error('category_id') border-danger @enderror py-3" id="category_id">
											<option selected disabled>--- Choose One ---</option>
											@foreach ($category as $row)
												<option value="{{ $row->id }}" @if($transactional->buyer->category_id === $row->id) selected @endif {{ (collect(old('category_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>
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
                                    <label for="payment_terms_id" class="col-md-2 col-form-label">Payment Terms</label>
                                    <div class="col-sm-12">
										<select name="payment_terms_id" class="form-control @error('payment_terms_id') border-danger @enderror py-3" id="payment_terms_id">
											<option selected disabled>--- Choose One ---</option>
											@foreach ($dataentry_payment as $row)
												<option value="{{ $row->id }}" @if($row->payment_terms_id === $row->id) selected @endif {{ (collect(old('payment_terms_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name_payment }}</option>
											@endforeach
										</select>

                                        @error('payment_terms_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_terms_id" class="col-md-2 col-form-label">Shipping Terms</label>
                                    <div class="col-sm-12">
										<select name="shipping_terms_id" class="form-control @error('shipping_terms_id') border-danger @enderror py-3" id="shipping_terms_id">
											<option selected disabled>--- Choose One ---</option>
											@foreach ($dataentry_shipping as $row)
												<option value="{{ $row->id }}" @if($row->shipping_terms_id === $row->id) selected @endif {{ (collect(old('shipping_terms_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name_shipping }}</option>
											@endforeach
										</select>

                                        @error('shipping_terms_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('transactional.index') }}" class="btn btn-light mr-2">Cancel</a>
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
