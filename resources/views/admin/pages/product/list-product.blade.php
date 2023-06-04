@extends('admin.layouts.app')

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - E-Commerce - </span>&nbsp;Produk</h1>
        </div>
    </div>
</div>
@endsection

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row justify-content-center">
                @foreach ($getProducts as $item)
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card text-black">
                            <img src="{{ asset('image/upload/course/thumbnail') }}/{{ $item->thumbnail_image }}"
                                class="card-img-top h-80" alt="{{ $item->product_name }}" />
                            <div class="card-body">
                                <div class="text-center fw-bold mb-10">
                                    <h1 class="card-title text-2xl">{{ $item->product_name }}</h1>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span>Stok: {{ $item->quantity }}</span>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <span>Kadaluarsa: {{ $item->expired_date }}</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between total font-weight-normal mt-4">
                                    <span>Deskripsi: <br /> {{ $item->description }}</span>
                                </div>
                                <div class="d-flex justify-content-between total font-bold mt-4">
                                    <span>@currency($item->harga)</span>
                                </div>
                                <div class="">
                                    <form action="{{ url('back-customer/product/' . $item->id) }}" method="post"
                                        class="d-flex">
                                        @csrf
                                        {{-- <div class="d-flex text-center">
                                            <a href='{{ url('/back-customer/product/' . $item->id . '/detail-product') }}' class="btn btn-success mt-10">Detail</a>
                                            <div class="mt-10 ml-5">
                                                <input type="number" id="jumlah_pesanan" name="jumlah_pesanan"
                                                    value="1" min="1" required class="w-20 text-">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-10 ml-5">Beli</button>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
