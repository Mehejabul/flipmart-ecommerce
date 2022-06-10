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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i> Create Partner </h5>
                <a href="{{ route('partner.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Partner
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
                <form method="POST" action="{{ route('partner.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('partner_name') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Partner Name<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="partner_name" value="{{ old('partner_name') }}">
                                </div>
                                @if ($errors->has('partner_name'))
                                <span class="error text-danger">{{ $errors->first('partner_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('partner_url') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Url<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="partner_url" value="{{ old('partner_url') }}">
                                </div>
                                @if ($errors->has('partner_url'))
                                <span class="error text-danger">{{ $errors->first('partner_url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('partner_order') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Partner order:</strong></label>
                                    <input type="number" class="form-control" name="partner_order" value="{{ old('partner_order') }}">
                                </div>
                                @if ($errors->has('partner_order'))
                                <span class="error">{{ $errors->first('partner_order') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('partner_image') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Partner image<span class="text-danger">*</span>:</strong></label>
                                            <input type="file" id="partner_image_input" class="form-control"
                                                name="partner_image" value="{{ old('partner_image') }}">
                                        </div>
                                        @if ($errors->has('partner_image'))
                                        <span class="error text-danger">{{ $errors->first('partner_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                    <img id="partner_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                        alt="partner_image" class="img-fluid rounded" width="100" />
                                </div>
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
<script type="text/javascript">
    // Banner Image
    $('#partner_image_input').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#partner_image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

</script>
