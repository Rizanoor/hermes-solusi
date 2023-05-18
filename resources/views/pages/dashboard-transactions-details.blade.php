@extends('layouts.dashboard')

@section('title')
    Store Dashboard Transaction Details
@endsection

@section('content')
<!-- Section Content -->
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
      <p class="dashboard-subtitle">
        Transaction / Details
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" class="w-100 mb-3" alt="">
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Customer name</div>
                      <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Product name</div>
                      <div class="product-subtitle">{{ $transaction->product->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Date of Transaction</div>
                      <div class="product-subtitle">{{ $transaction->created_at }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Payment Status</div>
                      <div class="product-subtitle text-danger">{{ $transaction->transaction->transaction_status }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total Amount</div>
                      <div class="product-subtitle">Rp.{{number_format($transaction->transaction->total_price)}}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Code</div>
                      <div class="product-subtitle">{{ $transaction->code }}</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
@endpush
