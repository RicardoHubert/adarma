@extends('layouts.dashboard.app')

@section('content')

  <!-- content-wrapper -->
  <div class="content-wrapper">
    <div class="row">
        
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Document Adarma Mandiri Nusantara</h4>

                    <p class="card-description">
                        Change in the input form below to update your<code>Document</code>
                    </p>
                    
                    <div class="row">
							<div class="table-responsive">
								<table id="myTable" class="table table-striped">
									<thead>
										<tr>
											<th class="font-weight-bold text-black">
											Nama Dokumen
											</th>
											<th class="font-weight-bold text-black">
											Kategori Dokumen
											</th>
                                            <th>
                                            Jenis Dokumen
                                            </th>
											<th class="font-weight-bold text-black">
											Action
											</th>
										</tr>
									</thead> 
									<tbody>
									@foreach ($companydoc as $row )
										<tr>
											<td>
											{{$row->name_doc}}
											</td>
											<td>
											{{$row->category_doc}}
											</td>
                                            <td>
                                              {{$row->types_doc}}  
                                            </td>	
											<td class="d-flex">
                                    <form action="{{ route('companyfile.delete', $row->id) }}" method="POST">
                                         @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mr-2">
                                            <i class="fa fa-trash-o fa-lg text-black hover-edit" style="color:white;"><span> Hapus</span></i>
                                        </button>
                                    </form>
                                    <a href="{{ asset('storage/' . $row->file_doc) }}" class="btn btn-success" target="_blank">
                                        Preview PDF
                                    </a>
                                        </td>
										</tr>					
									</tbody>
									@endforeach
								</table>
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
								<button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#addDocument">Add Document</button>
                                <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#profileModal">Change</button> -->
                            </div>
                            <!-- Modal Profile -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                </div> -->
                            </form>

							

                            <!-- Modal Password -->
                            <form action="{{ route('companyfile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal fade" id="addDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <!-- <h5 class="modal-title" id="exampleModalLabel">Update Password</h5> -->
												<h5 class="modal-title" id="exampleModalLabel">Add Document</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name_doc" class="col-sm-12 col-form-label">Title Of Document</label>
                                                    <input type="name_doc" class="form-control" id="name_doc" name="name_doc" />
            
                                                    @error('name_doc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

												
												<div class="mb-3">
												<label for="category_doc" class="col-sm-12 col-form-label">Category of Document</label>
															<select name="category_doc" class="form-control @error('category_doc') border-danger @enderror py-3" id="category_doc">
																<option selected disabled>--- Choose One ---</option>
																<option value="General Document"> General Document </option>
                                                                <option value="Supplier Document"> Supplier Document </option>
                                                                <option value="Buyer Document"> Buyer Document </option>
																<option value="Finance Document"> Finance Document </option>
																<option value="Award Document"> Award Document </option>
															</select>
														@error('category_doc')
															<span class="text-danger">{{ $message }}</span>
														@enderror
												</div>

                                                <label for="types_doc" class="col-sm-12 col-form-label">Types of Dokumen</label>
															<select name="types_doc" class="form-control @error('types_doc') border-danger @enderror py-3" id="types_doc">
																<option selected disabled>--- Choose One ---</option>
																<option value="internal"> Internal </option>
																<option value="Supplier Document"> Supplier Document </option>
																<option value="Buyer Document"> Buyer Document </option>
															</select>
														@error('category_doc')
															<span class="text-danger">{{ $message }}</span>
														@enderror
												</div>

												<div class="mb-3">
                                                    <label for="file_doc" class="col-sm-12 col-form-label">Document File</label>
                                                    <input type="file" class="form-control" id="file_doc" name="file_doc" />
            
                                                    @error('file_doc')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
	

													<div class="mb-3">
															<label for="status" class="col-sm-12 col-form-label">Status Document</label>
																	<select name="status" class="form-control @error('status') border-danger @enderror py-3" id="status">
																		<option selected disabled>--- Choose One ---</option>
																		<option value="published"> Published </option>
																		<option value="not-published"> Not Published </option>

																	</select>
																@error('status')
																	<span class="text-danger">{{ $message }}</span>
																@enderror
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
