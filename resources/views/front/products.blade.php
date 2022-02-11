@extends('front.layouts.master')
@section('title') {{ 'All Products' }} @endsection
@section('content')
<style>
    .price-title {
  position: relative;
  color: #fff;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
  background: #d58e32;
  padding:10px;
}

.price-container {
      display: flex;
    border: 1px solid #ccc;
    padding: 5px;
    margin-left: 57px;
  width:100px;
}

.price-field {
  position: relative;
  width: 100%;
  height: 36px;
  box-sizing: border-box;
  padding-top: 15px;
  padding-left: 0px;
}

.price-field input[type=range] {
    position: absolute;
}

/* Reset style for input range */

.price-field input[type=range] {
  width: 100%;
    height: 7px;
border: 1px solid #000;
    outline: 0;
    box-sizing: border-box;
    border-radius: 5px;
    pointer-events: none;
    -webkit-appearance: none;
}

.price-field input[type=range]::-webkit-slider-thumb {
    -webkit-appearance: none;
}

.price-field input[type=range]:active,
.price-field input[type=range]:focus {
  outline: 0;
}

.price-field input[type=range]::-ms-track {
  width: 188px;
  height: 2px;
  border: 0;
  outline: 0;
  box-sizing: border-box;
  border-radius: 5px;
  pointer-events: none;
  background: transparent;
  border-color: transparent;
  color: red;
  border-radius: 5px;
}

/* Style toddler input range */

.price-field input[type=range]::-webkit-slider-thumb {
  /* WebKit/Blink */
    position: relative;
    -webkit-appearance: none;
    margin: 0;
    border: 0;
    outline: 0;
    border-radius: 50%;
    height: 10px;
    width: 10px;
    margin-top: -4px;
    background-color: #fff;
    cursor: pointer;
    cursor: pointer;
    pointer-events: all;
    z-index: 100;
}

.price-field input[type=range]::-moz-range-thumb {
  /* Firefox */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  margin-top: -5px;
  background-color: #fff;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

.price-field input[type=range]::-ms-thumb  {
  /* IE */
  position: relative;
  appearance: none;
  margin: 0;
  border: 0;
  outline: 0;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  margin-top: -5px;
  background-color: #242424;
  cursor: pointer;
  cursor: pointer;
  pointer-events: all;
  z-index: 100;
}

/* Style track input range */

.price-field input[type=range]::-webkit-slider-runnable-track {
  /* WebKit/Blink */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #555;
  border-radius: 5px;
}

.price-field input[type=range]::-moz-range-track {
  /* Firefox */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #242424;
  border-radius: 5px;
}

.price-field input[type=range]::-ms-track {
  /* IE */
  width: 188px;
  height: 2px;
  cursor: pointer;
  background: #242424;
  border-radius: 5px;
}

/* Style for input value block */

.price-wrap {
  display: flex;
  color: #242424;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
  margin-bottom: 0px;
}

.price-wrap-1,
.price-wrap-2 {
  display: flex;
  margin-left: 0px;
}

.price-title {
  margin-right: 5px;
}

.price-wrap_line {
    margin: 6px 0px 5px 5px;
}

.price-wrap #one,
.price-wrap #two {
  width: 30px;
  text-align: right;
  margin: 0;
  padding: 0;
  margin-right: 2px;
  background:  0;
  border: 0;
  outline: 0;
  color: #242424;
  font-family: 'Karla', 'Arial', sans-serif;
  font-size: 14px;
  line-height: 1.2em;
  font-weight: 400;
}

.price-wrap label {
    text-align: right;
    margin-top: 6px;
    padding-left: 5px;
}

/* Style for active state input */

.price-field input[type=range]:hover::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #242424;
  transition-duration: 0.3s;
}

.price-field input[type=range]:active::-webkit-slider-thumb {
  box-shadow: 0 0 0 0.5px #242424;
  transition-duration: 0.3s;
}</style>
<div class="title-block-outer">
            <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
            <div class="container title-block-container">
                <h2>{{  ($category) ? $category->name : 'Products' }}</h2>
            </div>
        </div>
        <div class="breadcrumb-panel">
            <div class="container">
                <ol class="breadcrumb">
                    <li><a href="{{route('site')}}" title="Home">Home</a></li>
                    <li >
                    @if ($category)
                       <a href="{{ route('product',['cid'=>$category->id]) }}" title="{{ $category->name}}">{{  ($category) ? $category->name : 'Products' }}
                       </a>
                    @endif
                    </li>
                    @if ($subcategory)
                    <li class="active">{{ $subcategory->name }}</li>
                    @endif
                </ol>
            </div>
        </div>
        <section class="product_listing content">
            <div class="container">
              <div class="shopping-wrap" style="margin-top:10px;">

                </div>
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
                                        @foreach ($categories as $cat)
                                        <?php $product_count = DB::table('products')->where('category_id',$cat->id)->count();?>
                                          <li class="custom-check">
                                            <label>
                                                <a href="{{route('product',['cid'=>$cat->id])}}"> {{ $cat->name}} <span>({{ $product_count}})</span></a>
                                                <!-- <input type="checkbox" class="icheck"> {{ $cat->name}} <span>(25275)</span> -->
                                            </label>
                                           </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @if ($subcategory!='' && !$subcategory_data->isEmpty())
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse11" aria-expanded="false">
                                 Sub-Categories
                                </div>
                                <div class="filter-option-inner collapse in" id="collapse11">
                                    <ul>
                                        @foreach ($subcategory_data as $scat)
                                        <?php $product_counts = DB::table('products')->where('subcat_id',$scat->id)->count();?>
                                          <li class="custom-check">
                                            <label>
                                                <a href="{{route('product',['cid'=>$scat->category_id,'sid'=>$scat->id])}}"> {{ $scat->name}} <span>({{ $product_counts}})</span></a>
                                            </label>
                                           </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse2" aria-expanded="false">Colour</div>
                                <div class="filter-option-inner collapse in" id="collapse2">
                                    <ul class="colour_family_list clearfix">
                                      @foreach ($color_data as $c)
                                         <li>
                                            <a href="javascript:void(0)"  onclick="get_color('{{$c->color}}','{{$c->id}}')" <?php if(isset($_GET['color'])){ if(str_contains($_GET['color'],$c->color)){echo 'checked';}}?> id="color{{ $c->id}}" title="{{ $c->color}}"> <span class="{{ strtolower($c->color)}}-color"></span> {{ $c->color}} <i>(1250)</i></a>
                                        </li>
                                        @endforeach
                                        <!-- <li><a href="#" title="Reset" class="reset-link">Reset</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse3" aria-expanded="false">Price</div>
                                <div class="filter-option-inner collapse in" id="collapse3" style="margin-top:15px;">
                                <div class="price-field">
                                    <input type="range" min="100" max="500" value="135" id="lower">
                                    <input type="range" min="100" max="500" value="500" id="upper">
                                  </div>
                                  <div class="price-wrap">
                                    <span class="price-title">FILTER</span>
                                    <div class="price-container">
                                      <div class="price-wrap-1">

                                        <label for="one">$</label>
                                        <input id="one">
                                      </div>
                                      <div class="price-wrap_line">-</div>
                                      <div class="price-wrap-2">
                                        <label for="two">$</label>
                                        <input id="two">

                                      </div>
                                    </div>
                                  </div>
                                <!-- <input type="text" class="js-range-slider" name="my_range" value="" data-type="double"  data-min="0" data-max="1000" data-from="200" data-to="500"  data-grid="true" onchange="get_range()"  /> -->
                                        <!-- <script>$(".js-range-slider").ionRangeSlider();</script> -->
                                    <!-- <div class="info">31 items</div>
                                    <div class="slider"><img src="{{ asset('front/images/price.jpg') }}" alt=""></div>
                                    <div class="price-range clearfix"><span class="min"> Rs. 174</span><span class="max"> Rs. 8,999</span></div> -->
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse4" aria-expanded="false">Size</div>
                                <div class="filter-option-inner size-filter collapse in" id="collapse4">
                                    <ul>
                                    @foreach ($size_data as $s)
                                        <li class="custom-check">
                                            <label>
                                                <input type="checkbox" onclick="get_size('{{$s->size}}','{{$s->id}}')" <?php if(isset($_GET['size'])){ if(str_contains($_GET['size'],$s->size)){echo 'checked';}}?> id="size{{ $s->id}}" class="icheck" value="{{$s->size}}"> {{ $s->size}}
                                                <!-- <span>(81)</span> -->
                                            </label>
                                        </li>

                                        @endforeach


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
                                        <?php
                                        $name=$price_desc=$price_asc =null;
                                          if(isset($_GET['sort'])){
                                                if($_GET['sort']=='name'){
                                                    $name="selected";
                                                }
                                                if($_GET['sort']=='price_desc'){
                                                    $price_desc="selected";
                                                }
                                                if($_GET['sort']=='price_asc'){
                                                    $price_asc="selected";
                                                }
                                          }
                                        ?>
                                        <div class="pager_right">
                                            <div class="sort-by">
                                                <label>Sort By</label>
                                                <div class="form-group">
                                                    <select class="custom-dropdown" onchange="sort_by()" id="sort_by">
                                                        <option value="" >Default</option>
                                                        <option <?= $name ?> value="name">Name</option>
                                                        <option <?= $price_asc?> value="price_asc"> Price (Low-To-High)</option>
                                                        <option <?= $price_desc?> value="price_desc">Price (High-To-Low)</option>
                                                    </select>
                                                </div>
                                                <a href="{{route('product')}}" title="Reset" class="reset-link">Reset Filter</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-content">
                                        <div class="grid row" id="data-wrapper">
                                        @foreach ($products as $product)
                                            <div class="col-sm-4 col-xs-6">
                                                <figure class="effect-goliath">
                                                    <div class="thumb-outer">
                                                        <a href="{{ route('product-detail',['product_id'=>$product->id])}}" title="thumb" class="thumb-image">
                                                        <img src="{{ asset('images') }}/{{ $product->image}}" alt="thumb">
                                                        </a>
                                                        <a href="javascript:void(0)" id="cartBtn{{ $product->id}}" onclick="add_cart('{{ $product->id }}')" title="Add to Cart" class="cart-button">Add to Cart</a>
                                                    </div>
                                                    <figcaption>
                                                        <a href="{{ route('product-detail',['product_id'=>$product->id])}}" title="{$product->name}} " class="heading">{{$product->name}} </a>
                                                        <span>${{ $product->price}}.00</span>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <?php $sizes= explode(',',$product->size); ?>
                                            <input type="hidden" id="pqty{{$product->id}}"  value="1">
                                            <input type="hidden" id="psize_id{{$product->id}}"  value="{{ ($sizes) ? $sizes[0] : ''}}">
                                        @endforeach
                                        </div>
                                        <form id="fromAddToCart">
                                            <input type="hidden" id="size_id" name="size_id" value="">
                                            <input type="hidden" id="qty" name="qty" value="1">
                                            <input type="hidden" id="product_id" name="product_id" value="">
                                        </form>
                                    </div>
                                    <!-- <div id="data-wrapper">
result
        </div> -->
                                    <div class="col-sm-12 col-xs-12 auto-load">
                                        <span class="button-outer text-center">
                                            <a class="btn-tertiary" href="product" title="More Products">More Products</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <form id="productFilter">
                        <input type="hidden"  name="cid" value="{{ (isset($_GET['cid'])) ? $_GET['cid'] : '' }}" id="cid">
                        <input type="hidden"  name="sid" value="{{ (isset($_GET['sid'])) ? $_GET['sid'] : ''}}" id="sid">
                        <input type="hidden"  name="sort" id="sort">
                        <input type="hidden"  name="price_range" id="price_range">
                        <input type="hidden"  name="size" id="size_data" value="{{ (isset($_GET['size'])) ? $_GET['size'] : ''}}">
                        <input type="hidden"  name="color" id="color_data" value="{{ (isset($_GET['color'])) ? $_GET['color'] : ''}}">
                    </form>
<script>
        var ENDPOINT = "{{ url('/') }}";
        var page = 1;
        infinteLoadMore(page);

        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                infinteLoadMore(page);
            }
        });

        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "/products?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response) {
                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response);
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }

    </script>

@endsection