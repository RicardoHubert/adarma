@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manager Landing Page</h4>
                    {{-- <p class="card-description">
                        Fill in the input form below to upload an <code>Category Product</code>
                    </p> --}}
                    
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group row">
                                <label for="image" class="col-md-12 col-form-label">Image Logo</label>
                                <div class="col-md-12">
                                    <img src="@if (isset($landingpage->img_logo))
                                        {{ asset('storage/' . $landingpage->img_logo) }}
                                    @else
                                        {{ asset('images/logo.png') }}
                                    @endif" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group row">
                                <label for="image" class="col-md-12 col-form-label">Landing Page</label>
                                <div class="col-md-12 position-relative">
                                    <img src="
                                        @if (isset($landingpage->img_landing)) 
                                            {{ asset('storage/' . $landingpage->img_landing) }}
                                        @else
                                            {{ asset('images/img landing page.png') }}
                                        @endif
                                        " class="img-fluid">
                                    <div class="py-1 position-absolute top-6 col-md-7 col-10">
                                        <h1 class="fw-bold text-white" style="font-weight: 700;">@if (isset($landingpage->text_landing_large)) {{ $landingpage->text_landing_large }} @else High Quality Product from trusted Farmer @endif</h1>
                                        <p class="text-white text-xs">@if (isset($landingpage->text_landing_small)) {{ $landingpage->text_landing_small }} @else The raw materials we use are genuine coconut shells taken from local Farm with guaranteed quality @endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-end">
                                @if (isset($landingpage))
                                    <form action="{{ route('landingpage.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-2">Reset</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Change</button>

                                <!-- Modal -->
                                <form action="{{ route('landingpage.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Change Landing Page</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="img_logo" class="col-form-label">Logo Image <span class="text-muted">(Dimension: Square)</span></label>
                                                        <input id="img_logo" name="img_logo" type="file" class="form-control @error('img_logo') is-invalid @enderror">
                
                                                        @error('img_logo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="img_landing" class="col-sm-12 col-form-label">Landing Page Image <span class="text-muted">(Dimension: 1440 x 968)</span></label>
                                                        <input id="img_landing" name="img_landing" type="file" class="form-control @error('img_landing') is-invalid @enderror">
                
                                                        @error('img_landing')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="text_landing_large" class="col-sm-12 col-form-label">Text Landing Large</label>
                                                        <textarea class="form-control" id="text_landing_large" name="text_landing_large">{{ old('text_landing_large') }} @if (isset($landingpage->text_landing_large)) {{ $landingpage->text_landing_large }} @endif</textarea>
                
                                                        @error('text_landing_large')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="text_landing_small" class="col-sm-12 col-form-label">Text Landing Small</label>
                                                        <textarea class="form-control" id="text_landing_small" name="text_landing_small">{{ old('text_landing_small') }} @if (isset($landingpage->text_landing_small)) {{ $landingpage->text_landing_small }} @endif</textarea>
                                                        
                                                        @error('text_landing_small')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 grid-margin" id="carousel">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Carousel</h4>
                        {{-- <p class="card-description">
                            Fill in the input form below to upload an <code>Category Product</code>
                        </p> --}}
                        @if (isset($carousel))
                            <form action="{{ route('landingpage.carousel.destroy') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Reset</button>
                            </form>
                        @endif
                    </div>

                    <div class="row row-cols-md-3 row-cols-1 my-3">
                        <div class="col">
                            @if (isset($carousel->img_first))
                                <img src="{{ asset('storage/' . $carousel->img_first) }}" class="img-fluid">
                                <span>Image First</span>
                            @endif
                            </div>
                        <div class="col">
                            @if (isset($carousel->img_second))
                                <img src="{{ asset('storage/' . $carousel->img_second) }}" class="img-fluid">
                                <span>Image Second</span>
                            @endif
                        </div>
                        <div class="col">
                            @if (isset($carousel->img_third))
                                <img src="{{ asset('storage/' . $carousel->img_third) }}" class="img-fluid">
                                <span>Image Third</span>
                            @endif
                        </div>
                    </div>

                    <form action="{{ route('landingpage.carousel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="img_first" class="col-sm-2 col-form-label">Image First</label>
                                            <div class="col-sm-10">
                                                <input id="img_first" name="img_first" type="file" class="form-control @error('img_first') is-invalid @enderror">
        
                                                @error('img_first')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="img_second" class="col-sm-2 col-form-label">Image Second</label>
                                            <div class="col-sm-10">
                                                <input id="img_second" name="img_second" type="file" class="form-control @error('img_second') is-invalid @enderror">
        
                                                @error('img_second')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="img_third" class="col-sm-2 col-form-label">Image Third</label>
                                            <div class="col-sm-10">
                                                <input id="img_third" name="img_third" type="file" class="form-control @error('img_third') is-invalid @enderror">
        
                                                @error('img_third')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
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
