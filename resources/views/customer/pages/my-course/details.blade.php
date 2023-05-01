@extends('employee.layouts.app-course')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .custom-img {
            object-fit: cover;
        }
    </style>
@endsection

@section('sidebar')
<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{{url('/')}}">
            <img alt="Logo" src="{{asset('image/logo/bepro.png')}}" class="h-25px logo" />
            &nbsp;
            <span class="text-white fw-bold fs-3 logo">Be Pro</span>
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.5" d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z" fill="black" />
                    <path d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z" fill="black" />
                </svg>
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Persiapan Course</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(4) == 'persiapan-course') active @endif" href="{{url('/back-employee/my-course/'.$getCourse->slug.'/persiapan-course')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                    <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Tentang Materi</span>
                    </a>
                </div>
                
                @foreach ($getCourseModule as $itemCourseModule)
                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{$itemCourseModule->module_name}}</span>
                    </div>
                </div>
                @foreach ($getCourseModuleContent as $itemCourseModuleContent)
                    @if ($itemCourseModule->id == $itemCourseModuleContent->course_module_id)
                    <div class="menu-item">
                        <a class="menu-link @if (Request::Segment(5) == $itemCourseModuleContent->slug) active @endif" href="{{url('/back-employee/my-course/'.$getCourse->slug.'/'.$itemCourseModule->slug.'/'.$itemCourseModuleContent->slug)}}">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                        <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                    </svg>
                                </span>
                            </span>
                            <span class="menu-title">{{$itemCourseModuleContent->title_module_content}}</span>
                        </a>
                    </div>
                    @endif
                @endforeach
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(4) == $itemCourseModule->slug && Request::Segment(5) == 'quiz') active @endif" href="{{url('/back-employee/my-course/'.$getCourse->slug.'/'.$itemCourseModule->slug.'/quiz')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                    <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Quiz {{$itemCourseModule->module_name}}</span>
                    </a>
                </div>
                @endforeach

                <div class="menu-item">
                    <div class="menu-content pt-8 pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Rate & Feedback</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (Request::Segment(4) == 'rating-feedback') active @endif" href="{{url('/back-employee/my-course/'.$getCourse->slug.'/rating-feedback')}}">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z" fill="black" />
                                    <path opacity="0.3" d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z" fill="black" />
                                </svg>
                            </span>
                        </span>
                        <span class="menu-title">Rating & Feedback</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">{{$getCourse->course_name}} - {{$getCourseModuleDetails->module_name}} - </span>&nbsp;{{$getCourseModuleContentDetails->title_module_content}}</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <form action="{{url('/back-employee/my-course/'.$getCourse->slug.'/'.$getCourseModuleDetails->slug.'/'.$getCourseModuleContentDetails->slug.'/mark-done')}}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary">Tandai Sudah Dilihat</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <div class="card-body p-lg-17">
            <div>
                <div class="mb-10">
                    <div class="text-center mb-15">
                        <h3 class="fs-2hx text-dark mb-5">{{$getCourseModuleContentDetails->title_module_content}}</h3>
                        <h3 class="fs-1hx text-dark mb-5">{{$getCourse->course_name}} - {{$getCourseModuleDetails->module_name}}</h3><br>
                        @if ($getStatus == 'Sudah Selesai Dilihat')                        
                            <span class="fs-1hx text-dark mt-5 rounded py-3 px-3" style="background-color: lightgreen;">{{$getStatus}}</span>
                        @else
                            <span class="fs-1hx text-dark mt-5 rounded py-3 px-3" style="background-color: lightcoral;">{{$getStatus}}</span>
                        @endif
                    </div>
                    <div class="overlay">
                        <iframe class="w-100" height="600" src="{{$getCourseModuleContentDetails->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="fs-5 fw-bold text-gray-600">
                    <p>{{$getCourseModuleContentDetails->description}}</p>
                </div>
                <div class="row mt-12">
                    <div class="col-md-12 pe-md-10 mb-10 mb-md-0">
                        <h2 class="text-gray-800 fw-bolder mb-4">PDF & Tugas (Upload Jika Ada)</h2>
                        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <a href="{{asset('image/upload/course/pdf-course-module-content/'.$getCourseModuleContentDetails->pdf_file)}}" class="text-gray-800 text-hover-primary d-flex flex-column">
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="{{asset('image/pdf.svg')}}" alt="pdf-svg" />
                                            </div>
                                            <div class="fs-5 fw-bolder mb-2">{{$getCourseModuleContentDetails->pdf_file}}
                                                <p>(Klik Untuk Mengunduh)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="{{url('/back-employee/my-course/'.$getCourse->slug.'/'.$getCourseModuleDetails->slug.'/'.$getCourseModuleContentDetails->slug.'/assignment')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Assigment / Tugas</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="file" name="pdf_file" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('pdf_file') is-invalid @enderror" placeholder="PDF File" />
                                            @error('pdf_file')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>&nbsp; &nbsp; &nbsp;{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-lg-4 col-form-label fw-bold fs-6">Status Tugas</label>
                                        <div class="col-lg-8 fv-row">
                                            <input type="text" name="title_module_content" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{$getStatuses}}" disabled/>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Simpan / Perbarui</button>
                                    </div>
                                </form>
                            </div>
                            @if ($pdfDone != null)   
                            <div class="col-md-12">
                                <div class="card h-100">
                                    <h2 class="text-center">File Yang Sudah Dikumpulkan</h2>
                                    <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                                        <a href="{{asset('image/upload/course/user-upload/pdf-course-module-content/'.$pdfDone)}}" class="text-gray-800 text-hover-primary d-flex flex-column">
                                            <div class="symbol symbol-60px mb-5">
                                                <img src="{{asset('image/pdf.svg')}}" alt="pdf-svg" />
                                            </div>
                                            <div class="fs-5 fw-bolder mb-2">{{$pdfDone}}
                                                <p>(Klik Untuk Mengunduh)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
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