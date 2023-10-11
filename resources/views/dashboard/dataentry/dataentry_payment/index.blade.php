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
                                <h4 class="card-title">Data Entry Payment</h4>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h4 class="card-title">Payment Terms</h4>
                                <a href="{{ route('dataentry_payment.create') }}" class="btn btn-primary">
                                    Add
                                </a>
                            </div>
                        </div>
						<p class="card-description">
    {{ count($get_payment_terms) }} Payment Terms
</p>

                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-black">
                                        Payment Terms
                                    </th>

                                    <th class="font-weight-bold text-black">
                                        Published
                                    </th>
									<th>
										Action
									</th>
                                </tr>
                            </thead>
                            <tbody>
							@foreach ($get_payment_terms as $row)

								<tr>
									<td>
										{{ $row->name_payment }}
									</td>   
                                    <td>
                                            {{ $row->created_at }}
                                    </td>
                                    
									<td class="d-flex">
								<form action="{{ route('dataentry_payment.destroy', $row->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger mr-2">
											<i class="fa fa-trash-o fa-lg text-black hover-edit" style="color:white;"><span> Hapus</span></i>
										</button>
									</form>
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