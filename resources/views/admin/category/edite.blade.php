@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Categories</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Edite Category
                </h5>
                <a href="{{ route('product.category.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Categories
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
                <form method="POST" action="{{ route('product.category.update', $data->pro_cate_slug) }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('pro_cate_name') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Category Name<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="pro_cate_name"
                                        value="{{ $data->pro_cate_name }}">
                                </div>
                                @if ($errors->has('pro_cate_name'))
                                <span class="error text-danger">{{ $errors->first('pro_cate_name') }}</span>
                                @endif
                            </div>
                        </div>
                        @php
                        $categories = App\Models\ProductCategory::where('pro_cate_status',1)->get();
                        @endphp
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('pro_cate_parent') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Parent
                                            Category:</strong></label>
                                    <select type="number" class="form-control" name="pro_cate_parent"
                                        id="pro_cate_parent" value="{{ $data->pro_cate_parent }}">
                                        <option label="Select Parent Category"></option>
                                        @foreach ($categories as $data)
                                        <option value="{{ $data->pro_cate_id }}">{{ $data->pro_cate_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @if ($errors->has('pro_cate_parent'))
                                <span class="error">{{ $errors->first('pro_cate_parent') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('pro_cate_order') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Category
                                            Order:</strong></label>
                                    <input type="number" class="form-control" name="pro_cate_order"
                                        value="{{ $data->pro_cate_order }}">
                                </div>
                                @if ($errors->has('pro_cate_order'))
                                <span class="error">{{ $errors->first('pro_cate_order') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group" {{$errors->has('pro_cate_icon') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Category
                                                    Icon</strong></label>
                                            <input type="file" id="category_icon_input" class="form-control"
                                                name="pro_cate_icon" value="{{ $data->pro_cate_icon }}">
                                        </div>
                                        @if ($errors->has('pro_cate_icon'))
                                        <span class="error text-danger">{{ $errors->first('pro_cate_icon') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                    @if($data->pro_cate_icon)
                                    <img id="category_icon_preview"  src="{{ asset('uploads/category/icon/'.$data->pro_cate_icon) }}"
                                    alt="icon_image" width="50px;">
                                    @else
                                    <img id="category_icon_preview" src="{{ asset('uploads/no-entry.png') }}"
                                    alt="icon_image" class="img-fluid rounded" width="100" />
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12  my-2">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="form-group" {{$errors->has('pro_cate_image') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Category
                                                    Image</strong></label>
                                            <input type="file" id="category_image_input" class="form-control"
                                                name="pro_cate_image" value="{{ $data->pro_cate_image }}">
                                        </div>
                                        @if ($errors->has('pro_cate_image'))
                                        <span class="error text-danger">{{ $errors->first('pro_cate_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 m-auto">
                                 @if($data->pro_cate_image)
                                <img id="category_image_preview" src="{{ asset('uploads/category/image/'.$data->pro_cate_image) }}"
                                alt="category_image" width="100px;">
                                @else
                                <img id="category_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                alt="category_image" class="img-fluid rounded" width="100" />
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
    // Category_icon
    $('#category_icon_input').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#category_icon_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

</script>

<script type="text/javascript">
    // Category_image
    $('#category_image_input').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#category_image_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });

</script>
@endsection
