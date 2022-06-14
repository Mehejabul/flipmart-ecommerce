@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Products</h4>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card border border-primary">
            <div class="card-header bg-transparent border-primary d-flex justify-content-between">
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>View Product</h5>
                <a href="{{ route('product.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Product
                </a>
            </div>
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="table-responsive">
                        <table class="table mb-0 text-center">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Product Name :</th>
                                    <td>{{ $data->product_name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Category :</th>
                                    <td>{{ $data->category->pro_cate_name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Brand :</th>
                                    <td>{{ $data->brand->brand_name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Price :</th>
                                    <td>{{ $data->product_price }}</td>
                                </tr>
                                <tr>
                                    <th>Product Discount Price :</th>
                                    <td>{{ $data->product_discount_price }}</td>
                                </tr>
                                <tr>
                                    <th>Product Unit :</th>
                                    <td>{{ $data->product_unit }}</td>
                                </tr>
                                <tr>
                                    <th>Product quantity :</th>
                                    <td>{{ $data->product_quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Product Order :</th>
                                    <td>{{ $data->product_order }}</td>
                                </tr>
                                <tr>
                                    <th>Product Feature :</th>
                                    <td>
                                        @if($data->product_feature == 1)
                                            ON
                                         @else
                                             OFF
                                         @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Image :</th>
                                    <td>
                                        @if($data->product_image)
                                        <img src="{{ asset('uploads/product/' .$data->product_image) }}"
                                            alt="banner image" width="50px">
                                        @else
                                        <img src="{{ asset('uploads/no-entry.png') }}" width="50">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Gallery :</th>
                                    <td>
                                        @php
                                            $images = explode(',',$data->product_gallery)
                                        @endphp
                                        @foreach ($images as $val )
                                        <img src="{{ asset('uploads/product/gallery/' .$val) }}" width="50">

                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Product Creator :</th>
                                    <td>{{ $data->creator->name }}</td>
                                </tr>
                                <tr>
                                    <th>Product Editor :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Product Status :</th>
                                    <td>
                                        @if ($data->product_status==1)
                                        <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                        <div class="badge badge-soft-danger font-size-12">Disabled</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created_at :</th>
                                    <td>{{ $data->created_at->diffForHumans() }}</td>
                                </tr>

                                <tr>
                                    <th>Updated_at :</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end cardaa -->
</div> <!-- end col -->
</div> <!-- end row -->

@endsection
