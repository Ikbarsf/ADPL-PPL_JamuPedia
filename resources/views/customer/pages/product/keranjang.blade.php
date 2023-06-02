@extends("customer.layouts.app")

@section("content")

<section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        @foreach ($my_products as $item)
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
              <form action="{{ url('/back-customer/product/'.$item->id.'/update') }}" method="post">
                @method('patch')
                @csrf
                <a class="btn btn-success mt-10 p-5">Detail</a>
                {{-- button modal --}}
                <button type="button" class="btn btn-primary launch float-right mt-10" data-toggle="modal" data-target="#staticBackdrop">
                  <i class="fa fa-rocket "></i>Bayar</button>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-body">
                        <div class="text-right">
                          <i class="fa fa-close close" data-dismiss="modal"></i>
                          <a href="">x</a>
                        </div>
                        <div class="tabs mt-3">
                          <ul class="nav nav-tabs " id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTs887N65mnn27rKnRIfPEO0k51nP7hdg06iQ&usqp=CAU" width="100">
                              </a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Logo_dana_blue.svg/2560px-Logo_dana_blue.svg.png" width="100"  >
                              </a>
                            </li>
                          </ul>
                          <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                              <div class="mt-4 mx-4">
                                <div class="text-center">
                                  <h5>Credit card</h5>
                                </div>
                                <div class="form mt-3">
                                  <div class="inputbox">
                                    <input type="text" name="name" class="form-control" >
                                    <span>Cardholder Name</span>
                                  </div>
                                  <div class="inputbox">
                                    <input type="text" name="name" min="1" max="999" class="form-control" >
                                    <span>Card Number</span>
                                    <i class="fa fa-eye"></i>
                                  </div>
                                  <div class="d-flex flex-row">
                                    <div class="inputbox">
                                      <input type="text" name="name" min="1" max="999" class="form-control" >
                                      <span>Expiration Date</span>
                                    </div>
                                    <div class="inputbox">
                                      <input type="text" name="name" min="1" max="999" class="form-control" >
                                      <span>CVV</span>
                                    </div>
                                  </div>
                                  <div class="px-5 pay">
                                    <button class="btn btn-success btn-block">Konfirmasi</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                              <div class="px-5 mt-5">
                                <div class="inputbox">
                                  <input type="text" name="name" class="form-control" >
                                  <span>Paypal Email Address</span>
                                </div>
                                <div class="pay px-5">
                                  <button class="btn btn-primary btn-block">Add paypal</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <button type="submit" class="btn btn-primary float-right mt-10">Bayar</button> --}}
              </form>
            </div>
            </div>
          </div>
        </div>
        @endforeach

        @foreach ($is_payment as $item)
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