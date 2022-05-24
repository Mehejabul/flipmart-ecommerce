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
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All User
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
                <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('name') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Full Name<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                <span class="error">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('email') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Email<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                </div>
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('phone') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">phone<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                </div>
                                @if ($errors->has('phone'))
                                <span class="error">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" {{$errors->has('role') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Role<span
                                                class="text-danger">*</span>:</strong></label>
                                                <select class="form-control" name="role" value="{{ old('role') }}">
                                                    <option selected disabled>Select Role</option>
                                                    <option value="1">Admin</option>
                                                    <option value="2">owner</option>
                                                    <option value="1">customer</option>
                                                    @if ($errors->has('role'))
                                                    <span class="error">{{ $errors->first('role') }}</span>
                                                    @endif
                                                </select>
                                          </div>
                                     </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group" {{$errors->has('password') ? ' has-error':''}}>
                                    <div class="mb-3">
                                        <label class="form-label"><strong class="text-primary">Password<span
                                                    class="text-danger">*</span>:</strong></label>
                                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" {{$errors->has('password') ? ' has-error':''}}>
                                    <div class="mb-3">
                                        <label class="form-label"><strong class="text-primary">Password<span
                                                    class="text-danger">*</span>:</strong></label>
                                        <input type="password" class="form-control" name="password_confirmation" value="">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                              <div class="col-lg-12">
                                <div class="form-group" {{$errors->has('address') ? ' has-error':''}}>
                                    <div class="mb-3">
                                        <label class="form-label"><strong class="text-primary">Address<span
                                                    class="text-danger">*</span>:</strong></label>
                                        <textarea type="text" class="form-control" name="address" value="{{ old('address') }}"></textarea>
                                    </div>
                                    @if ($errors->has('address'))
                                    <span class="error">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                </form>
            </div>
        </div>
        <!-- end cardaa -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection
