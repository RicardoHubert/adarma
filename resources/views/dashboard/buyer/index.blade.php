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
                                <h4 class="card-title">Buyer</h4>
                                <a href="{{ route('buyer.create') }}" class="btn btn-primary">
                                    Add Buyer
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($buyer) }} Buyer
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Nama Buyer
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Negara tujuan  
                                    </th>
                                    <th>
                                        Nama Produk    
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Kontak buyer
                                    </th>
                                    <th class="font-weight-bold text-black">
										Email
									</th>
                                    <th class="font-weight-bold text-black">
                                        Nama perusahaan
                                    </th>
									<th class="font-weight-bold text-black">
                                        Alamat perusahaan
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        kebutuhan
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Payment terms
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Shipping terms
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Note
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Status
                                    </th>
									<th class="font-weight-bold text-black">
                                        Published
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buyer as $row)
                                    <tr>
                                        <td>
                                            {{ $row->nama }}
                                        </td>
                                        <td>
                                            {{ $row->negara_tujuan }}
                                        </td>
                                        <td>
                                            {{ $row->nama_produk }}
                                        </td>
                                        <td>
                                            {{ $row->no_buyer }}
                                        </td>
										<td>
                                            {{ $row->email }}
                                        </td>
                                        <td>
                                            {{ $row->nama_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $row->alamat_perusahaan }}
                                        </td>
                                        <td>
                                            {{ $row->kebutuhan }}
                                        </td>
                                        <td>
                                            {{ $row->payment_terms }}
                                        </td>
                                        <td>
                                            {{ $row->shipping_terms }}
                                        </td>
                                        <td>
                                            {{ $row->note }}
                                        </td>
                                        <td>
                                            {{ $row->status_buyer}}
                                        </td>
                                        <td>
                                            {{ $row->created_at }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('buyer.edit', $row->id) }}" class="mr-2">
                                                    <i class="fa fa-pencil-square-o fa-lg text-black hover-edit"></i>
                                                </a>

                                                <form action="{{ route('buyer.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" style="border: none; background-color:transparent;">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-delete"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ route('transactional.forward', $row->id) }}" class="ml-2">
                                                    <i class="fa fa-money fa-lg text-black hover-edit"></i>
                                                </a>
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
