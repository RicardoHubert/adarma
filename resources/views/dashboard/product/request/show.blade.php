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
                                <h4 class="card-title">Product Request</h4>
                                <a href="{{ route('product.request.index') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            Show
                        </p>
                        
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $product_request->product->image) }}" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <span class="col-md-12 mb-2 text-black font-weight-bold">
                                            Product Detail
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Product
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product_request->product->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Category
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product_request->product->category->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Price/Unit
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product_request->product->price }}/{{ $product_request->product->unit }}
                                        </div>
                                    </div>
                                    <div class="row border-top mt-3 pt-3">
                                        <span class="col-md-12 mb-2 text-black font-weight-bold">
                                            Customer
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Request Name
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product_request->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Phone Number
                                        </div>
                                        <div class="col-md-8 text-black d-flex">
                                            :&nbsp;{{ $product_request->phone_number }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Email
                                        </div>
                                        <div class="col-md-8 text-black d-flex">
                                            :&nbsp;{{ $product_request->email }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Address
                                        </div>
                                        <div class="col-md-8 text-black d-flex">
                                            :&nbsp;{{ $product_request->address }}
                                        </div>
                                    </div>                                    
                                    <div class="row border-top mt-3 pt-3">
                                        <span class="col-md-12 mb-2 text-black font-weight-bold">
                                            Request
                                        </span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Unit
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $product_request->request_product }} {{ $product_request->product->unit }}
                                        </div>
                                    </div>
                                    <div class="row border-top mt-3 pt-3">
                                        <div class="col-md-4">
                                            Status
                                        </div>
                                        <div class="col-md-8 text-black">
                                            @if ($product_request->status == 'pending') 
                                                <span class="py-2 px-3 rounded-pill bg-secondary"> 
                                                    pending
                                                </span>
                                            @elseif ($product_request->status == 'proccess') 
                                                <span class="py-2 px-3 rounded-pill bg-secondary"> 
                                                    processed
                                                </span>
                                            @elseif ($product_request->status == 'complete') 
                                                <span class="py-2 px-3 rounded-pill bg-primary text-white"> 
                                                    completed
                                                </span>
                                            @elseif ($product_request->status == 'reject')
                                                <span class="py-2 px-3 rounded-pill bg-danger text-white"> 
                                                    rejected
                                                </span>
                                            @else
                                                Unknown
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row border-top mt-3 pt-3">
                                        <div class="col-md-4">
                                            Action
                                        </div>
                                        <div class="col-md-8 text-black">
                                            <form action="{{ route('product.request.update', $product_request->id) }}" method="POST">
                                                @csrf
                                                @if ($product_request->status == 'pending')
                                                    <input type="submit" name="status" class="btn btn-sm btn-danger" value="reject"/>
                                                    <input type="submit" name="status" class="btn btn-sm btn-primary" value="proccess"/>
                                                @elseif ($product_request->status == 'proccess')
                                                    <input type="submit" name="status" class="btn btn-sm btn-danger" value="reject"/>
                                                    <input type="submit" name="status" class="btn btn-sm btn-dark" value="complete"/>
                                                @elseif ($product_request->status == 'complete')
                                                    <button type="button" data-toggle="modal" data-target="#deleteRequestProduct" style="border: none; background-color:transparent;">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-delete"></i>
                                                    </button>
                                                @elseif ($product_request->status == 'reject')
                                                    <button type="button" data-toggle="modal" data-target="#deleteRequestProduct" style="border: none; background-color:transparent;">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-delete"></i>
                                                    </button>
                                                @else
                                                    Status Unknown
                                                @endif
                                            </form>
                                            <!-- Modal  Delete -->
                                            <div class="modal fade" id="deleteRequestProduct" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="deleteRequestProductLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <form action="{{ route('product.request.destroy', $product_request->id) }}" method="POST" class="modal-content">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteRequestProductLabel">Request Product</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete this request product?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                                        </div>
                                                    </form>
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
        </div>

    </div>
    <!-- content-wrapper ends -->

@endsection