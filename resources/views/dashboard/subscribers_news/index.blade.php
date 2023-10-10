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
                                <h4 class="card-title">Subscriber Newsletter</h4>
                            </div>
                        </div>
						<p class="card-description">
                            {{ count($subscribers_news) }} Subscribers
                        </p>

                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="font-weight-bold text-black">
                                            Email
                                        </th>
                                        <th class="font-weight-bold text-black">
                                            Status
                                        </th>
                                        <th class="font-weight-bold text-black">
                                            Last Update Article
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($subscribers_news as $row)

                                    <tr>
                                        <td>
                                            {{ $row->email }}
                                        </td>
                                        <td>
                                            {{ $row->status }}
                                        </td>
                                        <td>
                                            @if ($row->last_update_news_at == null)
                                                <h7>Belum ada update</h7>
                                            @else
                                                {{ $row->last_update_news_at }}
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                        @auth
                                            @if (auth()->user()->role->name == 'super_admin')
                                                <form action="{{ route('subscribers_news.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mr-2">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-edit" style="color:white;"><span> Hapus</span></i>
                                                    </button>
                                                </form>
                                            @else
                                                <p>Maaf, Hanya Ricardo yang bisa hapus subs</p>
                                            @endif
                                        @endauth
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
