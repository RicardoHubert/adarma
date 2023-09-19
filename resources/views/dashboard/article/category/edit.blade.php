@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Category Article</h4>
                    <form class="form-sample" action="{{ route('category_article.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <p class="card-description">
                            Change in the input form below to update an <code>Category Article</code>
                        </p>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="image" class="col-sm-2 col-form-label">File upload</label>
                                    <div class="col-sm-10">
                                        <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                        <img class="img-fluid my-2" src="{{ asset('storage/' . $category->image) }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                    <div class="col-sm-10">
                                        <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}"/>

                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('category_article.index') }}" class="btn btn-light mr-2">Cancel</a>
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
