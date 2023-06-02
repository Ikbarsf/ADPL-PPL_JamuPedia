@extends('customer.layouts.app')

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
                                <div class="d-flex justify-content-between total font-weight-bold mt-4">
                                    <span>@currency($item->harga)</span>
                                </div>
                                <div class="">
                                    <form action="{{ url('back-customer/product/' . $item->id) }}" method="post"
                                        class="d-flex">
                                        @csrf
                                        <a href='{{ url('/back-customer/product/' . $item->id . '/detail-product') }}'
                                            class="btn btn-success mt-10">Detail</a>
                                        <div class="d-flex ml-10">
                                            <div class="mt-10">
                                                <input type="number" id="jumlah_pesanan" name="jumlah_pesanan"
                                                    value="1" min="1" required class="w-20 text-">
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-10 ml-5">Beli</button>
                                        </div>
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
