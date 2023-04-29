@extends('admin.layouts.app')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Course - Course Module Quiz - </span>&nbsp;List Course Modul Quiz</h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <a href="{{url('/back-admin/course-module-quiz/add-course-module-quiz')}}" class="btn btn-sm btn-primary">Tambah Data</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card card-flush">
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
                        <th class="text-center">Kursus</th>
                        <th class="text-center">Modul</th>
                        <th class="text-center">Pertanyaan</th>
                        <th class="text-center">Pembahasan</th>
                        <th class="text-center">Nilai</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody class="fw-bold text-gray-600">
                    @foreach ($getCourseModuleContent as $item)
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
                            <span class="fw-bolder">{{$item->module_name}}</span>
                        </td>
                        <td class="text-center min-w-100px">
                            <span class="fw-bolder">{{$item->question}}</span>
                        </td>
                        <td class="text-center" data-order="{{$item->discussion_result}}">
                            <span class="fw-bolder">{{ \Illuminate\Support\Str::limit($item->discussion_result, 25, $end='...') }}</span>
                        </td>
                        <td class="text-center min-w-100px">
                            <span class="fw-bolder">{{$item->score}}</span>
                        </td>
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
                                    <form action="{{url('/back-admin/course-module-quiz/'.$item->id.'/edit-course-module-quiz')}}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="btn w-100 menu-link px-3 fs-7 text-center">Edit</button>
                                    </form>
                                </div>
                                <div class="menu-item px-3">
                                    <form action="{{url('/back-admin/course-module-quiz/'.$item->id.'/destroy-course-module-quiz')}}" method="POST" class="inline">
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