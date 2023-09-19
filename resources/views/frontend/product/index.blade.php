@extends('layouts.frontend.landing')

@section('content')

    <section class="bg-green">
        <nav class="navbar navbar-expand-lg navbar-dark text-white">
            @include('layouts.frontend.navbar')
        </nav>
    </section>  

    <section>
        <div class="container">
            @if (count($category) > 0)
                <div class="row">
                    <div class="my-3 d-flex justify-content-between">
                        <div>
                            <h3 class="mr-3">{{ count($products) }} Product</h3>
                        </div>
                        <div class="dropdown">
                            <button class="border-category dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter Category
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('product') }}">All Product</a></li>
                                @foreach ($category as $row)
                                    <li><a class="dropdown-item" href="{{ route('product.filter', strtolower($row->name)) }}">{{ $row->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
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
                                    @if ($item->status == 'Available')
                                        <div class="d-flex">
                                            <h5>{{ $item->price }}</h5><span>/{{ $item->unit }}</span>
                                        </div>
                                    @endif
                                    <p class="text-white"><span class="@if($item->status == 'Available') bg-primary @else bg-secondary @endif rounded px-2">{{ $item->status }}</span></p>
                                    <div class="d-grid">
                                        <a href="{{ route('product.show', $item->slug) }}" class="btn btn-dark text-white mt-3"><span class="px-1">Selengkapnya</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
            <div class="d-flex justify-content-center" style="margin: 250px 0">
                <p>Belum ada Products!</p>
            </div>
            @endif
        </div>
    </section>

@endsection