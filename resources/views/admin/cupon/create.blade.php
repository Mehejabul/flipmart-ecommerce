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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i> Create Cupon </h5>
                <a href="{{ route('cupon.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All cupons
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
                <form method="POST" action="{{ route('cupon.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('cupon_title') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Cupon Title<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="cupon_title" value="{{ old('cupon_title') }}">
                                </div>
                                @if ($errors->has('cupon_title'))
                                <span class="error text-danger">{{ $errors->first('cupon_title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('cupon_code') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Cupon Code<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="cupon_code" value="{{ old('cupon_code') }}">
                                </div>
                                @if ($errors->has('cupon_code'))
                                <span class="error text-danger">{{ $errors->first('cupon_code') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('cupon_starting') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Cupon starting<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="date" class="form-control" name="cupon_starting" value="{{ old('cupon_starting') }}">
                                </div>
                                @if ($errors->has('cupon_starting'))
                                <span class="error text-danger">{{ $errors->first('cupon_starting') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('cupon_ending') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Cupon Ending<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="date" class="form-control" name="cupon_ending" value="{{ old('cupon_ending') }}">
                                </div>
                                @if ($errors->has('cupon_ending'))
                                <span class="error text-danger">{{ $errors->first('cupon_ending') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 my-2">
                            <div class="form-group" {{$errors->has('cupon_remarks') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Cupon Remarks:</strong></label>
                                    <textarea type="text" class="form-control" name="cupon_remarks" value="{{ old('cupon_remarks') }}"></textarea>
                                </div>
                                @if ($errors->has('cupon_remarks'))
                                <span class="error text-danger">{{ $errors->first('cupon_remarks') }}</span>
                                @endif
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
@endsection

