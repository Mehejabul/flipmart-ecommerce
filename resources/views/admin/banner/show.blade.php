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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>View Banners </h5>
                <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Banner
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
                                    <th>Banner Title :</th>
                                    <td>{{ $data->banner_title }}</td>
                                </tr>
                                <tr>
                                    <th>Banner Mid Title :</th>
                                    <td>{{ $data->banner_mid_title }}</td>
                                </tr>
                                <tr>
                                    <th>Banner Subtitle :</th>
                                    <td>{{ $data->banner_subtitle }}</td>
                                </tr>
                                <tr>
                                    <th>Banner Button :</th>
                                    <td>{{ $data->banner_button }}</td>
                                </tr>
                                <tr>
                                    <th>Banner url :</th>
                                    <td>{{ $data->banner_url }}</td>
                                </tr>
                                <tr>
                                    <th>Banner Order :</th>
                                    <td>{{ $data->banner_order }}</td>
                                </tr>
                                <tr>
                                    <th>Banner Publish :</th>
                                    <td>
                                        @if($data->banner_publish==1)
                                        <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                        <div class="badge badge-soft-danger font-size-12">Deactive</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Banner Image :</th>
                                    <td>
                                        @if($data->banner_image)
                                        <img src="{{ asset('uploads/banner/' .$data->banner_image) }}"
                                            alt="banner image" width="50px">
                                        @else
                                        <img src="{{ asset('uploads/no-entry.png') }}" width="50">
                                        @endif
                                    </td>

                                </tr>
                                <tr>
                                    <th>Banner Creator :</th>
                                    <td>{{ $data->banner_creator }}</td>
                                </tr>
                                <tr>
                                    <th>Status :</th>
                                    <td>
                                        @if ($data->banner_status==1)
                                        <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                        <div class="badge badge-soft-danger font-size-12">Disabled</div>
                                        @endif
                                    </td>
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
