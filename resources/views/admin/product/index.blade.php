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
                <a href="{{ route('product.create') }}"
                    class="btn btn-sm btn-primary waves-effect waves-light">
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
                            <th>Feature</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($products as $data )
                        <tr>
                            <td>
                                {{--  @if($data->pro_cate_icon)
                                <img id="category_icon_preview" src="{{ asset('uploads/category/icon/'.$data->pro_cate_icon) }}"
                                alt="icon_image" width="50px;">
                                @else
                                <img id="category_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                alt="icon_image" class="img-fluid rounded" width="100" />
                                @endif
                            </td>
                            <td>
                                @if($data->pro_cate_image)
                                <img id="category_image_preview" src="{{ asset('uploads/category/image/'.$data->pro_cate_image) }}"
                                alt="category_image" width="100px;">
                                @else
                                <img id="category_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                alt="category_image" class="img-fluid rounded" width="100" />
                                @endif  --}}
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Manage <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bx bx-show-alt"></i>view</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="bx bx-edit-alt"></i>Edite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item  btn-link delete-modal" href="#"
                                                data-bs-toggle="modal" data-value="" data-bs-target="#deleteModal"> <i
                                                    class="dripicons-trash"></i> Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
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
