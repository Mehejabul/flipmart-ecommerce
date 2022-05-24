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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Contact Info
                </h5>
                <a href="{{ route('manage.social.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> SocialInfo
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
                <form method="POST" action="{{ route('manage.contact.upate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_phone1') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Phone 1<span
                                                class="text-danger">*</span>:</strong></label>
                                                <input type="hidden" class="form-control" name="cont_id" value="$data->cont_id">
                                    <input type="phone" class="form-control" name="cont_phone1"
                                        value="{{ $data->phone1 }}">
                                </div>
                                @if ($errors->has('cont_phone1'))
                                <span class="error">{{ $errors->first('cont_phone1') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_phone2	') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Phone 2<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="phone" class="form-control" name="cont_phone2"
                                        value="{{ old('cont_phone2') }}">
                                </div>
                                @if ($errors->has('cont_phone2'))
                                <span class="error">{{ $errors->first('cont_phone2') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_email1	') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Email 1<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="email" class="form-control" name="cont_email1"
                                        value="{{ old('cont_email1') }}">
                                </div>
                                @if ($errors->has('cont_email1'))
                                <span class="error">{{ $errors->first('cont_email1') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_email2	') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Email 2<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="email" class="form-control" name="cont_email2"
                                        value="{{ old('cont_email2') }}">
                                </div>
                                @if ($errors->has('cont_email2'))
                                <span class="error">{{ $errors->first('cont_email2') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_add1	') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Address 1<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="cont_add1"
                                        value="{{ old('cont_add1') }}">
                                </div>
                                @if ($errors->has('cont_add1'))
                                <span class="error">{{ $errors->first('cont_add1') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('cont_add2	') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Address 2<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="cont_add2"
                                        value="{{ old('cont_add2') }}">
                                </div>
                                @if ($errors->has('cont_add2'))
                                <span class="error">{{ $errors->first('cont_add2') }}</span>
                                @endif
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
@endsection
