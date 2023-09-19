@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Article</h4>

                    @if ( auth()->user()->role->name != 'admin' && count($category) === 0)
                        <div class="d-flex justify-content-center my-5">
                            <p>Silahkan minta tolong dibuatkan <strong>Kategori</strong> ke Admin ya!</p>
                        </div>
                    @elseif ( auth()->user()->role->name != 'admin' && count($writers) === 0 )
                        <div class="d-flex justify-content-center my-5">
                            <p><strong>Kategori</strong> sudah dibuat, Sekarang silahkan minta tolong dibuatkan <strong>Penulis</strong> ke Admin ya!</p>
                        </div>
                    @else
                        @if (count($category) === 0)
                            <div class="d-flex justify-content-center my-5">
                                <a href="{{ route('category_article.create') }}" class="py-3 px-4 bg-primary text-white rounded-pill">Add Category First!</a>
                            </div>
                        @elseif (count($writers) === 0)
                            <div class="d-flex justify-content-center my-5">
                                <a href="{{ route('writer.create') }}" class="py-3 px-4 bg-primary text-white rounded-pill">Add Writer First!</a>
                            </div>
                        @else
                            <form class="form-sample" action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
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
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <label for="title" class="col-sm-2 col-form-label">Title Article</label>
                                            <div class="col-sm-10">
                                                <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" />
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
                                                        <option value="{{ $row->id }}" {{ (collect(old('category_id'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>                                        
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
                                                <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" />
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
                                                <input type="hidden" id="editor" name="editor" class="form-control @error('editor') is-invalid @enderror" value="{{ Auth::user()->id }}"/>
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
                                                    <option value="{{ $row->id }}" {{ (collect(old('writer'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->name }}</option>                                        
                                                @endforeach
                                            </select>
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
                                            @if (count($article) == null)
                                                <p class="py-3"><i>currently have no articles</i></p>
                                            @else
                                                <select id="relate_article_first" name="relate_article_first" class="form-control py-3 @error('relate_article_first') is-invalid border-danger @enderror">
                                                    <option selected disabled>--- Choose Related Article ---</option>
                                                    @foreach ($article as $row)
                                                        <option value="{{ $row->id }}" {{ (collect(old('relate_article_first'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->title }}</option>                                        
                                                    @endforeach
                                                </select>
                                                @error('relate_article_first')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label id="relate_article_second" class="col-sm-4 col-form-label">Related Article</label>
                                            <div class="col-sm-8">
                                                @if (count($article) < 2)
                                                    <p class="py-3"><i>currently don't have more than one article</i></p>
                                                @else
                                                    <select id="relate_article_second" name="relate_article_second" class="form-control py-3 @error('relate_article_second') is-invalid border-danger @enderror">
                                                        <option selected disabled>--- Choose Related Article ---</option>
                                                        @foreach ($article as $row)
                                                            <option value="{{ $row->id }}" {{ (collect(old('relate_article_second'))->contains($row->id)) ? 'selected' : ''}}>{{ $row->title }}</option>                                        
                                                        @endforeach
                                                    </select>
                                                    @error('relate_article_second')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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
                                                <textarea class="form-control ckeditor" id="body" name="body" rows="4">{{ old('body') }}</textarea>
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
                    @endif

                </div>
            </div>
          </div>

    </div>
  </div>
  <!-- content-wrapper ends -->

@endsection
