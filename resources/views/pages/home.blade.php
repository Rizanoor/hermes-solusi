@extends('layouts.app')

@section('title')
    Store Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <section class="store-new-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Product List</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="background-image: url('/images/products-apple-watch.jpg')"></div>
                            </div>
                            <div class="products-text">Kue Kacang</div>
                            <div class="products-price">55 K</div>
                        </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="background-image: url('/images/products-monkey-toys.jpg')"></div>
                            </div>
                            <div class="products-text">Kue Kacang</div>
                            <div class="products-price">55 K</div>
                        </a>
                    </div>

                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                        <a href="/details.html" class="component-products d-block">
                            <div class="products-thumbnail">
                                <div class="products-image"
                                    style="background-image: url('/images/products-mavic-kawe.jpg')"></div>
                            </div>
                            <div class="products-text">Kue Kacang</div>
                            <div class="products-price">55 K</div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
