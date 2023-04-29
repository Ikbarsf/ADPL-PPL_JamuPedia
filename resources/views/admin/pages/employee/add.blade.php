@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - Master Data - Pengguna (User) - </span>&nbsp;Tambah Data Pegawai / Karyawan</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-admin/user/list-employee')}}" class="btn btn-sm btn-primary">Lihat Data</a>
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
                    <h3 class="fw-bolder m-0">Tambah Data Pegawai / Karyawan</h3>
                </div>
            </div>
            <div id="kt_account_settings_profile_details" class="collapse show">
                <form id="kt_account_profile_details_form" class="form" method="POST" action="{{url('/back-admin/user/store-employee')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url(assets/media/avatars/300-1.jpg)"></div>
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
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
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="first_name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('first_name') is-invalid @enderror" placeholder="Nama Depan" value="{{old('first_name')}}" />
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 fv-row">
                                        <input type="text" name="last_name" class="form-control form-control-lg form-control-solid @error('last_name') is-invalid @enderror" placeholder="Nama Belakang" value="{{old('last_name')}}"/>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Email</label>
                            <div class="col-lg-8 fv-row">
                                <input type="email" name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" placeholder="email@mail.com" value="{{old('email')}}"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Password</label>
                            <div class="col-lg-8 fv-row">
                                <input type="password" name="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" placeholder="Password"/>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nomor Telepon</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="phone_number" class="form-control form-control-lg form-control-solid @error('phone_number') is-invalid @enderror" placeholder="082345678910" value="{{old('phone_number')}}"/>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Tentang Karyawan</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" name="about_me" class="form-control form-control-lg form-control-solid @error('about_me') is-invalid @enderror" placeholder="Lorem ipsum dolor" value="{{old('about_me')}}"/>
                                @error('about_me')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Jabatan</label>
                            <div class="col-lg-8 fv-row">
                                <select name="position" aria-label="Select a Timezone" data-control="select2" class="form-select form-select-solid form-select-lg">
                                    @foreach ($getPosition as $item)
                                    <option value="{{$item->id}}">{{$item->position_name}} - {{$item->division_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-bold fs-6">
                                <span class="required">Status Karyawan</span>
                            </label>
                            <div class="col-lg-8 fv-row">
                                <select name="status_user" aria-label="Select a Country" data-control="select2" class="form-select form-select-solid form-select-lg fw-bold">\
                                    <option value="active">Aktif</option>
                                    <option value="deactive">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save Changes</button>
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