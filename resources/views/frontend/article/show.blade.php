@extends('layouts.frontend.landing')

@section('content')
    
    <nav class="navbar navbar-expand-lg navbar-dark text-white bg-green">
        @include('layouts.frontend.navbar')
    </nav>

    <section>
        <div class="container">
                <div class="d-flex justify-content-md-between row">
                    @auth
                        <div class="col-md-3 order-md-1 order-3" id="sticky-sidebar">
                            <div class="sticky-top pt-3">
                                <div class="mb-5">
                                    <h1 class="fw-bolder fs-4 mb-4">Profil</h1>
                                    <div class="d-flex align-items-center">
                                        <img src=" 
                                        @if (isset(auth()->user()->image))
                                            {{ asset('storage/' . auth()->user()->image) }}
                                        @else
                                            {{ asset('images/user.png') }}
                                        @endif
                                        " class="object-cover rounded-full" alt="...">
                                        <div>
                                            <p class="fw-bold ml-3 p-0">{{ auth()->user()->name }}</p>
                                            <p class="fw-bold ml-3 text-sm text-muted p-0">{{ auth()->user()->role->name }}</p>
                                        </div>
                                    </div>
                                    <p class="mt-3 text-sm text-muted">Bergabung 
                                        @if ( auth()->user()->created_at !== null )
                                            {{ date('d F Y', strtotime(auth()->user()->created_at)) }}                                    
                                        @else
                                            <strong>Created Automatically</strong>
                                        @endif
                                    </p>
                                </div>
                                @if (auth()->user()->role->name != 'user')
                                    <hr>
                                    <div>
                                        <h1 class="fw-bolder fs-4 mb-4">Statistik</h1>
                                        <div class="row col-12">
                                            <div class="text-center col-4">
                                                <i class="fa fa-newspaper-o fa-3x" aria-hidden="true"></i>
                                                <p>{{ $count_articles }}</p>
                                            </div>
                                            <div class="text-center col-4">
                                                <i class="fa fa-eye fa-3x" aria-hidden="true"></i>
                                                <p>@if ($count_views != 0) {{ $count_views += 1 }} @else {{ $count_views }} @endif</p>
                                            </div>
                                            <div class="text-center col-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                                                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                <p>{{ $count_comment }}</p>
                                            </div>
                                        </div>
                                        {{-- <div class="input-group">
                                            <input type="text" class="form-control radius-left border-green" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                                            <button class="btn btn-success bg-green col-2 p-0 d-flex align-items-center justify-content-center" type="button" id="button-addon2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                                </svg>
                                            </button>
                                        </div> --}}
                                    </div>                                    
                                @endif
                            </div>
                        </div>
                    @endauth

                    <div class="@auth col-md-6 @else col-md-9 @endauth order-md-2 px-3 pt-3">
                        <h1 class="fw-bolder fs-2 pb-4">{{ $article->title }}</h1>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <div class="lh-xs">
                                    <p class="text-muted p-0 text-sm">Editor</p>
                                    <p class="text-muted fw-bold p-0 text-sm">{{ $article->editor_id->name }}</p>
                                </div>
                                <div class="ml-3 lh-xs">
                                    <p class="text-muted p-0 text-sm">Penulis</p>
                                    <p class="text-muted fw-bold p-0 text-sm">{{ $article->writer_id->name }}</p>
                                </div>
                            </div>
                            <div class="lh-xs">
                                <p class="text-muted p-0 text-sm">Dipublikasikan</p>
                                <p class="text-muted fw-bold p-0 text-sm">{{ date('d F Y', strtotime($article->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                            <div class="text-sm pl-1">{{ $article->views += 1 }}</div>
                        </div>
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid object-cover rounded-shadow-card my-3" style="width: 100%">
                        {!! $article->body !!}
                        
                        <div class="my-5">
                            <h1 class="fw-bolder fs-4 mb-4">Komentar</h1>
                            @auth
                                <form action="{{ route('comment.article') }}" method="POST">
                                    @csrf
                                    <div class="mb-5">
                                        <label for="comment" class="form-label">Tulis Komentar</label>
                                        <textarea class="form-control border-green @error('comment') border border-danger @enderror" name="comment" id="comment" rows="3"></textarea>
                                        @error('comment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn bg-green mt-3" type="submit">
                                                <img src="{{ asset('images/button-send.png') }}" width="30">
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="d-flex flex-column justify-content-center">
                                    <div class="text-center">
                                        <p>Please Login for adding your comment</p>
                                        <a class="px-4 btn btn-primary rounded-3" aria-current="page" href="{{ url('login') }}">Login</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                        <div class="mt-5">
                            @if (count($comments) != null)
                            <div class="my-2">
                                <div class="card">
                                    <div class="card-header py-3">
                                    Komentar <span class="bg-black rounded-pill text-white" style="padding: 0.5em 0.9em;">{{ count($comments) }}</span>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        @foreach ($comments as $item)
                                        <li class="list-group-item">
                                            <p>{{ $item->comment }}</p>
                                            <div class="d-flex justify-content-between">
                                                <span class="text-muted text-sm">{{ date('d F Y', strtotime($item->created_at)) }}</span>
                                                <span class="text-sm">from : <span class="text-muted">{{ $item->user->name }}</span></span>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @else
                                <div class="d-flex justify-content-center">
                                    <p>Belum ada Komentar!</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-3 order-md-3 pt-3">
                        @if (count($articles_latest) != 0)
                            <section class="mb-5">
                                <h1 class="fw-bolder fs-4 mb-4">Postingan Terbaru</h1>
                                @foreach ($articles_latest as $item)
                                    <a href="{{ route('article.show', $item->slug) }}" style="text-decoration:none; color:black;">
                                        <div class="mt-3 d-flex">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid object-cover rounded" alt="...">
                                            </div>
                                            <div class="col-8 p-0 ml-3">
                                                <div class="pl-2 d-flex align-items-between flex-column h-100">
                                                    <p class="mb-auto card-text lh-1 text-sm">{{ $item->title }}</p>
                                                    <div class="text-xs mt-2 d-flex justify-content-between">
                                                        <p class="text-muted p-0">{{ date('d F Y', strtotime($item->created_at)) }}</p>
                                                        <p class="text-muted p-0">Penulis: {{ explode(' ', trim($item->writer_id->name))[0] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </section>
                            <hr>
                        @endif
                        @if (count($articles_popular) != 0)
                            <section class="mb-5">
                                <h1 class="fw-bolder fs-4 mb-4">Postingan Terpopuler</h1>
                                @foreach ($articles_popular as $item)
                                    <a href="{{ route('article.show', $item->slug) }}" style="text-decoration:none; color:black;">
                                        <div class="mt-3 d-flex">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid object-cover rounded" alt="...">
                                            </div>
                                            <div class="col-8 p-0 ml-3">
                                                <div class="pl-2 d-flex align-items-between flex-column h-100">
                                                    <p class="mb-auto card-text lh-1 text-sm">{{ $item->title }}</p>
                                                    <div class="text-xs mt-2 d-flex justify-content-between">
                                                        <p class="text-muted p-0">{{ date('d F Y', strtotime($item->created_at)) }}</p>
                                                        <p class="text-muted p-0">Penulis: {{ explode(' ', trim($item->writer_id->name))[0] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </section>                            
                            <hr>
                        @endif
                        @if (isset($article_relate_1) || isset($article_relate_2))
                            <section class="mb-5">
                                <h1 class="fw-bolder fs-4 mb-4">Artikel Terkait</h1>
                                @if (isset($article_relate_1))
                                    <a href="{{ route('article.show', $article_relate_1->slug) }}" style="text-decoration:none; color:black;">
                                        <div class="mt-3 d-flex">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset('storage/' . $article_relate_1->image) }}" class="img-fluid object-cover rounded" alt="...">
                                            </div>
                                            <div class="col-8 p-0 ml-3">
                                                <div class="pl-2 d-flex align-items-between flex-column h-100">
                                                    <p class="mb-auto card-text lh-1 text-sm">{{ $article_relate_1->title }}</p>
                                                    <div class="text-xs mt-2 d-flex justify-content-between">
                                                        <p class="text-muted p-0">{{ date('d F Y', strtotime($article_relate_1->created_at)) }}</p>
                                                        <p class="text-muted p-0">Penulis: {{ explode(' ', trim($article_relate_1->writer_id->name))[0] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                @if (isset($article_relate_2))
                                    <a href="{{ route('article.show', $article_relate_2->slug) }}" style="text-decoration:none; color:black;">
                                        <div class="mt-3 d-flex">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset('storage/' . $article_relate_2->image) }}" class="img-fluid object-cover rounded" alt="...">
                                            </div>
                                            <div class="col-8 p-0 ml-3">
                                                <div class="pl-2 d-flex align-items-between flex-column h-100">
                                                    <p class="mb-auto card-text lh-1 text-sm">{{ $article_relate_2->title }}</p>
                                                    <div class="text-xs mt-2 d-flex justify-content-between">
                                                        <p class="text-muted p-0">{{ date('d F Y', strtotime($article_relate_2->created_at)) }}</p>
                                                        <p class="text-muted p-0">Penulis: {{ explode(' ', trim($article_relate_2->writer_id->name))[0] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            </section>
                            <hr>
                        @endif
                        @if (count($comments_top) != 0)
                            <section class="mb-5">
                                <h1 class="fw-bolder fs-4 mb-4">Komentar Terbanyak</h1>
                                @foreach ($comments_top as $item)
                                    <a href="{{ route('article.show', $item->article->slug) }}" style="text-decoration:none; color:black;">
                                        <div class="mt-3 d-flex">
                                            <div class="col-4 p-0 text-center">
                                                <p class="fs-4 text-primary p-0">{{ $item->count_article_id }}</p>
                                                <p class="text-xs">Komentar</p>
                                            </div>
                                            <div class="col-8 p-0 ml-3">
                                                <div class="pl-2 d-flex align-items-between flex-column h-100">
                                                    <p class="mb-auto card-text lh-1 text-sm">{{ $item->article->title }}</p>
                                                    <div class="text-xs mt-2 d-flex justify-content-between">
                                                        <p class="text-muted p-0">{{ date('d F Y', strtotime($item->article->created_at)) }}</p>
                                                        <p class="text-muted p-0">Author: {{ explode(' ', trim($item->article->writer_id->name))[0] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </section>
                        @endif
                    </div>
                </div>
        </div>
    </section>  

@endsection