@extends('front.layouts.master')
@section('content')
<div class="banner">
            <div id="sync1" class="owl-carousel">
                <div class="item">
                    <img src="  {{ asset('front/images/banner.jpg') }}" alt="banner">
                </div>
                <div class="item">
                    <img src="  {{ asset('front/images/banner1.jpg') }}" alt="banner">
                </div>
                <div class="item">
                    <img src="  {{ asset('front/images/banner2.jpg') }}" alt="banner">
                </div>
            </div>
        </div>
        <section class="services-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="media service01">
                            <div class="media-left"></div>
                            <div class="media-body">
                                <h4 class="media-heading">Free Delivery Worldwide</h4>
                                <p>At vero eos et accusamus et iusto odio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media service02">
                            <div class="media-left"></div>
                            <div class="media-body">
                                <h4 class="media-heading">Free Return For 90 Day</h4>
                                <p>At vero eos et accusamus et iusto odio</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="media service03">
                            <div class="media-left"></div>
                            <div class="media-body">
                                <h4 class="media-heading">Discount on Order Gift</h4>
                                <p>At vero eos et accusamus et iusto odio</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content Start-->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-block">
                            <h2>Trending Product</h2>
                        </div>
                        <div class="grid-content">
                            <div class="grid row">
                            @foreach($products as $product)
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('images') }}/{{$product->image}}" alt="thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="{{ $product->name}}" class="heading">{{ $product->name}}</a>
                                            <span>${{ $product->price}}</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                @endforeach
                                <!-- <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-02.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-03.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-04.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <a href="#" title=""></a>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-05.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-06.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-07.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="col-sm-3 col-xs-6">
                                    <figure class="effect-goliath">
                                        <div class="thumb-outer">
                                            <a href="#" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="thumb-image"><img src="  {{ asset('front/images/new-thumb-08.jpg') }}" alt="Thumb"></a>
                                            <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                        </div>
                                        <figcaption>
                                            <a href="product-detail" title="U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men" class="heading">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a>
                                            <span>$120.00</span>
                                        </figcaption>
                                    </figure>
                                </div> -->
                                <div class="col-sm-12 col-xs-12">
                                    <span class="button-outer text-center">
                                      <a href="product" title="More Products" class="btn-tertiary">More Products</a>
                                  </span>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="inner-banner">
            <div class="container">
                <div class="banner-inner-text">
                    <div class="banner-inner-width">
                        <div class="text01">
                            <span>Get the</span> latest
                        </div>
                        <div class="text01">
                            <span>womens</span> fashion
                        </div>
                        <a href="product" title="Get Exclusive Collection For Women" class="btn-secondary">Get Exclusive Collection For Women</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2>Testimonial</h2>
            <div class="slider-outer">
                <div class="testimonial-slider owl-carousel">
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="  {{ asset('front/images/testimonial_3.jpg') }}" alt="Testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h5>John Clay</h5>
                                        <p>Cyclist</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-8">
                                <div class="description">"lorem ipsum suffered alteration in aome from, by injected humor , or randomized words which don't look even slightly believable.There are many varation of passenger randomized words which don't look even slightly believable"</div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="  {{ asset('front/images/testimonial_3.jpg') }}" alt="Testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h5>John Clay</h5>
                                        <p>Cyclist</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-8">
                                <div class="description">"lorem ipsum suffered alteration in aome from, by injected humor , or randomized words which don't look even slightly believable.There are many varation of passenger randomized words which don't look even slightly believable"</div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="  {{ asset('front/images/testimonial_3.jpg') }}" alt="Testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h5>John Clay</h5>
                                        <p>Cyclist</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-8">
                                <div class="description">"lorem ipsum suffered alteration in aome from, by injected humor , or randomized words which don't look even slightly believable.There are many varation of passenger randomized words which don't look even slightly believable"</div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="col-sm-3 col-xs-4">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="  {{ asset('front/images/testimonial_3.jpg') }}" alt="Testimonial">
                                    </div>
                                    <div class="media-body">
                                        <h5>John Clay</h5>
                                        <p>Cyclist</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-8">
                                <div class="description">"lorem ipsum suffered alteration in aome from, by injected humor , or randomized words which don't look even slightly believable.There are many varation of passenger randomized words which don't look even slightly believable"</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Content End-->

@endsection
