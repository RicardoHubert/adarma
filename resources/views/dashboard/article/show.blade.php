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
                                <h4 class="card-title">Article</h4>
                                <a href="{{ route('article.index') }}" class="btn btn-primary">
                                    Back
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            Show
                        </p>
                        
                        <div class="row">
                            <div class="col-md-12 d-flex">
                                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid col-md-6" alt="">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            Title
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->title }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Category
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->category->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Slug
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->slug }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Editor
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->editor_id->name }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Writer
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->writer }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Related Article
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : @if ($article->relate_article_first != null)
                                            {{ $article->relate_article1->title }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Related Article
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : @if ($article->relate_article_second != null)
                                            {{ $article->relate_article2->title }}
                                            @else
                                            -
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Writer
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->writer }}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Body
                                        </div>
                                        <div class="col-md-8 text-black d-flex">
                                            :&nbsp;{!! $article->body !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Published
                                        </div>
                                        <div class="col-md-8 text-black">
                                            : {{ $article->created_at }}
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