@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">User</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create Users </h5>
                <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Banner
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
                <form method="POST" action="{{ route('banner.update', $data->banner_slug) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_title') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Title<span
                                                class="text-danger">*</span>:</strong></label>
                                   <input type="hidden" class="form-control" name="banner_id"
                                                value="{{ $data->banner_id }}">
                                    <input type="text" class="form-control" name="banner_title"
                                        value="{{ $data->banner_title }}">
                                </div>
                                @if ($errors->has('banner_title'))
                                <span class="error">{{ $errors->first('banner_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_mid_title') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Middle Title<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="banner_mid_title"
                                        value="{{ $data->banner_mid_title }}">
                                </div>
                                @if ($errors->has('banner_mid_title'))
                                <span class="error">{{ $errors->first('banner_mid_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_subtitle') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Sub Title<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="banner_subtitle"
                                        value="{{ $data->banner_subtitle }}">
                                </div>
                                @if ($errors->has('banner_subtitle'))
                                <span class="error">{{ $errors->first('banner_subtitle') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_url') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Url<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="banner_url"
                                        value="{{ $data->banner_url }}">
                                </div>
                                @if ($errors->has('banner_url'))
                                <span class="error">{{ $errors->first('banner_url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_button') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Button<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="banner_button"
                                        value="{{ $data->banner_button }}">
                                </div>
                                @if ($errors->has('banner_button'))
                                <span class="error">{{ $errors->first('banner_button') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('banner_order') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Banner Order<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="integer" class="form-control" name="banner_order"
                                        value="{{ $data->banner_order }}">
                                </div>
                                @if ($errors->has('banner_order'))
                                <span class="error">{{ $errors->first('banner_order') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('banner_image') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Banner
                                                    Image</strong></label>
                                            <input type="file" id="banner_image_input" class="form-control"
                                                name="banner_image" value="{{ $data->banner_image }}">
                                        </div>
                                        @if ($errors->has('banner_image'))
                                        <span class="error text-danger">{{ $errors->first('banner_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                    @if($data->banner_image)
                                    <img id="banner_image_preview"
                                        src="{{ asset('uploads/banner/'.$data->banner_image) }}" width="100"
                                        alt="banner_image">
                                    @else
                                    <img id="banner_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="banner_image" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
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
    $('#banner_image_input').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#banner_image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

</script>
@endsection
