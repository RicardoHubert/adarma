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
                                <!-- <a href="{{ route('buyer.create') }}" class="btn btn-primary">
                                    Add Buyer
                                </a> -->
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($transactional) }} Transactional
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
                                        Kategori Produk
                                    </th>
									<th class="font-weight-bold text-black">
                                        Tipe Produk
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
                                        Payment Terms
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Shipping Terms
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        kebutuhan
                                    </th>
                                    <!-- <th class="font-weight-bold text-black">
                                        Payment terms
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Shipping terms
                                    </th> -->
                                    <!-- <th class="font-weight-bold text-black">
                                        Note
                                    </th> -->
                                    <!-- <th class="font-weight-bold text-black">
                                        Status
                                    </th> -->
									<th class="font-weight-bold text-black">
                                        Published
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactional as $row)
                                    <tr>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->nama }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->negara_tujuan }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->nama_produk }}
                                            @endif
                                        </td>
										<td>
                                            @if ($row->dataentryproduct)
                                                {{ $row->dataentryproduct->product }}
                                            @endif
                                        </td>
										<td>
											@if ($row->category)
												{{ $row->category->name }}
											@endif
										</td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->no_buyer }}
                                            @endif
                                        </td>
										<td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->email }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->nama_perusahaan }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->alamat_perusahaan }}
                                            @endif
                                        </td>
										<td>
                                            @if ($row->payment_terms)
                                                {{ $row->payment_terms->name_payment }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->shipping_terms)
                                                {{ $row->shipping_terms->name_shipping }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->buyer)
                                                {{ $row->buyer->kebutuhan }}
                                            @endif
                                        </td>
                                        <!-- <td>
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
                                        </td> -->
                                        <td>
                                            {{ $row->created_at }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('transactional.edit', $row->id) }}" class="mr-2">
                                                    <i class="fa fa-pencil-square-o fa-lg text-black hover-edit"></i>
                                                </a>

                                                <!-- <form action="{{ route('buyer.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                    <button type="submit" style="border: none; background-color:transparent;">
                                                        <i class="fa fa-trash-o fa-lg text-black hover-delete"></i>
                                                    </button>
                                                </form>

                                                <a href="{{ route('transactional.forward', $row->id) }}" class="ml-2">
                                                    <i class="fa fa-money fa-lg text-black hover-edit"></i>
                                                </a> -->
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
