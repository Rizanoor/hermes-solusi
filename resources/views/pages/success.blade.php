@extends('layouts.success')

@section('title')
    Store Success Page
@endsection

@section('content')
<div class="page-content page-success">
  <div class="section-success" data-aos="zoom-in">
    <div class="container">
      <div class="row align-items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
          <img src="/images/success.svg" alt="" class="mb-4">
          <h2>
            Transaction Processed!
          </h2>
          <P>Terima kasih, Transaksi kamu akan segera kami prosess.
          </P>
          <div>
            <a href="/dashboard" class="btn btn-success w-50 mt-4">My Dashboard</a>
            <a href="/" class="btn btn-signup w-50 mt-2">Go To Shopping</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
