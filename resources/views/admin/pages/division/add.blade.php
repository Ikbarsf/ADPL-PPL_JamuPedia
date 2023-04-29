@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - Master Data - Divisi & Jabatan - </span>&nbsp;Tambah Data Divisi</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-admin/division-position/list-division')}}" class="btn btn-sm btn-primary">Lihat Data</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card">
            <div class="card-header">
                <div class="card-title fs-3 fw-bolder">Tambah Data Divisi</div>
            </div>
            <form method="POST" class="form" action="{{url('/back-admin/division-position/store-division')}}">
                @csrf
                <div class="card-body p-9">
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="fs-6 fw-bold mt-2 mb-3">Nama Divisi</div>
                        </div>
                        <div class="col-xl-9 fv-row">
                            <input type="text" class="form-control form-control-solid @error('division_name') is-invalid @enderror" name="division_name" placeholder="Nama Divisi ..." value="{{old('division_name')}}" />
                            @error('division_name')
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
    </div>
</div>
@endsection

@section('extraJS')
<script src="{{asset('vendor/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script src="{{asset('vendor/js/custom/apps/projects/settings/settings.js')}}"></script>
<script src="{{asset('vendor/js/widgets.bundle.js')}}"></script>
<script src="{{asset('vendor/js/custom/widgets.js')}}"></script>
<script src="{{asset('vendor/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/users-search.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/new-target.js')}}"></script>
@endsection