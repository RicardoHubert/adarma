@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Profile</h4>

                    <p class="card-description">
                        Change in the input form below to update your<code>Profile</code>
                    </p>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <img src=" 
                            @if (isset(auth()->user()->image))
                                {{ asset('storage/' . auth()->user()->image) }}
                            @else
                                {{ asset('images/user.png') }}
                            @endif
                            " class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <div class="row mb-3">
                                <div class="col-4">
                                    Name
                                </div>
                                <div class="col-8">
                                    : {{ auth()->user()->name }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Email
                                </div>
                                <div class="col-8">
                                    : {{ auth()->user()->email }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-4">
                                    Role
                                </div>
                                <div class="col-8">
                                    : {{ auth()->user()->role->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center justify-content-start">
                                @if (isset(auth()->user()->image))
                                    <form action="{{ route('profile.image.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-3">Delete Image</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-secondary mr-3" data-toggle="modal" data-target="#passwordModal">Update Password</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profileModal">Change</button>
                            </div>
                            <!-- Modal Profile -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Change Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="image" class="col-form-label">Profile Image <span class="text-muted">(Dimension: Square)</span></label>
                                                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror">
            
                                                    @error('image')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="name" class="col-sm-12 col-form-label">Name</label>
                                                    <input class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" />
            
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="col-sm-12 col-form-label">Email</label>
                                                    <input class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" />
                                                    
                                                    @error('email')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- Modal Password -->
                            <form action="{{ route('password') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="current_password" class="col-sm-12 col-form-label">Current Password</label>
                                                    <input type="password" class="form-control" id="current_password" name="current_password" />
            
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password" class="col-sm-12 col-form-label">New Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" />
            
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="password_confirmation" class="col-sm-12 col-form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" />
                                                    
                                                    @error('password_confirmation')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form class="form-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                    </form>
                </div>
            </div>
          </div>

    </div>
  </div>
  <!-- content-wrapper ends -->

@endsection
