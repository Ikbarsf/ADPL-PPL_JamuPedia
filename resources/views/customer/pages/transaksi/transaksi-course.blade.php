@extends('customer.layouts.app')

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
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - Transaksi - </span>&nbsp;Transaksi Kelas</h1>
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
                @if ($getMyCourse->count()>0)
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
                                                <div class="d-flex align-items-center mb-2">
                                                    <a href="{{url('/back-course/my-course/'.$item->slug).'/persiapan-course'}}" class="text-gray-600 text-hover-primary fs-2 fw-bolder me-1">Rp.{{$item->harga}}</a>
                                                </div>
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
                        <form action="{{url('/back-customer/my-course/bayar')}}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="d-flex my-1">
                                <div class="align-items-center">
                                    <button type="submit" class="btn btn-sm btn-primary">Bayar Sekarang</button>
                                </div>
                                <div class="align-items-center pl-10">
                                    <button type="disable" class="btn btn-sm btn-primary">Total Biaya : {{  $getPrice}}</a>
                                </div>
                            </div>
                        </form>
                </div>
                @endif
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
<script>
    
</script>
@endsection