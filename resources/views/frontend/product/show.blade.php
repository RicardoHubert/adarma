@extends('layouts.frontend.landing')

@section('content')

<section class="bg-green">
    <nav class="navbar navbar-expand-lg navbar-dark text-white">
        @include('layouts.frontend.navbar')
    </nav>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-md rounded-md">
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid object-cover rounded-md">
                </div>
            </div>
            <div class="col-md-6 mt-md-0 mt-3">
                <div class="row">
                    <div class="col-3">
                        <p>Name</p>
                    </div>
                    <div class="col-9">
                        <p>: {{ $product->name }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Category</p>
                    </div>
                    <div class="col-9">
                        <p>: {{ $product->category->name }}</p>
                    </div>
                </div>
                @if ($product->status == 'Available')
                    <div class="row">
                        <div class="col-3">
                            <p>Price/Unit</p>
                        </div>
                        <div class="col-9">
                            <p>: {{ $product->price }} / {{ $product->unit }}</p>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-3">
                        <p>Status</p>
                    </div>
                    <div class="col-9">
                        <p>: {{ $product->status }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Description</p>
                    </div>
                    <div class="col-9 d-flex">
                        <span>:&nbsp;</span> {!! $product->description !!}
                    </div>
                </div>
                <div class="row">
                    <div>
                        @if ($product->status == 'Available')
                            <button class="btn btn-dark mt-3" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Request Product</button>                        
                        @endif
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <form action="{{ route('product.request') }}" method="POST" class="modal-content">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Request Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid object-cover rounded-md">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="col-form-label">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required />
                                            
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required />
                                            
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone_number" class="col-form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required />
                                            
                                            @error('phone_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required />
                                            
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="request_product" class="col-form-label">Request Product</label>
                                            <div class="row">
                                                <div class="col-md-12 col-12 d-flex align-items-center">
                                                    <div class="col-md-9 col-9">
                                                        <input type="number" min="1" class="form-control" id="request_product" name="request_product" value="{{ old('request_product') }}" required />
                                                    </div>
                                                    <div class="col-md-3 col-3 ml-3">/ {{ $product->unit }}</div>
                                                </div>
                                            </div>
                                            
                                            @error('request_product')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-dark">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (count($products) > 0)
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-bold">Product Related</h3>
                    <p><a href="{{ route('product') }}">View All <i class="fa fa-long-arrow-right"></i></a></p>
                </div>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-1" style="min-height: 400px">
                @foreach ($products as $item)
                    <div class="col my-3">
                        <div class="card rounded-shadow-card">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-shadow-card-top object-cover" style="height: 250px;">
                            <div class="card-body">
                                <p class="card-title text-muted">{{ $item->category->name }}</p>
                                <p class="card-title">{{ strip_tags(Str::limit($item->name, 50, '...')) }}</p>
                                <div class="d-flex">
                                    <h5>{{ $item->price }}</h5><span>/{{ $item->unit }}</span>
                                </div>
                                <p class="text-white"><span class="@if($item->status == 'Available') bg-primary @else bg-secondary @endif rounded px-2">{{ $item->status }}</span></p>
                                <div class="d-grid">
                                    <a href="{{ route('product.show', $item->slug) }}" class="btn btn-dark text-white mt-3"><span class="px-1">Selengkapnya</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

@endsection