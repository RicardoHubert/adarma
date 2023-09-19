@extends('layouts.frontend.landing')

@section('content')

    {{-- carousell --}}
    <div>
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-green" style="z-index: 10;">
                @include('layouts.frontend.navbar')
            </nav>
        </div>

        @if (isset($carousel->img_first))
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ 'storage/' . $carousel->img_first }}" class="d-block w-100 img-height-car" alt="...">
                </div>
                <div class="carousel-item">
                    @if (isset($carousel->img_second))
                        <img src="{{ 'storage/' . $carousel->img_second }}" class="d-block w-100 img-height-car" alt="...">            
                    @elseif (isset($carousel->img_third))
                        <img src="{{ 'storage/' . $carousel->img_third }}" class="d-block w-100 img-height-car" alt="...">
                    @else
                        <img src="{{ 'storage/' . $carousel->img_first }}" class="d-block w-100 img-height-car" alt="...">
                    @endif
                </div>
                <div class="carousel-item">
                    @if (isset($carousel->img_third))
                        <img src="{{ 'storage/' . $carousel->img_third }}" class="d-block w-100 img-height-car" alt="...">  
                    @else
                        <img src="{{ 'storage/' . $carousel->img_first }}" class="d-block w-100 img-height-car" alt="...">
                    @endif
                </div>
            </div>
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> --}}
        </div>
        @endif
        
        <div @if (isset($carousel->img_first))
            class="container"
            @endif>
            <section
                @if (isset($carousel->img_first))
                    class="position-absolute top-0"
                @else
                    style="background-image: url(
                    @if (isset($landingpage->img_landing)) 
                        {{ 'storage/' . $landingpage->img_landing }}
                    @else    
                        'images/img landing page.png'
                    @endif);
                    background-repeat: no-repeat;
                    background-size: cover;
                    ">        
                @endif
        
                <div class="container">
                    <div class="text-white py-landing">
                        <div class="col-md-8 mt-5">
                            <h1 class="fw-bold title-2">
                                @if (isset($landingpage->text_landing_large))
                                    {{ $landingpage->text_landing_large }}
                                @else
                                    High Quality Product from trusted Farmer
                                @endif
                            </h1>
                            <p class="subtitle-1">
                                @if (isset($landingpage->text_landing_small))
                                    {{ $landingpage->text_landing_small }}
                                @else
                                    The raw materials we use are genuine coconut shells taken from local Farm with guaranteed quality                                
                                @endif
                            </p>
                            <a href="#about" class="btn btn-lg bg-light fw-bold my-5 btn-about-us"><span class="text-green">About Us</span></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- carousell end --}}

    {{-- <section style="background-image: url(@if (isset($landingpage->img_landing)) 
            {{ 'storage/' . $landingpage->img_landing }}
        @else    
            'images/img landing page.png'
        @endif);
        background-repeat: no-repeat;
        background-size: cover;
        ">
        <nav class="navbar navbar-expand-lg navbar-dark text-white">
            @include('layouts.frontend.navbar')
        </nav>

        <div class="container">
            <div class="text-white py-landing">
                <div class="col-md-8">
                    <h1 class="fw-bold fs-md-1 fs-landing">2 High Quality Product from trusted Farmer</h1>
                    <p>The raw materials we use are genuine coconut shells taken from local Farm with guaranteed quality</p>
                    <a href="#about" class="btn btn-lg bg-light fw-bold my-5 p-landing"><span class="text-green">About Us</span></a>
                </div>
            </div>
        </div>
    </section>         --}}

    <section class="container" id="about">
        <div class="py-5">
            <div class="text-center">
                <h1 class="title-1">WELCOME TO <span class="text-green">ADARMA MANDIRI</span> COMPANY</h1>
                <p class="subtitle-1">Indonesian Argicultural Trading Company</p>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="pb-5 d-xl-flex ps-relative">
            <img src="images/about us img.png" class="img-fluid img-aboutus">
            
            <div class="row d-flex flex-row-reverse ps-absolute padding-card card-about-us" style="z-index: 1;">
                <div class="col-xl-6 d-flex align-items-center" style="margin-top: 50px;">
                    <div class="card p-5 rounded-shadow-card">
                        <div class="card-body">
                            <h1 class="fw-bolder title-1 pb-3">About Us</h1>
                            <p class="card-text subtitle-1">In the beginning PT Arta Mandiri was enganged in manufacturing where we processed derivative Agricultural and Industrial Product. After that our company growing toour product plantations, to process more derivate products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-3" id="profil">
        <section class="container">
            <div class="my-5">
                <div class="text-center mx-auto">
                    <h1 class="fw-bolder title-1">Our Motto</h1>
                    <h1 class="fw-bolder title-1 text-green">Consistency and Cooperation is our quality</h1>
                </div>
            </div>
        </section>
    
        <section class="container">
            <div class="py-5">
                <div class="row row-cols-1 row-cols-md-3">
                    <div class="col d-flex align-items-center my-3">
                        <div class="card pt-5 px-3 rounded-shadow-card height-card-home">
                            <div class="card-body text-center">
                                <img src="images/vision.png" class="img-fluid" style="width: 25%;">
                                <h1 class="fw-bolder title-1 pb-3 text-green mt-3">Vision</h1>
                                <p class="card-text text-secondary subtitle-1">To Become the largest <br>
                                    exportercompany from Indonesia that
                                    can 
                                    bring Indonesia coconut
                                    derivative products into superior
                                    products and have high value in the
                                    world</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center my-3">
                        <div class="card pt-5 px-3 rounded-shadow-card">
                            <div class="card-body text-center height-card-home">
                                <img src="images/mission.png" class="img-fluid" style="width: 25%;">
                                <h1 class="fw-bolder title-1 pb-3 text-green mt-3">Mission</h1>
                                <p class="card-text text-secondary subtitle-1">1. Providing coconut derivative
                                    products with the best Quality original
                                    from Indonesia specifcally for ousr
                                    customers and trying to fulfill requests
                                    according to customer wisher because
                                    customer satisfaction our priority. 
                                    <br><br>
                                    2. Can utilize coconut derivativesbas a
                                    substitute for natural ingrediemnts for
                                    daily needs in a sustainable manner</p>
                            </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-center my-3">
                        <div class="card pt-5 px-3 rounded-shadow-card height-card-home">
                            <div class="card-body text-center">
                                <img src="images/integrity.png" class="img-fluid" style="width: 25%;">
                                <h1 class="fw-bolder title-1 pb-3 text-green mt-3">Integrity</h1>
                                <p class="card-text text-secondary subtitle-1">Our Integrity is keeping our word and treating others with failness and respect. Integrity is one of our most cherished assets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section class="container">
        <div class="py-5 col-md-8 mx-auto text-center">
            <h1 class="fw-bolder title-1">Our Product</h1>
            <h1 class="fw-bolder title-1 text-green">High Quality Product from trusted Farmer and Manufacture</h1>
        </div> 

        @if (count($category) != 0)
            <div class="py-5">
                <div class="row">
                    <div class="d-flex justify-content-between">
                        <h3 class="font-weight-bold">Category Product</h3>
                        <p><a href="{{ route('product') }}">View All <i class="fa fa-long-arrow-right"></i></a></p>
                    </div>
                </div>
                <div class="row row-cols-md-3 row-cols-1">
                    @foreach ($category as $item)
                        <div class="col">
                            <a href="{{ route('product.filter', $item->name) }}">
                                <div class="position-relative my-3">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" style="height:250px; width:100%; object-fit: cover;">
                                    <h1 class="position-absolute text-center text-white z-10 fw-bold fs-landing-4" style="inset: 100px 0;">{{ $item->name }}</h1>
                                    <div class="position-absolute card-link"></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

@endsection

        