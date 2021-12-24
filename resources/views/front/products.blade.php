@extends('front.layouts.master')
@section('title') {{ 'All Products' }} @endsection
@section('content')
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
            <div class="container title-block-container">
                <h2>Men</h2>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('site')}}" title="Home">Home</a></li>
                    <li><a href="{{ ($category) ? route('product',['cid'=>$category->id]) : '#' }}" title="Men"><?= ($category) ? $category->name : 'Products'?></a></li>
                    <li class="active"><?= ($subcategory) ? $subcategory->name : ''?></li>
                </ol>
            </div>
        </div>
        <section class="product_listing content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 ">
                        <div class="left-panel">
                            <h3>Filter By</h3>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse1" aria-expanded="false">
                                    Categories
                                </div>
                                <div class="filter-option-inner collapse in" id="collapse1">
                                    <ul>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Tshirts <span>(25275)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Shirts <span>(24866)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Jackets <span>(5326)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Sweaters <span>(4871)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Sweatshirts <span>(4533)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> Kurtas <span>(1566)</span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse2" aria-expanded="false">Colour</div>
                                <div class="filter-option-inner collapse in" id="collapse2">
                                    <ul class="colour_family_list clearfix">
                                        <li>
                                            <a href="#" title="Magenta"> <span class="magenta-color"></span> Magenta <i>(1250)</i></a>
                                        </li>
                                        <li class="disabled"><a href="#" title="Pink"><span class="pink-color"></span> Pink <i>(150)</i></a></li>
                                        <li>
                                            <a href="#" title="Red"> <span class="red-color"></span> Red <i>(100)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Lavender"> <span class="lavender-color"></span> Lavender <i>(250)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Navy"> <span class="navy-color"></span> Navy <i>(50)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Blue"> <span class="blue-color"></span> Blue <i>(1220)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Grey"> <span class="grey-color"></span> Grey <i>(2250)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Teal"> <span class="teal-color"></span> Teal <i>(1350)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Peach"> <span class="peach-color"></span> Peach <i>(1550)</i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Orange"> <span class="orange-color"></span> Orange <i>(10)</i></a>
                                        </li>
                                        <li><a href="#" title="Reset" class="reset-link">Reset</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse3" aria-expanded="false">Price</div>
                                <div class="filter-option-inner collapse in" id="collapse3">
                                    <div class="info">31 items</div>
                                    <div class="slider"><img src="{{ asset('front/images/price.jpg') }}" alt=""></div>
                                    <div class="price-range clearfix"><span class="min"> Rs. 174</span><span class="max"> Rs. 8,999</span></div>
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse4" aria-expanded="false">Size</div>
                                <div class="filter-option-inner size-filter collapse in" id="collapse4">
                                    <ul>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> XXS <span>(81)</span>
                                            </label>
                                        </li>
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" class="icheck"> XS <span>(1446)</span></label>
                                            </li>
                                            <li class="custom-check">
                                                <label>
                                                    <input type="checkbox" class="icheck"> S <span>(24706)</span>

                                                </label>
                                            </li>
                                            <li class="custom-check">
                                                <label>
                                                    <input type="checkbox" class="icheck"> M <span>(29467)</span>
                                                </label>
                                            </li>
                                            <li class="custom-check">
                                                <label>
                                                    <input type="checkbox" class="icheck"> L <span>(29516)</span></label>
                                                </li>
                                                <li class="custom-check">
                                                    <label>
                                                        <input type="checkbox" class="icheck"> XL <span>(27823)</span></label>
                                                    </li>
                                                    <li class="custom-check">
                                                        <label>
                                                            <input type="checkbox" class="icheck"> XXL <span>(16841)</span>
                                                        </label>
                                                    </li>
                                                    <li class="custom-check">
                                                        <label>
                                                            <input type="checkbox" class="icheck"> XXXL <span>(43)</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-block">
                                        <a href="product" title="Promotion"><img src="{{ asset('front/images/promo2.jpg') }}" alt="" class="img-responsive"></a>
                                    </div>
                                </div>
                                <div class="col-sm-9">
                                    <h3>{{ ($category) ? $category->name : 'Products' }} {{ ($subcategory) ? $subcategory->name : '' }} </h3>
                                    <div class="toolbar clearfix">

                                        <div class="pager_right">
                                            <div class="sort-by">
                                                <label>Sort By</label>
                                                <div class="form-group">
                                                    <select class="custom-dropdown">
                                                        <option>Position</option>
                                                        <option>Name</option>
                                                        <option>Price</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-content">
                                        <div class="grid row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-4 col-xs-6">
                                                <figure class="effect-goliath">
                                                    <div class="thumb-outer">
                                                        <a href="#" title="thumb" class="thumb-image">
                                                        <img src="{{ asset('images') }}/{{ $product->image}}" alt="thumb">
                                                        </a>
                                                        <a href="cart" title="Add to Cart" class="cart-button">Add to Cart</a>
                                                    </div>
                                                    <figcaption>
                                                        <a href="product-detail" title="{$product->name}} " class="heading">{{$product->name}} </a>
                                                        <span>${{ $product->price}}.00</span>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        @endforeach

                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-xs-12">
                                        <span class="button-outer text-center">
                                            <a class="btn-tertiary" href="product" title="More Products">More Products</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

@endsection