@extends('layouts.frontend.landing')

@section('content')
    
    <section class="@if (isset($article)) pb-landing @endif bg-green">
        <nav class="navbar navbar-expand-lg navbar-dark text-white">
            @include('layouts.frontend.navbar')
        </nav>
        
        @if (isset($article))
            <div class="container">
                <div class="position-relative">
                    <div class="position-absolute top-100 mt-landing-1">
                        <div class="mb-3 rounded-shadow-card bg-white">
                            <div class="row g-0">
                                <img src="{{ asset('storage/' . $article->image) }}" class="col-md-4 object-cover rounded-shadow-card-left rounded-shadow-card-top" alt="...">
                                <div class="col-md-8">
                                    <div class="mx-4 my-4">
                                        <div class="pb-4">
                                            <h1 class="fw-bolder fs-2">{{ $article->title }}</h1>
                                            <p class="text-muted">{{ $article->category->name }}</p>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </div>
                                                <div class="text-sm pl-1">{{ $article->views }}</div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex">
                                                <div class="lh-xs">
                                                    <p class="text-muted p-0 text-sm text-muted">Editor</p>
                                                    <p class="fw-bold p-0 text-sm text-muted">{{ $article->editor_id->name }}</p>
                                                </div>
                                                <div class="ml-3 lh-xs">
                                                    <p class="text-muted p-0 text-sm text-muted">Penulis</p>
                                                    <p class="fw-bold p-0 text-sm text-muted">{{ $article->writer_id->name }}</p>
                                                </div>
                                            </div>
                                            <div class="lh-xs">
                                                <p class="text-muted p-0 text-sm text-muted">Dipublikasikan</p>
                                                <p class="fw-bold p-0 text-sm text-muted">{{ date('d F Y', strtotime($article->created_at)) }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p class="card-text text-justify">{!! strip_tags(Str::limit($article->body, 200, '...')) !!}</p>
                                            <a href="{{ route('article.show', $article->slug) }}" class="btn btn-dark text-white rounded-pill mt-5"><span class="px-1">Selengkapnya</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>

    @if (isset($article))
        @if (count($articles) >= 1 && isset($article))
            <section class="@if (isset($article)) mt-article-index @endif">
                <div class="container">
                    <div class="row">
                        <div class="my-5 d-flex justify-content-between">
                            <div>
                                <h3 class="mr-3">{{ count($articles) }} Article</h3>
                            </div>
                            <div class="dropdown">
                                <button class="border-category dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter Category
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('article') }}">All Product</a></li>
                                    @foreach ($category as $row)
                                        <li><a class="dropdown-item" href="{{ route('article.filter', strtolower($row->name)) }}">{{ $row->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-md-3 row-cols-1">
                        @foreach ($articles as $item)
                            <div class="col my-3">
                                <div class="card rounded-shadow-card">
                                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top rounded-shadow-card-top object-cover" style="height: 250px">
                                    <div class="card-body">
                                        <div>
                                            <div class="d-flex justify-content-between">
                                                <p class="card-text text-muted text-sm">{{ $item->category->name }}</p>
                                                <p class="card-text text-muted text-sm">{{ date('d F Y', strtotime($item->created_at)) }}</p>
                                            </div>
                                            <h5 class="card-title text-sm-phone">{{ $item->title }}</h5>
                                            <a href="{{ route('article.show', $item->slug) }}" class="btn btn-dark text-white rounded-pill mt-3"><span class="px-1 text-sm-phone">Selengkapnya</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @else
            <div class="d-flex justify-content-center" style="margin: 450px 0 250px 0">
                <p>Belum ada Articles!</p>
            </div>
        @endif
    @else
        <div class="d-flex justify-content-center" style="margin: 250px 0">
            <p>Belum ada Articles!</p>
        </div>
    @endif

@endsection