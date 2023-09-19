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
                                <h4 class="card-title">Product Request</h4>
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($product_request) }} Request
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Published
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Product
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Request
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Name/Phone Number
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Status
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_request as $row)
                                    <tr>
                                        <td>
                                            @if ($row->created_at != null)
                                                {{ $row->created_at }}
                                            @else
                                                Created Automatically
                                            @endif
                                        </td>
                                        <td>
                                            {{ $row->product->name }}
                                        </td>
                                        <td>
                                            {{ $row->request_product }} {{ $row->product->unit }}
                                        </td>
                                        <td>
                                            {{ $row->name }}/{{ $row->phone_number }}
                                        </td>
                                        <td>
                                            {{ $row->status }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('product.request.show', $row->id) }}" class="mr-3">
                                                    <i class="fa @if ($row->status == 'complete' || $row->status == 'reject')
                                                        fa-eye
                                                    @else
                                                        fa-pencil-square-o
                                                    @endif fa-lg text-black hover-show"></i>
                                                </a>
                                                <form action="{{ route('product.request.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" style="border: none; background-color:transparent;">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->

@endsection