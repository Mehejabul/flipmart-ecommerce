@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Product Categories</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>All Product
                </h5>
                <a href="{{ route('product.create') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> Add Product
                </a>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Image</th>
                            <th>unit</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($products as $data )
                        <tr>

                            <td>{{ $data->product_name }}</td>
                            <td>{{ $data->category->pro_cate_name}}</td>
                            <td>{{ $data->brand->brand_name }}</td>

                            <td>
                                @if($data->product_image)
                                <img id="product_image_preview"
                                    src="{{ asset('uploads/product/'.$data->product_image) }}" alt="product_image"
                                    width="50px;">
                                @else
                                <img id="product_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                    alt="product_image" class="img-fluid rounded" width="100" />
                                @endif
                            </td>

                            <td>{{ $data->product_unit }}</td>
                            <td>{{ $data->product_price }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Manage <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                <i class="bx bx-show-alt"></i>show
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('product.edit', $data->product_slug) }}">
                                                <i class="bx bx-edit-alt"></i>Edite
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item  btn-link delete-modal" href="#"
                                                data-bs-toggle="modal" data-value="" data-bs-target="#deleteModal"> <i
                                                    class="dripicons-trash"></i> Delete
                                             </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>

                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true" data-bs-scroll="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title text-light" id="myModalLabel">Product Show</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body m-auto">
                                        <div class="row form-group">
                                            <div class="col-lg-6 my-2">
                                                <label for="product_name">Product Name</label>
                                                <input disabled class="form-control" type="text" name="product_name"
                                                    value="{{ $data->product_name }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="category_name">Category name</label>
                                                <input disabled class="form-control" type="text" name="pro_cate_id"
                                                    value="{{ $data->category->pro_cate_name }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="Brand name">Brand Name</label>
                                                <input disabled class="form-control" type="text" name="brand_id"
                                                    value="{{ $data->brand->brand_name }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_price">Product price</label>
                                                <input disabled class="form-control" type="text" name="product_price"
                                                    value="{{ $data->product_price }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_discount_price">Product discount</label>
                                                <input disabled class="form-control" type="text"
                                                    name="product_discount_price"
                                                    value="{{ $data->product_discount_price }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_order">Order By</label>
                                                <input disabled class="form-control" type="text" name="product_order"
                                                    value="{{ $data->product_order }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_quantity">Product Quantity</label>
                                                <input disabled class="form-control" type="text" name="product_quantity"
                                                    value="{{ $data->product_quantity }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_unit">Product Unit</label>
                                                <input disabled class="form-control" type="text" name="product_unit"
                                                    value="{{ $data->product_unit }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_creator">Product Creator</label>
                                                <input disabled class="form-control" type="text" name="product_creator"
                                                    value="{{ $data->creator->name }}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_feature">Product feature</label>
                                                <input disabled class="form-control" type="text" name="product_feature"
                                                    value="{{ $data->product_feature == '1' ? 'on' : 'off'}}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="product_status">Product status</label>
                                                <input disabled class="form-control" type="text" name="product_status"
                                                    value="{{ $data->product_feature == '1' ? 'active' : 'deactive'}}">
                                            </div>
                                            <div class="col-lg-6 my-2">
                                                <label for="created_time">Created Time</label>
                                                <input disabled class="form-control" type="text" name="created time"
                                                    value="{{ $data->created_at->diffForHumans() }}">
                                            </div>
                                            <div class="col-md-12 my-2 d-flex">
                                                <img style="width: 100px" class="m-auto"
                                                    src="{{ asset('uploads/product/'.$data->product_image) }}"
                                                    alt="Product Image">
                                            </div>
                                            @php
                                            $images = explode(',',$data->product_gallery)
                                            @endphp
                                            @if ($data['product_gallery'])
                                            @foreach ($images as $val )
                                            <div class="col-md-3 my-2 d-flex">
                                                <img style="width: 200px" class="m-auto"
                                                    src="{{ asset('uploads/product/gallery/' .$val) }}"
                                                    alt="product Image">
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                        {{--  Modal  --}}
                        <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Are you sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-hidden="true"></button>
                                    </div> <!-- end modal header -->
                                    <div class="modal-body">
                                        Do you really want to delete these records? This process cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <a type="submit" href="#" class="btn btn-danger" name="delete_data">Yes,
                                            delete it
                                        </a>
                                        <a type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</a>
                                    </div> <!-- end modal footer -->
                                </div> <!-- end modal content-->
                            </div> <!-- end modal dialog-->
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection


@section('customcss')
<!-- DataTables -->
<link href="{{asset('contents/dashboard')}}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
<link href="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{asset('contents/dashboard')}}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />

<!-- preloader css -->
<link rel="stylesheet" href="{{asset('contents/dashboard')}}/assets/css/preloader.min.css" type="text/css" />
@endsection

@section("customjs")
<!-- Required datatable js -->
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
</script>
<script src="{{asset('contents/dashboard')}}/assets/libs/jszip/jszip.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js">
</script>
<script src="{{asset('contents/dashboard')}}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
</script>

<!-- Datatable init js -->
<script src="{{asset('contents/dashboard')}}/assets/js/pages/datatables.init.js"></script>
@endsection
