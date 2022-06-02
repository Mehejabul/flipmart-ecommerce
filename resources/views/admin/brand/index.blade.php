@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18"> All Brands</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-lg-8">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>All Brand Iteam
                </h5>
            </div>
            <div class="card-body">
                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td></td>
                            <td>
                                {{--  <img id="banner_image_preview" src="{{ asset('uploads/banner/' .$data->banner_image) }}"
                                alt="banner image" width="50px;"> --}}
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Manage <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                                        <li>
                                            <a class="dropdown-item" href="">
                                                <i class="bx bx-show-alt"></i>view</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="">
                                                <i class="bx bx-edit-alt"></i>Edite</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item  btn-link delete-modal" href=""
                                                data-bs-toggle="modal" data-value="" data-bs-target="#deleteModal> <i
                                                class=" dripicons-trash"></i> Delete</a>
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
                                        <a type="submit" href="" class="btn btn-danger" name="delete_data">Yes,
                                            delete it
                                        </a>
                                        <a type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</a>
                                    </div> <!-- end modal footer -->
                                </div> <!-- end modal content-->
                            </div> <!-- end modal dialog-->
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
    <div class="col-lg-4">
        <div class="row">
            <div class="col-12">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                        <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create New
                            Brand </h5>
                    </div>
                    <div class="card-body">
                        @if(Session::has('success'))
                        <script>
                            swal({
                                title: 'success!',
                                text: "{{ Session::get('success')}}",
                                icon = 'success',
                                timer: 5000
                            });

                        </script>
                        @endif

                        @if (Session::has('error'))
                        <script>
                            swal({
                                title: 'error!'
                                text: "{{ Session::get('error')}}",
                                icon = 'error',
                                timer: 5000
                            });

                        </script>
                        @endif
                        <form method="POST" action="{{ route('brand.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <div class="form-group" {{$errors->has('brand_name') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Name<span
                                                        class="text-danger">*</span>:</strong></label>
                                            <input type="text" class="form-control" name="brand_name"
                                                value="{{ old('brand_name') }}">
                                        </div>
                                        @if ($errors->has('brand_name'))
                                        <span class="error">{{ $errors->first('brand_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <div class="form-group" {{$errors->has('brand_remarks') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Brand Remarks<span
                                                        class="text-danger">*</span>:</strong></label>
                                            <input type="text" class="form-control" name="brand_remarks"
                                                value="{{ old('brand_remarks') }}">
                                        </div>
                                        @if ($errors->has('brand_remarks'))
                                        <span class="error">{{ $errors->first('brand_remarks') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-4">
                                    <div class="form-check form-switch" dir="ltr">
                                        <input name="brand_feature" type="checkbox" class="form-check-input">
                                        <label class="form-check-label">Feature Brand</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <div class="form-group" {{$errors->has('brand_image	') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Brand
                                                    Image</strong></label>
                                            <input type="file" id="brand_image_input" class="form-control"
                                                name="brand_image" value="{{ old('brand_image') }}">
                                        </div>
                                        @if ($errors->has('brand_image '))
                                        <span class="error text-danger">{{ $errors->first('brand_image	') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <img id="brand_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="brand_image" class="img-fluid rounded" width="100" />
                                </div>
                            </div>

                    <div class="form-group my-2 text-center">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- end cardaa -->
        </div> <!-- end col -->
    </div> <!-- end row -->
    <script type="text/javascript">
        // Banner Image
        $('#brand_image_input').change(function () {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#brand_image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    </script>
</div>
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
