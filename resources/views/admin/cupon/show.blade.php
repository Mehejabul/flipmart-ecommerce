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
                <h5 class="my-0 text-primary align-middle"><i class="mdi mdi-bullseye-arrow me-3"></i>View Cupons</h5>
                <a href="{{ route('cupon.index') }}" class="btn btn-sm btn-primary waves-effect waves-light">
                    <i class="bx bx-list-plus font-size-20 align-middle me-2"></i> All Cupons
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
                                    <th>Cupon Title :</th>
                                    <td>{{ $data->cupon_title }}</td>
                                </tr>
                                <tr>
                                    <th>Cupon code :</th>
                                    <td>{{ $data->cupon_code }}</td>
                                </tr>
                                <tr>
                                    <th>Cupon Starting :</th>
                                    <td>{{ $data->cupon_starting }}</td>
                                </tr>
                                <tr>
                                    <th>Cupon Ending :</th>
                                    <td>{{ $data->cupon_ending }}</td>
                                </tr>
                                <tr>
                                    <th>Cupon Remarks :</th>
                                    <td>{{ $data->cupon_remarks }}</td>
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
                                    <th>Cupon Status :</th>
                                    <td>
                                        @if ($data->cupon_status==1)
                                        <div class="badge badge-soft-success font-size-12">Active</div>
                                        @else
                                        <div class="badge badge-soft-danger font-size-12">Disabled</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Created at :</th>
                                    <td></td>
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
