@extends('customer.layouts.app-course')

@section('extraCSS')
    <link href="{{asset('vendor/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .custom-img {
            object-fit: cover;
        }
    </style>
@endsection


@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card">
        <div class="card-body p-lg-17">
            <div>
                <div class="mb-10">
                    <a href="{{ url('/back-customer/product') }}" class='btn btn-primary'>Back</a>
                    <div class="text-center mb-15">
                        <h3 class="fs-4hx text-dark mb-5">{{ $getDetailProduct->product_name }}</h3>
                        <img width="100%" src="{{asset('image/upload/course/thumbnail')}}/{{$getDetailProduct->thumbnail_image}}"/>
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <h3 class="fs-2hx text-dark mb-5">Stok Tersedia : {{ $getDetailProduct->quantity }}</h3>
                            <h3 class="fs-2hx text-dark mb-5">Kadaluarsa    : {{ $getDetailProduct->expired_date }}</h3>
                        </div>
                        <div class="col text-end">
                            <h3 class="fs-2hx text-dark mb-5">Harga : @currency($getDetailProduct->harga)</h3>
                        </div>
                    </div>

                </div>
                {{-- <div class="fs-5 fw-bold text-gray-600">
                    <p>hallo</p>
                </div> --}}
                <div class="row mt-20">
                    <div class="col-md-12 pe-md-10 mb-10 mb-md-0">
                        <p class="text-gray-800 fs-2hx fw-bolder mb-4"> {{ $getDetailProduct->description }}</p>

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