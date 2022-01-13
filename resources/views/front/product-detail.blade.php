@extends('front.layouts.master')
@section('title'){{'Proudct Detail'}}@endsection
@section('content')

<div class="title-block-outer">
			<img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
			<div class="container title-block-container">
				<h2>T-shirts</h2>
			</div>
		</div>
		<div class="breadcrumb-panel">
			<div class="container">
				<ol class="breadcrumb">
					<li><a href="{{ route('site')}}" title="Home">Home</a></li>
					@if ($product->category_id)
					<li><a href="{{ route('product',['cid'=>$product->category_id])}}" title="{{ $product->cat_name}}">{{ $product->cat_name}}</a></li>
					@endif
					@if ($product->subcat_id)
					<li><a href="{{ route('product',['cid'=>$product->category_id,'sid'=>$product->subcat_id])}}" title="{{ $product->sub_cat_name}}">{{ $product->sub_cat_name}}</a></li>
					@endif
					<li class="active">{{ $product->name}}</li>
				</ol>
			</div>
		</div>
		<section class="product_detail content">

			<div class="container">
			@if (count($errors) > 0)
									<div class="alert alert-danger alert-dismissible" style="width:50%;">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<strong>Whoops!</strong> There were some problems with your input.
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@if(session('success'))
									<div class="alert alert-success alert-dismissible" style="width:50%;">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h5><i class="icon fas fa-check"></i> Success!</h5>
										{{ session('success')}}
										</div>
								@endif

				<div class="row">
					<div class="col-sm-5">
						<ul class="sync1">
						<li>
							<a class="fancybox" href="{{ asset('images') }}/{{$product->image}}" data-fancybox-group="gallery" title=""><img src="{{ asset('images') }}/{{$product->image}}" alt="" /></a>
						</li>
						@foreach ($product_images as $image)
							<li>
							<a class="fancybox" href="{{ asset('images') }}/{{$image->image}}" data-fancybox-group="gallery" title=""><img src="{{ asset('images') }}/{{$image->image}}" alt="" /></a>
							 </li>
						@endforeach
						</ul>
						<ul class="sync2">
							<li><img src="{{ asset('images') }}/{{$product->image}}" alt=""> </li>
						@foreach ($product_images as $image)
							<li><img src="{{ asset('images') }}/{{$image->image}}" alt=""> </li>
						@endforeach
						</ul>
					</div>
					<div class="col-sm-7">
						<div class="product-name">
							<h1>{{ $product->name}}</h1>
						</div>
						<div class="short-description">
						{{ $product->short_description}}
						</div>
						<div class="sku">
							<span>SKU: </span> {{ $product->sku_id}}
						</div>
						<!-- <p class="availability">Availability:<span class="in-stock">In stock</span><span class="not-in-stock">Not Available</span></p> -->
						<div class="price-box  mt-2">${{ $product->price}}</div>

						<div class="product-options">
							<label class="required"><em>*</em> size</label>
							<p class="required">* Required Fields</p>
							<?php $sizes= explode(',',$product->size); ?>
							<div class="form-group">
								<select id="psize_id{{ $product->id }}" onchange="get_size('{{ $product->id }}')">
									<option value="">-- Please Select --</option>
									  @foreach ($sizes as $size=>$s)
										<option value="{{ $s }}">{{ $s }}</option>
									  @endforeach
									<!-- <option>Small/Medium </option> -->
								</select>
							</div>
						</div>
						<div class="add-to-cart-btn clearfix">
							<label>Qty:</label>
							<select id="pqty{{ $product->id }}" onchange="get_qty('{{ $product->id }}')">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<button type="button" onclick="add_cart('{{ $product->id }}')" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span>
							</button>
							<div class="shopping-wrap" style="margin-top:10px;">

							</div>
						</div>
						<form id="fromAddToCart">
							<input type="hidden" id="size_id" name="size_id" value="0">
							<input type="hidden" id="qty" name="qty" value="">
							<input type="hidden" id="product_id" name="product_id" value="{{ $product->id}}">
						</form>
						<div class="email-addto-box clearfix">
							<ul class="add-to-links">
								<!-- <li><a href="#" class="link-wishlist">Add to Wishlist</a></li> -->
							</ul>
						</div>
						<div class="tablist-nav">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs clearfix" role="tablist">
								<li role="presentation" class="active"><a href="#delivery" aria-controls="delivery" role="tab" data-toggle="tab">Delivery</a></li>
								<li role="presentation"><a href="#shipping" aria-controls="shipping" role="tab" data-toggle="tab">Shipping</a></li>
								<li role="presentation"><a href="#sizeguide" aria-controls="sizeguide" role="tab" data-toggle="tab">Sizeguide</a></li>
							</ul>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="delivery">
									{{ $product->delivery_detail}}
								</div>
								<div role="tabpanel" class="tab-pane" id="shipping">
									{{ $product->shipping_detail}}
								</div>
								<div role="tabpanel" class="tab-pane" id="sizeguide">
									{{ $product->size_guide}}
									<!-- <table class="size_guide_table">
										<thead>
											<tr>
												<th>Size</th>
												<th>S</th>
												<th>M</th>
												<th>L</th>
												<th>XL</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Men</td>
												<td>7-10</td>
												<td>10-13</td>
												<td>13-15</td>
												<td>15-17</td>
											</tr>
											<tr>
												<td>Women</td>
												<td>7-9</td>
												<td>10-12</td>
												<td>13-14</td>
												<td>15-16</td>
											</tr>
										</tbody>
									</table> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product-content">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#product-des" aria-controls="product-des" role="tab" data-toggle="tab">Product Description</a></li>
						<li role="presentation"><a href="#product-review" aria-controls="product-review" role="tab" data-toggle="tab">Product's Review</a></li>
						<li role="presentation"><a href="#cms-tab" aria-controls="cms-tab" role="tab" data-toggle="tab">CMS tab</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="product-des">
							<?= $product->product_description ?>
						</div>
						<div role="tabpanel" class="tab-pane" id="product-review">
							<p class="write-review">
								<a href="#" title="Write a review" class="review-tag">Write a review</a>
							</p>
							<form class="review-open" action="{{ route('review-submit')}}" method="post">
								@csrf
								<ul class="star-links clearfix">
									<li>
										<a href="javascript:void(0)" onclick="change_rating(1)" title="">
											<i class="img-original blank-star1"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover full-star1"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="change_rating(2)" title="">
											<i class="img-original blank-star2"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover full-star2"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="change_rating(3)" title="">
											<i class="img-original blank-star3"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover full-star3"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="change_rating(4)" title="">
											<i class="img-original blank-star4"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover full-star4"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="javascript:void(0)" onclick="change_rating(5)" title="">
											<i class="img-original blank-star5"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover full-star5"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
								</ul>
								<div class="form-group">
									<textarea class="form-control" name="review" placeholder="Write a review"></textarea>
									<input type="hidden" name="product_id" value="{{ $product->id}}">
								  	<input type="hidden" name="rating" id="rating" value="1">
									  <span class="text-danger">@error('review') {{ $message}}@enderror</span>
									  <span class="text-danger">@error('rating') {{ $message}}@enderror</span>
									  <span class="text-danger">@error('product_id') {{ $message}}@enderror</span>
								</div>
								@if(session()->has('USER_LOGIN'))
								  <button type="submit" title="Submit" class="btn-secondary">Submit</button>
								@else
                                  <a href="#" title="Login" data-toggle="modal" data-target="#Login-popup" class="btn-secondary">Login / Register</a>
                                @endif
							</form>
							<div class="review-detail">
								@foreach ($product_reviews as $re)
								<span>{{ $re->first_name}} {{ $re->last_name}}, {{ date('d-m-Y',strtotime($re->created_at)) }} writes:</span>
								<p>{{ $re->review}}</p>
								@endforeach
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="cms-tab">
							<p>
								{{ $product->cms}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection