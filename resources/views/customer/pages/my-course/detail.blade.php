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
                    <a href="{{ url('/back-customer/course/list-course') }}" class='btn btn-primary'>Back</a>
                    <div class=" text-center mb-15">
                        <h3 class="fs-4hx text-dark mb-20">{{ $getCourse->course_name }}</h3>
                        <a class="d-block bgi-no-repeat bgi-size-cover bgi-position-center card-rounded position-relative min-h-600px mb-10" style="background-image:url('{{asset('image/upload/course/thumbnail')}}/{{$getCourse->thumbnail_image}}')" data-fslightbox="lightbox-video-tutorials" href="{{$getCourse->thumbnail_video}}">
                            <img src="{{asset('vendor/media/svg/misc/video-play.svg')}}" class="position-absolute top-50 start-50 translate-middle h-25" alt="" />
                        </a>
                        {{-- <img width="100%" src="{{asset('image/upload/course/thumbnail')}}/{{$getCourse->thumbnail_image}}"/> --}}
                    </div>
                    <div class="row">
                        <div class="col text-start">
                            <h3 class="fs-2hx text-dark mb-5">Link Vidio :  {{ $getCourse->thumbnail_video }}</h3>
                            <h3 class="mt-20 fs-2hx text-dark mb-5">Harga : @currency($getCourse->harga)</h3>
                        </div>
                        <div class="col text-end">
                        </div>
                    </div>

                </div>
                {{-- <div class="fs-5 fw-bold text-gray-600">
                    <p>hallo</p>
                </div> --}}
                <div class="row mt-20">
                    <div class="col-md-12 pe-md-10 mb-10 mb-md-0">
                        <h3 class="mt-20 fs-2hx text-gray-800 mb-5">Deskripsi : </h3>
                        <p class="text-gray-800 text-justify fs-2hx fw-bolder mb-4"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium impedit in earum sit iure consequatur obcaecati fugiat recusandae placeat numquam eum ea officia ducimus dicta cum nobis molestiae, facere laboriosam suscipit. Necessitatibus temporibus ipsam tempora, vero deserunt accusamus tempore? Exercitationem sapiente, mollitia adipisci quis laudantium corporis quos earum doloribus officiis, voluptates excepturi dicta harum et ullam maiores quidem velit, optio quaerat labore dolore. Numquam sunt debitis quaerat harum pariatur amet fugit! Sequi expedita debitis quasi tempore voluptatum, totam esse veniam fugit sapiente temporibus facere tenetur natus sunt, placeat ut exercitationem maxime necessitatibus aspernatur praesentium rerum voluptates. Expedita ad est harum asperiores, facilis saepe velit minus reiciendis rem perspiciatis voluptatem distinctio recusandae iure eligendi dolorem consectetur porro odit ex, debitis aspernatur consequatur! Eveniet maiores, illum obcaecati minus atque dolorum facere similique amet, rem ducimus explicabo deleniti! Voluptate nostrum velit minima aut illo consequuntur fuga voluptatum doloremque nam ut. Quidem, sunt placeat? </p>

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