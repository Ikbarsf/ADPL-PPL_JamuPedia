@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - Menu Admin - Progress Karyawan - </span>&nbsp;List Data Progress Karyawan</h1>
        </div>
        {{-- <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-admin/division-position/add-position')}}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div> --}}
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">List Karyawan</h1>
        </div>
        <div class="row g-6 mb-6 g-xl-9 mb-xl-9 px-5">
            @foreach ($getEmployee as $item)
            <div class="col-md-6 col-xxl-4">
                <div class="card border">
                    <div class="card-body d-flex flex-center flex-column p-9">
                        <div class="symbol symbol-65px symbol-circle mb-5">
                            <span class="symbol-label fs-2x fw-bold text-warning bg-light-warning text-uppercase">{{ Str::limit($item->name, 1, $end='') }}</span>
                        </div>
                        <span class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-0">{{$item->name}}</span>
                        <div class="fw-bold text-gray-400 mb-6">{{$item->email}}</div>
                        <form action="{{url('/back-admin/progress-employee/detail-progress-employee/'.$item->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-light-primary">Lihat Progress</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
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