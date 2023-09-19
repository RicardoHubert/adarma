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
                                <h4 class="card-title">Category Article</h4>
                                <a href="{{ route('category_article.create') }}" class="btn btn-primary">
                                    Add
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($category) }} Category Article
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Published
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Category
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $row)
                                    <tr>
                                        <td>
                                            {{ $row->created_at }}
                                        </td>
                                        <td>
                                            {{ $row->name }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('category_article.show', $row->id) }}" class="mr-3">
                                                    <i class="fa fa-eye fa-lg text-black hover-show"></i>
                                                </a>
                                                <a href="{{ route('category_article.edit', $row->id) }}" class="mr-2">
                                                    <i class="fa fa-pencil-square-o fa-lg text-black hover-edit"></i>
                                                </a>
                                                <form action="{{ route('category_article.destroy', $row->id) }}" method="POST">
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
