@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Supplier</h4>
			
                    <form class="form-sample" action="{{ route('supplier.store') }}" method="POST">
                        @csrf
                        <p class="card-description">
                            Fill in the input form below to adding a<code>Supplier</code>
                        </p>

						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_produk" class="col-sm-4 col-form-label">Full Name Product</label>
                                    <div class="col-sm-12">
                                        <input id="nama_produk" name="nama_produk" type="text" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ old('nama_produk') }}" />
                                        @error('nama_produk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                                    <div class="col-sm-12">
                                        <input id="nama_supplier" name="nama_supplier" type="text" class="form-control @error('nama_supplier') is-invalid @enderror" value="{{ old('nama_supplier') }}" />
                                        @error('nama_supplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_supplier" class="col-sm-4 col-form-label">Kontak Supplier</label>
                                    <div class="col-sm-12">
                                        <input id="no_supplier" name="no_supplier" type="text" class="form-control @error('no_supplier') is-invalid @enderror" value="{{ old('no_supplier') }}" />
                                        @error('no_supplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


							

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="kota_supply" class="col-sm-2 col-form-label">Kota Supply</label>
                                    <div class="col-sm-12">
										<select name="kota_supply" class="form-control @error('kota_supply') border-danger @enderror py-3" id="kota_supply">
											<option selected disabled>--- Choose One ---</option>
											@foreach ($indonesia_province as $row)
												<option value="{{ $row->name }}" @if($row->name === $row->id) selected @endif {{ (collect(old('name'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>
											@endforeach
										</select>
                                        @error('kota_supply')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat_supplier" class="col-sm-4 col-form-label">Alamat Supplier</label>
                                    <div class="col-sm-12">
                                        <input id="alamat_supplier" name="alamat_supplier" type="text" class="form-control @error('alamat_supplier') is-invalid @enderror" value="{{ old('alamat_supplier') }}" />
                                        @error('alamat_supplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

							<div class="col-md-12">
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
<!-- 
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="tipe_supplier" class="col-sm-4 col-form-label">Tipe Supplier</label>
                                    <div class="col-sm-12">
                                        <input id="tipe_supplier" name="tipe_supplier" type="text" class="form-control @error('tipe_supplier') is-invalid @enderror" value="{{ old('tipe_supplier') }}" />
                                        @error('tipe_supplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div> -->
							<div class="col-md-4">
                                <div class="form-group">
                                    <label for="tipe_supplier" class="col-sm-4 col-form-label">Tipe Supplier</label>
                                    <div class="col-sm-12">
										<select name="tipe_supplier" class="form-control @error('tipe_supplier') border-danger @enderror py-3" id="tipe_supplier">
											<option selected disabled>--- Choose One ---</option>
												<option value="Instansi"> Instansi </option>
												<option value="Instansi"> Non Instansi </option>
										</select>

                                        @error('tipe_supplier')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="price" class="col-sm-4 col-form-label">Price</label>
                                        <div class="col-sm-12">
                                            <input id="price" name="price" type="text" type-currency="USD" placeholder="US$" class="form-control input-currency @error('price') is-invalid @enderror" value="{{ old('price') }}"/>

                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="unit" class="col-sm-4 col-form-label">/ Unit</label>
                                        <div class="col-sm-12">
                                            <input id="unit" name="unit" type="text" class="form-control @error('unit') is-invalid @enderror" value="{{ old('unit') }}"/>

                                            @error('unit')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

							<div class="col-md-12">
                                <div class="form-group">
                                    <label for="requirment_word_file" class="col-sm-4 col-form-label">Requirment Specification</label>
                                    <div class="col-sm-10">
                                            <div class="@error('requirment_word_file') p-1 border border-danger @enderror">
                                                <textarea id="requirment_word_file" name="requirment_word_file" cols="30" rows="10" class="form-control ckeditor @error('requirment_word_file') is-invalid @enderror">{{ old('requirment_word_file') }}</textarea>
                                            </div>

                                            @error('requirment_word_file')
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
                                    <a href="{{ route('supplier.index') }}" class="btn btn-light mr-2">Cancel</a>
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
  <script src="{{ asset('js/price-format.js') }}"></script>

@endsection
