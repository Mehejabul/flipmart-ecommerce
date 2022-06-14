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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>Create Category
                </h5>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Product
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
                <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_name') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product Name<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="product_name"
                                        value="{{ old('product_name') }}">
                                </div>
                                @if ($errors->has('product_name'))
                                <span class="error text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>
                        @php
                        $categories = App\Models\ProductCategory::where('pro_cate_status',1)->get();
                        @endphp
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('pro_cate_id') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product
                                            Category:</strong></label>
                                    <select type="number" class="form-control" name="pro_cate_id"
                                        id="pro_cate_id" value="{{ old('pro_cate_id') }}">
                                        <option label="Select Product Category"></option>
                                        @foreach ($categories as $data)
                                        <option value="{{ $data->pro_cate_id }}">{{ $data->pro_cate_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('pro_cate_parent'))
                                <span class="error text-danger">{{ $errors->first('pro_cate_parent') }}</span>
                                @endif
                            </div>
                        </div>

                        @php
                            $brands = App\Models\Brand::where('brand_status',1)->get();
                        @endphp
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('brand_id') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product brand:</strong></label>
                                    <select type="number" class="form-control" name="brand_id"
                                        value="{{ old('brand_id') }}">
                                        <option>Select Product Brand</option>
                                        @foreach ($brands as $brand )
                                          <option value="{{ $brand->brand_id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($errors->has('brand_id'))
                                <span class="error text-danger">{{ $errors->first('brand_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_price') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product Price:<span
                                                class="text-danger">*</span>:</strong></label>
                                    <input type="text" class="form-control" name="product_price"
                                        value="{{ old('product_price') }}">
                                </div>
                                @if ($errors->has('product_price'))
                                <span class="error text-danger">{{ $errors->first('product_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_discount_price') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product discount Price:</strong></label>
                                    <input type="text" class="form-control" name="product_discount_price"
                                        value="{{ old('product_discount_price') }}">
                                </div>
                                @if ($errors->has('product_discount_price'))
                                <span class="error text-danger">{{ $errors->first('product_discount_price') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_unit') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product Unit:</strong></label>
                                    <input type="text" class="form-control" name="product_unit"
                                        value="{{ old('product_unit') }}">
                                </div>
                                @if ($errors->has('product_unit'))
                                <span class="error text-danger">{{ $errors->first('product_unit') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_quantity') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product Quantity:</strong></label>
                                    <input type="text" class="form-control" name="product_quantity"
                                        value="{{ old('product_quantity') }}">
                                </div>
                                @if ($errors->has('product_quantity'))
                                <span class="error text-danger">{{ $errors->first('product_quantity') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 my-2">
                            <div class="form-group" {{$errors->has('product_order') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product Order:</strong></label>
                                    <input type="number" class="form-control" name="product_order"
                                        value="{{ old('product_order') }}">
                                </div>
                                @if ($errors->has('product_order'))
                                <span class="error text-danger">{{ $errors->first('product_order') }}</span>
                                @endif
                            </div>
                        </div>
                            <div class="col-lg-6 my-4">
                                <div class="form-check form-switch" dir="ltr">
                                    <input name="product_feature" type="checkbox" class="form-check-input">
                                    <label class="form-check-label">Product Feature:</label>
                                </div>
                            </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                    <div class="form-group" {{$errors->has('product_image') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Product Image</strong></label>
                                            <input type="file" id="product_image_input" class="form-control"
                                                name="product_image" value="{{ old('product_image') }}">
                                        </div>
                                        @if ($errors->has('product_image'))
                                        <span class="error text-danger">{{ $errors->first('product_image') }}</span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6  my-2">
                            <div class="row">
                                    <div class="form-group" {{$errors->has('product_gallery') ? ' has-error':''}}>
                                        <div class="mb-3">
                                            <label class="form-label"><strong class="text-primary">Product Gallery</strong></label>
                                            <input multiple type="file"  class="form-control"
                                                name="product_gallery[]" value="{{ old('product_gallery') }}">
                                        </div>
                                        @if ($errors->has('product_gallery'))
                                        <span class="error text-danger">{{ $errors->first('product_gallery') }}</span>
                                        @endif
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-auto text-center">
                            <img id="product_image_preview" src="{{ asset('uploads/no-entry.png') }}"
                                alt="category_icon" class="img-fluid rounded" width="100" />
                        </div>
                        <div class="col-lg-12 my-2">
                            <div class="form-group" {{$errors->has('product_details') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product details:</strong></label>
                                    <textarea type="text" class="form-control" name="product_details" id="ckeditor-classic-one"
                                        value="{{ old('product_details') }}">
                                    </textarea>
                                </div>
                                @if ($errors->has('product_details'))
                                <span class="error text-danger">{{ $errors->first('product_details') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 my-2">
                            <div class="form-group" {{$errors->has('product_description') ? ' has-error':''}}>
                                <div class="mb-3">
                                    <label class="form-label"><strong class="text-primary">Product description:</strong></label>
                                    <textarea type="number" class="form-control" name="product_description" id="ckeditor-classic-two"
                                        value="{{ old('product_description') }}">
                                    </textarea>
                                </div>
                                @if ($errors->has('product_description'))
                                <span class="error text-danger">{{ $errors->first('product_description') }}</span>
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
<script type="text/javascript">
    // Category_icon
    $('#product_image_input').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#product_image_preview').attr('src', e.target.result);
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

@section('customjs')

<!-- ckeditor -->
<script src="{{ asset('contents/dashboard') }}/assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

<!-- init js -->
<script src="{{ asset('contents/dashboard') }}/assets/js/pages/form-editor.init.js"></script>
@endsection
