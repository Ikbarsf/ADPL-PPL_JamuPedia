@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .custom-img {
            object-fit: cover;
        }
    </style>
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Beranda - Menu Admin - Progress Karyawan - </span>&nbsp;Detail Data Progress Karyawan</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    @php
        $percentage = 0;
    @endphp
    @foreach ($getMyCourse as $item) 
        <div class="card mb-6">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-7 mb-4">
                        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                            <img src="{{asset('image/upload/course/thumbnail')}}/{{$item->thumbnail_image}}" alt="image" class="img-thumbnail custom-img" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap">
                            <div class="d-flex flex-column w-75">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$item->course_name}}</span>
                                </div>
                                <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                    <span class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ \Illuminate\Support\Str::limit($item->description, 250, $end='...') }}</span>
                                </div>
                            </div>
                            <div class="d-flex my-4">
                                <a href="{{url('/back-admin/progress-employee/report-quiz/'.$getUserID.'/'.$item->slug).'/persiapan-course'}}" class="btn btn-sm btn-primary me-2">Berikan Penilaian Quiz</a>
                            </div>
                            {{-- <div class="d-flex my-4">
                                <a href="{{url('/back-employee/my-course/'.$item->slug).'/persiapan-course'}}" class="btn btn-sm btn-primary me-2">Berikan Penilaian Quiz</a>
                            </div> --}}
                        </div>
                        <div class="d-flex flex-wrap">
                            <div class="d-flex align-items-center w-100 flex-column">
                                <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                    <span class="fw-bold fs-6 text-gray-400">Progress</span>
                                    {{-- <span class="fw-bolder fs-6">50%</span> --}}
                                    @foreach ($getTotalContent as $itemGTC)
                                    @if ($item->id == $itemGTC->course_id)
                                        @foreach ($getTotalContentDone as $itemGTCD)
                                        @if ($itemGTC->course_id == $itemGTCD->course_id)
                                        @php
                                            if ($getTotalContentDone != null) {
                                                $percentage = $itemGTCD->total_content/$itemGTC->total_content * 100;
                                            }
                                        @endphp
                                        @endif
                                        @endforeach
                                    @endif
                                    @endforeach
                                    <span class="fw-bolder fs-6">{{$percentage}}%</span>
                                </div>
                                <div class="h-5px mx-3 w-100 bg-light mb-3">
                                    <div class="bg-success rounded h-5px" role="progressbar" style="width: {{$percentage}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @php
                                    $percentage = 0;
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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