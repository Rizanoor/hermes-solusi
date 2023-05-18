@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')
<!-- Page Content -->
<div class="page-content page-cart">
  <section class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">Home</a>
              </li>
              <li class="breadcrumb-item active">
                Cart
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section class="store-cart">
    <div class="container">
      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-12 table-responsive">
          <table class="table table-borderless table-cart">
            <thead>
              <tr>
                <td>Image</td>
                <td>Name &amp; Seller</td>
                <td>Price</td>
                <td>Menu</td>
              </tr>
            </thead>
            <tbody>
              @php $totalPrice = 0 @endphp
              @foreach ($carts as $cart)
                <tr>
                  <td style="width: 20%;">
                    @if ($cart->product->galleries)
                      <img src="{{ Storage::url($cart->product->galleries->first()->photos) }}" alt="" class="cart-image">
                    @endif
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">{{ $cart->product->name }}</div>
                    <div class="product-subtitle">Toko {{ $cart->product->user->store_name }}</div>
                  </td>
                  <td style="width: 35%;">
                    <div class="product-title">Rp.{{ number_format($cart->product->price) }}</div>
                    <div class="product-subtitle">IDR</div>
                  </td>
                  <td style="width: 20%;">
                    <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="btn btn-remove-cart">Remove</button>
                    </form>
                  </td>
                </tr>
                @php $totalPrice += $cart->product->price @endphp
              @endforeach

            </tbody>
          </table>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="150">
        <div class="col-12">
          <hr>
        </div>
        <div class="col-12">
          <h2 class="mb-4">Shipping details</h2>
        </div>
      </div>

      <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="total_price" value="{{ $totalPrice }}">
        <!-- address -->
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="form-group">
              <label for="address_one">Address 1</label>
              <input type="text" class="form-control" id="address_one" name="address_one" value="">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="address_two">Address 2</label>
              <input type="text" class="form-control" id="address_two" name="address_two" value="">
            </div>
          </div>

          <!-- Country, Mobile -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="country">Country</label>
              <input type="text" class="form-control" id="country" name="country" value="Indonesia">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone_number">Phone number</label>
              <input type="text" class="form-control" id="phone_number" name="phone_number" value="+62">
            </div>
          </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="150">
          <div class="col-12">
            <hr>
          </div>
          <div class="col-12">
            <h2 class="mb-3">Payment Informations</h2>
          </div>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200">
          @php $pajak = ($totalPrice * 10)/100 @endphp
          <div class="col-4 col-md-3">
            <div class="product-title">+ 10%</div>
            <div class="product-subtitle">Product Insurance</div>
          </div>

          <div class="col-4 col-md-2">
            <div class="product-title text-success">Rp.{{ number_format($totalPrice + $pajak) ?? 0 }}</div>
            <div class="product-subtitle">Total</div>
          </div>
          <div class="col-4 col-md-4">
            <button type="submit" targrt="blank" class="btn btn-success mt-4 px-4 btn-block">
            Checkout Now
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@endpush
