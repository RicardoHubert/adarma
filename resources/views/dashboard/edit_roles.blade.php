@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Role</h4>
                    <form class="form-sample" action="{{ route('roles.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <p class="card-description">
                            Change in the input form below to update an<code>Roles</code>
                        </p>

                        <div class="row">
                            <label for="name" class="col-sm-2">Name</label>
                            <div class="col-sm-10">
                                <p class="">{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <p class="py-3">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-2 col-form-label">Status</label>

                            <div class="row col-md-10 d-flex py-1">
                                @foreach ($roles as $item)
                                    <div class="col-md-3">
                                        <div class="d-flex">
                                            <div class="form-check form-check-primary">
                                                <label for="{{ $item->id }}" class="form-check-label">
                                                <input type="radio" class="form-check-input" name="role_id" id="{{ $item->id }}" value="{{ $item->id }}" @if($item->id === $user->role_id) checked @endif>
                                                {{ $item->name }}
                                                <i class="input-helper"></i></label>
                                            </div>
                                        </div>
                                    </div>                                    
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <span class="text-danger col-md-2"></span>
                            @error('role_id')
                                <span class="text-danger col-md-10">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center justify-content-end">
                                    <a href="{{ route('users') }}" class="btn btn-light mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>

    </div>
  </div>
  <!-- content-wrapper ends -->

@endsection