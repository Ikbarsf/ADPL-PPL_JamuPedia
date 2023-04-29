@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Master Data - Kategori Course - </span>&nbsp;List Kategori Course</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card mb-10">
        <div class="card-header">
            <div class="card-title fs-3 fw-bolder">Tambah Data Kategori Course</div>
        </div>
        <form method="POST" class="form" action="{{url('/back-admin/category-course/'.$getDetailcCategory->id.'/update-category-course')}}">
            @method('PUT')
            @csrf
            <div class="card-body p-9">
                <div class="row">
                    <div class="col-xl-3">
                        <div class="fs-6 fw-bold mt-2 mb-3">Nama Kategori</div>
                    </div>
                    <div class="col-xl-9 fv-row">
                        <input type="text" class="form-control form-control-solid @error('category_name') is-invalid @enderror" name="category_name" placeholder="Nama Kategori ..." value="{{old('category_name', $getDetailcCategory->category_name)}}" />
                        @error('category_name')
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