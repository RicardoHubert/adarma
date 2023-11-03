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
                                <h4 class="card-title">Supplier</h4>
                                <a href="{{ route('supplier.create') }}" class="btn btn-primary">
                                    Add Supplier
                                </a>
                            </div>
                        </div>
                        <p class="card-description">
                            {{ count($supplier) }} Supplier
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Nama Produk
                                    </th>
							
                                    <th class="font-weight-bold text-black">
                                        Nama Supplier
                                    </th>
                              
                                    <th class="font-weight-bold text-black">
                                        Kontak Supplier
                                    </th>
                                    <th class="font-weight-bold text-black">
										Kota Supplier
									</th>
                                    <th class="font-weight-bold text-black">
                                        Alamat Supply
                                    </th>
									<th class="font-weight-bold text-black">
                                        Email
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Word File
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Tipe Supplier
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Price / Unit
                                    </th>
									<th class="font-weight-bold text-black">
                                        Note
                                    </th>
									<th class="font-weight-bold text-black">
                                        Status Supplier
                                    </th>
                                    <th class="font-weight-bold text-black">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supplier as $row)
                                    <tr>
                                        <td>
                                            {{ $row->nama_produk }}
                                        </td>
                            
                                        <td>
                                            {{ $row->nama_supplier }}
                                        </td>
										<td>
                                            {{ $row->no_supplier }}
                                        </td>
                                        <td>
                                            {{ $row->kota_supply }}
                                        </td>
                                        <td>
                                            {{ $row->alamat_supplier }}
                                        </td>
                                        <td>
                                            {{ $row->email }}
                                        </td>
                                        <td>
										<a href="{{ route('supplier.generate-pdf', $row->id) }}" class="btn btn-success">
											Download PDF    
										</a>                                        
										</td>
                                        <td>
                                            {{ $row->tipe_supplier }}
                                        </td>
                                        <td>
                                            {{ $row->price }} / {{$row->unit}}
                                        </td>
										<td>
                                            {{ $row-> note}}
                                        </td>
										<td>
                                            {{ $row->status_supplier }}
                                        </td>

                                        <td>
                                            {{ $row->created_at }}
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('supplier.edit', $row->id) }}" class="mr-2">
                                                    <i class="fa fa-pencil-square-o fa-lg text-black hover-edit"></i>
                                                </a>

                                                <form action="{{ route('supplier.destroy', $row->id) }}" method="POST">
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
