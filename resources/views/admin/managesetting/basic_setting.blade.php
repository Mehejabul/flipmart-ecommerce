@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Setting</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Basic Setting
                </h5>
                <a href="{{ route('manage.contact.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> contactInfo
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
                <form method="POST" action="{{ route('manage.basic.upate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('basic_company') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Basic Company<span
                                                class="text-danger">*</span>:</strong></label>
                                                <input type="hidden" class="form-control" name="Basic_id" value="$data->Basic_id">
                                    <input type="text" class="form-control" name="basic_company"
                                        value="{{ old('basic_company') }}">
                                </div>
                                @if ($errors->has('basic_company'))
                                <span class="error">{{ $errors->first('basic_company') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('basic_title') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Basic Title<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="basic_title"
                                        value="{{ old('basic_title') }}">
                                </div>
                                @if ($errors->has('basic_title'))
                                <span class="error">{{ $errors->first('basic_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('basic_logo') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Basic logo:</strong></label>
                                            <input type="file" class="form-control" name="basic_logo"
                                                value="{{ old('basic_logo') }}">
                                        </div>
                                        @if ($errors->has('basic_logo'))
                                        <span class="error">{{ $errors->first('basic_logo') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                    @if($data->basic_logo)
                                    <img id="main-preview-image" src="{{ asset('uploads/general/'.$data->basic_logo) }}" alt="image"
                                        class="img-fluid rounded" width="100">
                                    @else
                                    <img id="main-preview-image" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="basic_logo" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('basic_flogo') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Basic Footerlogo:</strong></label>
                                            <input type="file" class="form-control" name="basic_flogo"
                                                value="{{ old('basic_flogo') }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('basic_flogo'))
                                    <span class="error">{{ $errors->first('basic_flogo') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-4 m-auto">
                                    @if ($data->basic_flogo)
                                    <img id="main-preview-image" src="{{ asset('uploads/general/'.$data->basic_flogo) }}" alt="image"
                                        class="img-fluid rounded" width="100">
                                    @else
                                    <img id="main-preview-image" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="basic_flogo" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('basic_favicon') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Basic Footerlogo:</strong></label>
                                            <input type="file" class="form-control" name="basic_favicon"
                                                value="{{ old('basic_favicon') }}">
                                        </div>
                                        @if ($errors->has('basic_favicon'))
                                        <span class="error text-danger">{{ $errors->first('basic_favicon') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                    @if ($data->basic_favicon)
                                    <img id="main-preview-image" src="{{ asset('uploads/general/'.$data->basic_favicon) }}" alt="image"
                                        class="img-fluid rounded" width="100">
                                    @else
                                    <img id="main-preview-image" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="basic_favicon" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  border-primary mt-4">
                            <div class="form-group text-center mt-4">
                                <button type="submit" class="btn btn-primary w-md">Update</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
</div> <!-- end row -->
<script type="text/javascript">
    // Main Logo
    $('#mainlogo-fileinput').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#main-preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
    // Footer Logo
    $('#footerlogo-fileinput').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#footer-preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
    // Favicon
    $('#favicon-fileinput').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#favicon-preview-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

</script>
@endsection
