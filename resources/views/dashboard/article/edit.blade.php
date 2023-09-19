@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Article</h4>

                    @if (count($category) === 0)
                        <div class="d-flex justify-content-center my-5">
                            <a href="{{ route('category_article.create') }}" class="py-3 px-4 bg-primary text-white rounded-pill">Add Category First!</a>
                        </div>
                    @else
                        <form class="form-sample" action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p class="card-description">
                                Fill in the input form below to upload an <code>Article</code>
                            </p>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">File upload</label>
                                        <div class="col-sm-10">
                                            <div class="input-group col-xs-12">
                                                <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror file-upload-info" placeholder="Upload Image">
                                            </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid my-3">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title Article</label>
                                        <div class="col-sm-10">
                                            <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $article->title }}" />
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                    <label id="category_id" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-10">
                                        <select id="category_id" name="category_id" class="form-control py-3 @error('category_id') is-invalid border-danger @enderror">
                                            <option selected disabled>--- Choose Category ---</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}" @if($article->category_id === $row->id) selected @endif>{{ $row->name }}</option>                                        
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ $article->slug }}" />
                                            @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="editor" class="col-sm-4 col-form-label">Editor</label>
                                        <div class="col-sm-8">
                                            <p class="form-control bg-light">{{ Auth::user()->name }}</p>
                                            <input type="hidden" id="editor" name="editor" class="form-control @error('editor') is-invalid @enderror" value="{{ $article->editor_id->id }}"/>
                                            @error('editor')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                    <label for="writer" class="col-sm-4 col-form-label">Writer</label>
                                    <div class="col-sm-8">
                                        <select id="writer" name="writer" class="form-control py-3 @error('writer') is-invalid border-danger @enderror">
                                            <option selected disabled>--- Choose Category ---</option>
                                            @foreach ($writers as $row)
                                                <option value="{{ $row->id }}" @if($article->writer === $row->id) selected @endif>{{ $row->name }}</option>                                        
                                            @endforeach
                                        </select>
                                        {{-- <input id="writer" name="writer" type="text" class="form-control @error('writer') is-invalid @enderror" value="{{ $article->writer }}" /> --}}
                                        @error('writer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label id="relate_article_first" class="col-sm-4 col-form-label">Related Article</label>
                                        <div class="col-sm-8">
                                            @if (count($articles) > 1)
                                                <select id="relate_article_first" name="relate_article_first" class="form-control py-3 @error('relate_article_first') is-invalid border-danger @enderror">
                                                    <option selected disabled>--- Choose Related Article ---</option>
                                                    @foreach ($articles->where('id', '!=', $article->id) as $row)
                                                        <option value="{{ $row->id }}" @if($article->relate_article_first === $row->id) selected @endif>{{ $row->title }}</option>                                        
                                                    @endforeach
                                                </select>
                                                @error('relate_article_first')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @else
                                                <p class="py-3"><i>currently have no articles</i></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label id="relate_article_second" class="col-sm-4 col-form-label">Related Article</label>
                                        <div class="col-sm-8">
                                            @if (count($articles) > 2)
                                                <select id="relate_article_second" name="relate_article_second" class="form-control py-3 @error('relate_article_second') is-invalid border-danger @enderror">
                                                    <option selected disabled>--- Choose Related Article ---</option>
                                                    @foreach ($articles->where('id', '!=', $article->id) as $row)
                                                        <option value="{{ $row->id }}" @if($article->relate_article_second === $row->id) selected @endif>{{ $row->title }}</option>                                        
                                                    @endforeach
                                                </select>
                                                @error('relate_article_second')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @else
                                                <p class="py-3"><i>currently don't have more than one article</i></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="body">Body</label>
                                        <div class="@error('body') p-1 border border-danger @enderror">
                                            <textarea class="form-control ckeditor" id="body" name="body" rows="4">{{ $article->body }}</textarea>
                                        </div>
                                        @error('body')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <a href="{{ route('article.index') }}" class="btn btn-light mr-2">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
          </div>

    </div>
  </div>
  <!-- content-wrapper ends -->

@endsection
