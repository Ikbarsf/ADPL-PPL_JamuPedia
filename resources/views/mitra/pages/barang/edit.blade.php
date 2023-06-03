@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - E-Commerce - Produk - </span>&nbsp;Edit Data Produk</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-mitra/E-Commers/list-product')}}" class="btn btn-sm btn-primary">Lihat Data</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Edit Data Produk</h3>
                </div>
            </div>
            <div id="kt_account_settings_profile_details">
                <form id="kt_account_profile_details_form" class="form" method="POST" action="{{url('/back-mitra/E-Commers/'.$getProductDetail->id.'/update-product')}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Produk</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="product_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('product_name') is-invalid @enderror" placeholder="Nama Course" value="{{old('product_name', $getProductDetail->product_name)}}" />
                                @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Harga Produk</label>
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="harga" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('harga') is-invalid @enderror" placeholder="Harga" value="{{old('harga', $getProductDetail->harga)}}" />
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Stok Produk</label>
                            <div class="col-lg-8 fv-row">
                                <input type="number" name="quantity" min="0" class="harga form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('quantity') is-invalid @enderror" placeholder="Stok Produk" value="{{old('quantity', $getProductDetail->quantity)}}"/>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Expired Date</label>
                            <div class="col-lg-8 fv-row">
                                <input type="date" name="expired_date" min="0" class="harga form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('expired_date') is-invalid @enderror" placeholder="Stok Produk" value="{{old('expired_date', $getProductDetail->expired_date)}}"/>
                                @error('expired_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Kategori</label>
                            <div class="col-lg-8 fv-row">
                                <select class="form-select form-control form-control-lg form-control-solid mb-3 mb-lg-0" id="product_category_id" name="product_category_id" aria-label="Default select example" value="{{old('category_name', $getProductDetail->category_name)}}>
                                    <option selected">Pilih Kategoru</option>
                                    @foreach ($getProductCategories as $item)
                                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Deskripsi</label>
                            <div class="col-lg-8 fv-row">
                                <textarea name="description" class="harga form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('description') is-invalid @enderror" placeholder="Deskrispsi">{{old('description', $getProductDetail->description)}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Thumbnail Gambar</label>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="avatar" value="{{old('thumbnail_image', $getProductDetail->thumbnail_image)}}" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                    </label>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Batal</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan</button>
                    </div>
                </form>
            </div>
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