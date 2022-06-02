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
    <div class="col-lg-12">
        <div class="row">
            <div class="col-12">
                <div class="card border border-primary">
                    <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                        <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Update brand
                         </h5>
                         <a href="{{ route('brand.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                            <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Brands
                        </a>
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
                        <form method="POST" action="{{ route('brand.update',$data->brand_slug) }}" enctype="multipart/form-data">

                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-12 my-2">
                                    <div class="form-group" {{$errors->has('brand_name') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Name<span
                                                        class="text-danger">*</span>:</strong></label>
                                            <input type="text" class="form-control" name="brand_name"
                                                value="{{ $data->brand_name }}">
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
                                                value="{{ $data->brand_remarks}}">
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
                                    <div class="form-group" {{$errors->has('brand_image') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Brand
                                                    Image</strong></label>
                                            <input type="file" id="brand_image_input" class="form-control"
                                                name="brand_image" value="{{ old('brand_image') }}">
                                        </div>
                                        @if ($errors->has('brand_image '))
                                        <span class="error text-danger">{{ $errors->first('brand_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 my-2 text-center">
                                    @if($data->brand_image)
                                    <img id="brand_image_preview" src="{{ asset('uploads/brand/' .$data->brand_image) }}"
                                        alt="brand_image" class="img-fluid rounded" width="100" />
                                   @else
                                    <img id="brand_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="brand_image" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>

                    <div class="form-group my-2 text-center">
                        <button type="submit" class="btn btn-primary w-md">Update</button>
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
