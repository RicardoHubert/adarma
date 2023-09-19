@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <form class="form-sample" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="card-description">
                            Change in the input form below to update an <code>Product</code>
                        </p>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="image" class="col-md-2 col-form-label">File upload</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid my-2" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-md-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}"/>

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="category_id" class="col-md-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select name="category_id" class="form-control @error('category_id') border-danger @enderror py-3" id="category_id">
                                                <option selected disabled>--- Choose One ---</option>
                                                @foreach ($category as $row)
                                                    <option value="{{ $row->id }}" @if($product->category_id === $row->id) selected @endif {{ (collect(old('category_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="slug" class="col-md-2 col-form-label">Slug</label>
                                    <div class="col-sm-10">
                                        <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug }}"/>

                                        @error('slug')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                        <input id="price" name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}"/>

                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="unit" class="col-md-3 col-form-label">Unit</label>
                                    <div class="col-sm-9">
                                        <input id="unit" name="unit" type="text" class="form-control @error('unit') is-invalid @enderror" value="{{ $product->unit }}"/>

                                        @error('unit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="description" class="col-md-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <div class="@error('description') p-1 border border-danger @enderror">
                                            <textarea id="description" name="description" cols="30" rows="10" class="form-control ckeditor @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                                        </div>

                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="price" class="col-md-2 col-form-label">Status</label>

                                    <div class="col-md-9">
                                        <div class="d-flex">
                                            <div class="form-check form-check-primary mr-3">
                                                <label for="status" class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="status" id="status" value="Available" @if(old('status')) checked @endif @if($product->status === 'Available') checked @endif>
                                                  Available
                                                <i class="input-helper"></i></label>
                                            </div>
                                            <div class="form-check form-check-primary">
                                                <label class="form-check-label">
                                                  <input type="radio" class="form-check-input" name="status" id="status" value="Not Available" @if(old('status')) checked @endif @if($product->status === 'Not Available') checked @endif>
                                                  Not Available
                                                <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('product.index') }}" class="btn btn-light mr-2">Cancel</a>
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