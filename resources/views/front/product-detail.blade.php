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
					<li><a href="product" title="Men">Men</a></li>
					<li><a href="product" title="T-shirts">T-shirts</a></li>
					<li class="active">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</li>
				</ol>
			</div>
		</div>
		<section class="product_detail content">
			<div class="container shopping-wrap">
				<div class="alert alert-dismissible alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					<i><img src="{{ asset('front/images/success.svg') }}" alt="success"></i> <span> U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men </span> has been added to your wishlist.
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<ul class="sync1">
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-01-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-01.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-02-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-02.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-03-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-03.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-04-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-04.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-05-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-05.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-06-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-06.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-07-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-07.jpg') }}" alt="" /></a>
							</li>
							<li>
								<a class="fancybox" href="{{ asset('front/images/new-thumb-08-big.jpg') }}" data-fancybox-group="gallery" title=""><img src="{{ asset('front/images/new-thumb-08.jpg') }}" alt="" /></a>
							</li>
						</ul>
						<ul class="sync2">
							<li><img src="{{ asset('front/images/new-thumb-01.jpg') }}" alt=""> </li>
							<li><img src="{{ asset('front/images/new-thumb-02.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-03.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-04.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-05.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-06.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-07.jpg') }}" alt=""></li>
							<li><img src="{{ asset('front/images/new-thumb-08.jpg') }}" alt=""></li>
						</ul>
					</div>
					<div class="col-sm-7">
						<div class="product-name">
							<h1>U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</h1>
						</div>
						<div class="short-description">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. every item is a vital part of a woman's wardrobe.
						</div>
						<div class="sku">
							<span>SKU: </span> mag209_prod1
						</div>
						<!-- <p class="availability">Availability:<span class="in-stock">In stock</span><span class="not-in-stock">Not Available</span></p> -->
						<div class="price-box">$120.00</div>
						<div class="product-options">
							<label class="required"><em>*</em> size</label>
							<p class="required">* Required Fields</p>
							<div class="form-group">
								<select>
									<option>-- Please Select --</option>
									<option>Medium/Large </option>
									<option>Small/Medium </option>
								</select>
							</div>
						</div>
						<div class="add-to-cart-btn clearfix">
							<label>Qty:</label>
							<select>
								<option>1</option>
								<option>2</option>
								<option>3</option>
							</select>
							<button type="button" onclick="location.href='cart'" title="Add to Cart" class="button btn-cart"><span><span>Add to Cart</span></span>
							</button>
						</div>
						<div class="email-addto-box clearfix">
							<ul class="add-to-links">
								<li><a href="#" class="link-wishlist">Add to Wishlist</a></li>
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
									We offer the following delivery options for 24c ours over the world. Deliveries are not made on Saturdays, Sundays or on public holidays. A specific time slot cannot be specified with any of our delivery options. Please refer to the Terms and Conditions of Sale.
								</div>
								<div role="tabpanel" class="tab-pane" id="shipping">
									Before we can dispatch your purchases, we may need to confirm your details with your card issuer. We will do our best to keep delays to a minimum Our delivery time starts from the moment an order is accepted and includes a 48 hour period where your items will be processed and dispatched by our warehouse
								</div>
								<div role="tabpanel" class="tab-pane" id="sizeguide">
									<table class="size_guide_table">
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
									</table>
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
							<p>
								<strong>Sample Lorem Ipsum Text</strong>
							</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at ante. Mauris eleifend, quam a vulputate dictum, massa quam dapibus leo, eget vulputate orci purus ut lorem. In fringilla mi in ligula. Pellentesque aliquam quam vel dolor. Nunc adipiscing. Sed quam odio, tempus ac, aliquam molestie, varius ac, tellus. Vestibulum ut nulla aliquam risus rutrum interdum. Pellentesque lorem. Curabitur sit amet erat quis risus feugiat viverra. Pellentesque augue justo, sagittis et, lacinia at, venenatis non, arcu. Nunc nec libero. In cursus dictum risus. Etiam tristique nisl a</p>
							<p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which has since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!
							</p>
						</div>
						<div role="tabpanel" class="tab-pane" id="product-review">
							<p class="write-review">
								<a href="#" title="Write a review" class="review-tag">Write a review</a>
							</p>
							<form class="review-open">
								<ul class="star-links clearfix">
									<li>
										<a href="#" title="">
											<i class="img-original"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="img-original"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="img-original"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="img-original"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
									<li>
										<a href="#" title="">
											<i class="img-original"><img src="{{ asset('front/images/star.svg') }}" alt="star"></i>
											<i class="img-hover"><img src="{{ asset('front/images/star-h.svg') }}" alt="star"></i>
										</a>
									</li>
								</ul>
								<div class="form-group">
									<textarea class="form-control" placeholder="Write a review"></textarea>
								</div>
								<a href="#" title="Submit"  class="btn-secondary">Submit</a>
							</form>
							<div class="review-detail">
								<span>Mark, 26-12-2016 writes:</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							</div>
						</div>
						<div role="tabpanel" class="tab-pane" id="cms-tab">
							<p>
								Custom Variants and Options let you create product customization options and fields quickly and easily. Any product can have custom variants and options – this can be configured in its product configuration. Custom variants and options can be created for products as required or non-required options. They can affect the total price of the product by a fixed amount or percentage.
							</p>
							<p>
								Custom Variants and Options let you create product customization options and fields quickly and easily. Any product can have custom variants and options – this can be configured in its product configuration. Custom variants and options can be created for products as required or non-required options. They can affect the total price of the product by a fixed amount or percentage.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

@endsection