@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Master Data - Benefit Course - </span>&nbsp;List Benefit (Keuntungan) Course</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card mb-10">
        <div class="card-header">
            <div class="card-title fs-3 fw-bolder">Tambah Data Benefit (Keuntungan) Course</div>
        </div>
        <form method="POST" class="form" action="{{url('/back-admin/benefit-course/store-benefit-course')}}">
            @csrf
            <div class="card-body p-9">
                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Course</label>
                    <div class="col-lg-8 fv-row">
                        <select name="course" aria-label="Select a Timezone" data-control="select2" class="form-select form-select-solid form-select-lg">
                            @foreach ($getCourse as $item)
                            <option value="{{$item->id}}">{{$item->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="fs-6 fw-bold mt-2 mb-3">Keuntungan</div>
                    </div>
                    <div class="col-lg-8 fv-row">
                        <input type="text" class="form-control form-control-solid @error('benefit') is-invalid @enderror" name="benefit" placeholder="Nama Keuntungan ..." value="{{old('benefit')}}" />
                        @error('benefit')
                            <span class="invalid-feedback" role="alert">
                                <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                  
            </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">List Benefit (Keuntungan) Course</h1>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Course</th>
                        <th class="text-center">Keuntungan</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($getcBenefit as $item)
                    <tr>
                        <td class="text-center">
                            <span class="fw-bolder">{{$loop->iteration}}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bolder ms-3" data-kt-ecommerce-product-filter="course_name">{{$item->course_name}}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bolder ms-3">{{$item->benefit}}</span>
                        </td>
                        <td class="text-center">
                            <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <form action="{{url('/back-admin/benefit-course/'.$item->id.'/destroy-benefit-course')}}" method="POST" class="inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn w-100 menu-link px-3 fs-7 text-center" onclick="return confirm('Hapus Data ?')">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('extraJS')
<script src="{{asset('vendor/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script src="{{asset('vendor/js/custom/apps/ecommerce/catalog/products.js')}}"></script>
<script src="{{asset('vendor/js/widgets.bundle.js')}}"></script>
<script src="{{asset('vendor/js/custom/widgets.js')}}"></script>
<script src="{{asset('vendor/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection