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
                    <h3 class="text-dark">List Kelas Tersedia</h3>
                    {{-- <a href="#" class="fs-6 fw-bold link-primary">View All Videos</a> --}}
                </div>
                <div class="separator separator-dashed mb-3"></div>
                <div class="row g-10">
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
                                                    <a href="{{url('/back-course/my-course/'.$item->slug).'/persiapan-course'}}" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{$item->course_name}}</a>
                                                </div>
                                                {{-- <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                                    <a href="{{url('/back-employee/my-course/'.$item->slug).'/persiapan-course'}}" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">{{ \Illuminate\Support\Str::limit($item->description, 250, $end='...') }}</a>
                                                </div> --}}
                                            </div>
                                            <div class="d-flex my-4">
                                                <a href="{{url('/back-customer/my-course/'.$item->slug).'/persiapan-course'}}" class="btn btn-sm btn-primary me-2">Lihat Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- @foreach ($getCourse as $item)   
                    <div class="col-md-4 py-5">
                        <div class="card-xl-stretch me-md-6">
                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-10" style="background-image:url('{{asset('image/upload/course/thumbnail')}}/{{$item->thumbnail_image}}')" data-fslightbox="lightbox-video-tutorials" href="{{$item->thumbnail_video}}">
                                <img src="{{asset('vendor/media/svg/misc/video-play.svg')}}" class="position-absolute top-50 start-50 translate-middle" alt="" />
                            </a>
                            <div class="m-0 h-250px">
                                <a href="{{url('#')}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->course_name}}</a>
                                <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ \Illuminate\Support\Str::limit($item->description, 150, $end='...') }}</div>
                                <div class="fs-6 fw-bolder">
                                    <span class="text-gray-700 text-hover-primary">Keuntungan : </span>
                                    @foreach ($getcBenefit as $itemBenefit)
                                        @if ($itemBenefit->course_id == $item->id)  
                                        <div class="d-flex align-items-center mt-2">
                                            <span class="svg-icon svg-icon-1 svg-icon-success" style="margin-right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                                                </svg>
                                            </span>
                                            <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{$itemBenefit->benefit}}</span>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
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
                    @endforeach --}}
                    {{-- @foreach ($getCoursed as $item)   
                    <div class="col-md-4 py-5">
                        <div class="card-xl-stretch me-md-6">
                            <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-175px mb-10" style="background-image:url('{{asset('image/upload/course/thumbnail')}}/{{$item->thumbnail_image}}')" data-fslightbox="lightbox-video-tutorials" href="{{$item->thumbnail_video}}">
                                <img src="{{asset('vendor/media/svg/misc/video-play.svg')}}" class="position-absolute top-50 start-50 translate-middle" alt="" />
                            </a>
                            <div class="m-0 h-250px">
                                <a href="{{url('#')}}" class="fs-4 text-dark fw-bolder text-hover-primary text-dark lh-base">{{$item->course_name}}</a>
                                <div class="fw-bold fs-5 text-gray-600 text-dark my-4">{{ \Illuminate\Support\Str::limit($item->description, 150, $end='...') }}</div>
                                <div class="fs-6 fw-bolder">
                                    <span class="text-gray-700 text-hover-primary">Keuntungan : </span>
                                    @foreach ($getcBenefit as $itemBenefit)
                                        @if ($itemBenefit->course_id == $item->id)  
                                        <div class="d-flex align-items-center mt-2">
                                            <span class="svg-icon svg-icon-1 svg-icon-success" style="margin-right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
                                                    <path d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z" fill="black" />
                                                </svg>
                                            </span>
                                            <span class="fw-bold fs-6 text-gray-800 flex-grow-1 pe-3">{{$itemBenefit->benefit}}</span>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2 w-100">Selengkapnya</button>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{url('/back-employee/enroll/enroll-course')}}/{{$item->id}}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary w-100">Enroll</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="card card-flush">
        <div class="card-header align-items-center py-5 gap-2 gap-md-5">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search..." />
                </div>
            </div>
            <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                <div class="w-100 mw-150px">
                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Kategori" data-kt-ecommerce-product-filter="status" data-kt-table-widget-5="status">
                        <option></option>
                        <option value="all">All</option>
                        @foreach ($getcCategory as $item)
                            <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                            </div>
                        </th>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Kursus</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Thumbnail</th>
                        <th class="text-center">Video</th>
                        <th class="text-center">Nama Kategori</th>
                        <th class="text-center">Created at</th>
                        <th class="text-center">Updated at</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($getCourse as $item)
                    <tr>
                        <td>
                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="1" />
                            </div>
                        </td>
                        <td class="text-center">
                            <span class="fw-bolder">{{$loop->iteration}}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bolder ms-3" data-kt-ecommerce-product-filter="category_name">{{$item->course_name}}</span>
                        </td>
                        <td class="text-center">
                            <span class="fw-bolder">{{ \Illuminate\Support\Str::limit($item->description, 25, $end='...') }}</span>
                        </td>
                        <td class="text-center min-w-100px">{{$item->thumbnail_image}}</td>
                        <td class="text-center min-w-100px">{{$item->thumbnail_video}}</td>
                        <td class="text-center" data-order="{{$item->category_name}}">{{$item->category_name}}</td>
                        <td class="text-center min-w-100px">{{$item->created_at}}</td>
                        <td class="text-center min-w-100px">{{$item->updated_at}}</td>
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
                                    <form action="{{url('/back-employee/course/'.$item->id.'/edit-course')}}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn w-100 menu-link px-3 fs-7 text-center">Edit</button>
                                    </form>
                                </div>
                                <div class="menu-item px-3">
                                    <form action="{{url('/back-employee/course/'.$item->id.'/destroy-course')}}" method="POST" class="inline">
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
    </div> --}}
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