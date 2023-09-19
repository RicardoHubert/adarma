@extends('layouts.dashboard.app')

@section('content')

    <!-- content-wrapper -->
    <div class="content-wrapper">

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Product</h4>
                                <a href="{{ route('product.index') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            Show
                        </p>
                        
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid col-md-6" alt="">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            Name
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Category
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product->category->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Price/Unit
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product->price }}/{{ $product->unit }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Status
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product->status }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Description
                                        </div>
                                        <div class="col-md-8 text-black d-flex">
                                            :&nbsp;{!! $product->description !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Published
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product->created_at }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->

@endsection