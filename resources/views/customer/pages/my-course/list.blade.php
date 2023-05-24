@extends('customer.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Course - </span>&nbsp;List My Course</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <div class="card-body p-lg-20 pb-lg-0">
            <div class="mb-17">
                <div class="d-flex flex-stack mb-5">
                    <h3 class="text-dark">List Kelas Tersedia</h3>
                </div>
                <div class="separator separator-dashed mb-3"></div>
                <div class="row g-10">
                    @foreach ($getMyCourse as $item) 
                    <div class="card mb-6">
                        <div class="card-body pt-9 pb-0">
                            <div class="d-flex flex-wrap flex-sm-nowrap">
                                <div class="me-7 mb-4">
                                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                        <img src="{{asset('image/upload/course/thumbnail')}}/{{$item->course->thumbnail_image}}" alt="image" class="img-thumbnail custom-img" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                                        <div class="d-flex flex-column w-75">
                                            <div class="d-flex align-items-center mb-2">
                                                <a href="{{url('/back-course/my-course/'.$item->course->slug).'/persiapan-course'}}" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$item->course->course_name}}</a>
                                            </div>
                                        </div>
                                        <div class="d-flex my-20">
                                            <a href="{{url('/back-customer/my-course/'.$item->course->slug).'/persiapan-course'}}" class="btn btn-sm btn-primary me-2">Lihat Detail</a>
                                        </div>
                                        <div class="menu-item my-20">
                                            <form action="{{url('/back-customer/my-course/'.$item->id).'/destroy-course'}}" method="POST" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger w-100 px-3 fs-7" onclick="return confirm('Hapus Data ?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('extraJS')
<script src="{{asset('vendor/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
<script src="{{asset('vendor/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script src="{{asset('vendor/js/widgets.bundle.js')}}"></script>
<script src="{{asset('vendor/js/custom/widgets.js')}}"></script>
<script src="{{asset('vendor/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/create-app.js')}}"></script>
<script src="{{asset('vendor/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection