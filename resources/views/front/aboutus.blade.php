@extends('front.layouts.master')
@section('title') {{ 'All Products' }} @endsection
@section('content')
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
            <div class="title-block-container">
                <div class="container">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('site')}}" title="Home">Home</a></li>
                    <li class="active">About Us</li>
                </ol>
            </div>
        </div>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 about-us">
                        <h1>{{ $about->title}}</h1>

                        <div class="img-block">
                            <img src="{{ asset('images') }}/{{ $about->image}}" style="width:50%;" alt="">
                        </div>
<br>
                        <?= $about->description ?>

                    </div>

                    <div class="col-sm-3">
                        <div class="promo-block">
                            <a href="product.html" title="Promotion">
                                <img src="{{ asset('front/images/promo1.jpg') }}" class="img-responsive" alt="promo1.jpg') }}">
                            </a>
                        </div>
                        <div class="promo-block">
                            <a href="product.html" title="Promotion">
                                <img src="{{ asset('front/images/promo2.jpg') }}" class="img-responsive" alt="promo1.jpg') }}">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection