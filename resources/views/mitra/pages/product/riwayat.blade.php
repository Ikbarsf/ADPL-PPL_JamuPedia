@extends("customer.layouts.app")

@section('toolbar')
<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-5 align-items-center my-1"><span class="text-muted fw-normal">Home - E-Commerce - </span>&nbsp;Riwayat</h1>
        </div>
    </div>
</div>
@endsection

@section("content")
<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        @foreach ($transactions as $item)
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <img src="{{asset('image/upload/course/thumbnail')}}/{{$item->product->thumbnail_image}}"
              class="card-img-top" alt="{{ $item->product->product_name }}" />
            <div class="card-body">
              <div class="text-center fw-bold mb-10">
                <h1 class="card-title text-2xl">{{ $item->product->product_name }}</h1>
              </div>
              <div>
              </div>
              <div class="d-flex justify-content-between total font-weight-bold mt-4">
                <span>@currency($item->product->harga*$item->jumlah_pesanan)</span>
              </div>
              <div class="d-flex justify-content-between total font-weight-bold mt-4">
                <span>Jumlah pesanan: {{ $item->jumlah_pesanan }}</span>
              </div>
            <div>
                <a class="btn btn-success mt-10">Detail</a>
                <button type="submit" class="btn btn-primary float-right mt-10">{{ $item->status }}</button>
            </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection