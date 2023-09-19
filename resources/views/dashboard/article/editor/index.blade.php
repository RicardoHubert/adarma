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
                                <h4 class="card-title">Editors</h4>
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($editors) }} Editor
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Published
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Name
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Email
                                    </th>
                                    {{-- <th class="font-weight-bold text-black">
                                        Action
                                    </th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($editors as $row)
                                    <tr>
                                        <td>
                                            @if ($row->created_at != null)
                                                {{ $row->created_at }}
                                            @else
                                                Created Automatically
                                            @endif
                                        </td>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            {{ $row->email }}
                                        </td>
                                        {{-- <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="mr-3">
                                                    <i class="fa fa-eye fa-lg text-black hover-show"></i>
                                                </a>
                                                <a href="#" class="mr-2">
                                                    <i class="fa fa-pencil-square-o fa-lg text-black hover-edit"></i>
                                                </a>
                                            </div>
                                        </td> --}}
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