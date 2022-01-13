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
                    <li ><a href="{{ route('product',['cid'=>$category->id]) }}" title="{{ $category->name}}">{{  ($category) ? $category->name : 'Products' }}</a></li>
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
                            @if (!$subcategory_data->isEmpty())
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
                                            <a href="javascript:void(0)" title="{{ $c->color}}"> <span class="{{ strtolower($c->color)}}-color"></span> {{ $c->color}} <i>(1250)</i></a>
                                        </li>
                                        @endforeach

                                        <!-- <li><a href="#" title="Reset" class="reset-link">Reset</a></li> -->
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-option">
                                <div class="title" data-toggle="collapse" href="#collapse3" aria-expanded="false">Price</div>
                                <div class="filter-option-inner collapse in" id="collapse3" style="margin-top:15px;">
                                <input type="text" class="js-range-slider" name="my_range" value="" data-type="double"  data-min="0" data-max="1000" data-from="200" data-to="500"  data-grid="true" onchange="get_range()"  />
                                        <script>$(".js-range-slider").ionRangeSlider();</script>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid-content">
                                        <div class="grid row">
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

                                        <form id="fromAddToCart">
                                            <input type="hidden" id="size_id" name="size_id" value="">
                                            <input type="hidden" id="qty" name="qty" value="1">
                                            <input type="hidden" id="product_id" name="product_id" value="">
                                        </form>
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
                    <form id="productFilter">
                        <input type="hidden"  name="cid" value="{{ (isset($_GET['cid'])) ? $_GET['cid'] : '' }}" id="cid">
                        <input type="hidden"  name="sid" value="{{ (isset($_GET['sid'])) ? $_GET['sid'] : ''}}" id="sid">
                        <input type="hidden"  name="sort" id="sort">
                        <input type="hidden"  name="price_range" id="price_range">
                        <input type="hidden"  name="size" id="size_data" value="{{ (isset($_GET['size'])) ? $_GET['size'] : ''}}">
                    </form>
@endsection