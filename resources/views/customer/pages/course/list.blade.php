@extends('customer.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Course - </span>&nbsp;List Course</h1>
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
                    <h1 class="text-dark">List Kelas Tersedia</h1>
                </div>
                <div class="separator separator-dashed mb-3"></div>
                <div class="row g-10">
                    @foreach ($getCourse as $item)   
                    <div class="col-md-4 py-5">
                        <div class="card-xl-stretch me-md-6">
                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-10" style="background-image:url('{{asset('image/upload/course/thumbnail')}}/{{$item->thumbnail_image}}')" data-fslightbox="lightbox-video-tutorials" href="{{$item->thumbnail_video}}">
                                <img src="{{asset('vendor/media/svg/misc/video-play.svg')}}" class="position-absolute top-50 start-50 translate-middle" alt="" />
                            </a>
                            <div class="m-0 h-250px">
                                <a href="{{url('#')}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->course_name}}</a>
                                <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ \Illuminate\Support\Str::limit($item->harga, 150, $end='...') }}</div>
                            </div>
                            <div class="m-0 h-250px">
                                <a href="{{url($item->thumbnail_video)}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->thumbnail_video}}</a>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2 w-100">Selengkapnya</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100">Enrolled</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($getCoursed as $item)   
                    <div class="col-md-4 py-5">
                        <div class="card-xl-stretch me-md-6">
                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-10" style="background-image:url('{{asset('image/upload/course/thumbnail')}}/{{$item->thumbnail_image}}')" data-fslightbox="lightbox-video-tutorials" href="{{$item->thumbnail_video}}">
                                <img src="{{asset('vendor/media/svg/misc/video-play.svg')}}" class="position-absolute top-50 start-50 translate-middle" alt="" />
                            </a>
                            <div class="m-0 h-250px">
                                <a href="{{url('#')}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->course_name}}</a>
                                <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ \Illuminate\Support\Str::limit($item->harga, 150, $end='...') }}</div>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2 w-100">Selengkapnya</button>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{url('/back-customer/enroll/enroll-course')}}/{{$item->id}}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100">Enroll</button>
                                    </form>
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