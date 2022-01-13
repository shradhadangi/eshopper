@extends('front.layouts.master')
@section('title'){{'Cart'}}@endsection
@section('content')
<section class="inner-content">
            <div class="title-block-outer">
                <img src="{{ asset('front/images/inner-banner.jpg') }}" alt="Banner-image" class="img-responsive">
                <div class="title-block-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Shopping Cart</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb-panel">
                <div class="container">
                    <ol   class="breadcrumb">
                        <li><a href="{{ route('site')}}" title="Home">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
            </div>
            <div class="content">
                <div class="container shopping-wrap">
                @if(session('success'))
                     <div class="alert alert-dismissible alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i> <img src="{{ asset('front/images/success.svg') }}" alt="success"></i>  {{ session('success')}}
                    </div>
                    @endif
                   <!-- <div class="alert alert-dismissible alert-info" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i><img src="{{ asset('front/images/info.svg') }}" alt="success"></i> <span> U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men </span> was added to your shopping cart
                    </div>
                    <div class="alert alert-dismissible alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i><img src="{{ asset('front/images/warning.svg') }}" alt="success"></i> <span> U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men </span> was added to your shopping cart
                    </div>
                    <div class="alert alert-dismissible alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i><img src="{{ asset('front/images/error.svg') }}" alt="success"></i> <span> U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men </span> was added to your shopping cart
                    </div> -->
                    <div class="table-responsive">
                        <table class="table shopping-table">
                            <thead>
                                <tr>
                                    <th class="theading-1">&nbsp;</th>
                                    <th>Product Name</th>
                                    <th>&nbsp;</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $subtotal=0;?>

                                @foreach ($cart_data as $cart)
                                <?php  $subtotal += $cart->price*$cart->qty; ?>

                                <tr>
                                    <td class="product-image-outer">
                                        <a href="{{ route('product-detail',['product_id'=>$cart->product_id])}}" title="{{ $cart->name}}"><img style="height:70px;width:50px;" src="{{ asset('images') }}/{{ $cart->image}}" alt="{{ $cart->name}}"></a>
                                    </td>
                                    <td>
                                        <h2 class="product-name">
                                            <a href="{{ route('product-detail',['product_id'=>$cart->product_id])}}">{{ $cart->name}}</a>
                                        </h2>
                                        <ul>@if($cart->color)
                                            <li><strong>Color</strong></li>
                                            <li>{{ $cart->color }} </li>
                                            @endif
                                            @if($cart->size)
                                            <li><strong>size</strong></li>
                                            <li>{{ $cart->size}}</li>
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="#" title="Edit item" class="edit-link"> <img src="{{ asset('front/images/edit-dark.svg') }}" alt="edit"></a>
                                    </td>
                                    <td>
                                        <span class="orange-text">${{ $cart->price}}</span>
                                    </td>
                                    <td>
                                        <input id="qty{{ $cart->id}}" style="width:60px;" type="number" min="1" value="{{ $cart->qty}}" title="Qty" onchange="updateQty('{{ $cart->id}}',this.value)" class="form-control qty">
                                    </td>
                                    <td>
                                        <span class="orange-text">${{ $cart->price*$cart->qty}}.00</span>
                                    </td>
                                    <td>
                                    <form method="post" action="{{ route('delete-cart')}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$cart->id}}">
                                        <button  type="submit"><img src="{{ asset('front/images/cross-dark.svg') }}" alt="delete" style="height:10px;width:10px;display:block;"></button>
                                    </form>
                                        <!-- <a href="javascript:void(0)" onclick="delete_item('{{ $cart->id}}')" title="Remove item" class="remove-link"><img src="{{ asset('front/images/cross-dark.svg') }}" alt="delete"></a> -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <a href="{{ route('product',['cid'=>1])}}" title="Continue Shopping" class="btn-tertiary">Continue Shopping</a>
                                        @if(!session()->has('USER_LOGIN'))
                                        <a href="#" title="Login" data-toggle="modal" data-target="#Login-popup" class="btn-tertiary">Login / Register</a>
                                        @endif
                                    </td>
                                    @if($subtotal)
                                    <td colspan="5" class="btn-right">
                                        <a href="{{ route('clear-cart')}}" title="Clear Shopping Cart" class="btn-tertiary">Clear Shopping Cart</a>

                                    </td>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
                @if($subtotal)
                @if(session()->has('USER_LOGIN'))
                    <form action="{{ route('place-order')}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="shipping-block">
                                <h4>Estimate Shipping and Tax</h4>
                                <p>Enter your destination to get a shipping estimate.</p>
                                    <div class="form-group">
                                        <label class="form-label">country</label>
                                        <select class="default-select form-control" name="country" required>
                                            <option>India</option>
                                            <option>United States</option>
                                            <option>Australia</option>
                                            <option>China</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">State/Province</label>
                                        <input type="text" class="form-control" required name="state" placeholder="State/Province">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Zip/Postal Code</label>
                                        <input type="text" minlength="6" required maxlength="6" class="form-control" name="zipcode" placeholder="Zip/Postal Code">
                                        <input type="hidden" name="total" value="{{ $subtotal}}">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Address</label>
                                        <input type="text" required  class="form-control" name="address" placeholder="Shipping Adress">
                                    </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-sm-offset-3">
                            <div class="table-responsive">
                                <table class="table summary-table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>${{ $subtotal}}.00</td>
                                        </tr>
                                        <tr>
                                            <td class="summary-total"><strong>Total</strong></td>
                                            <td class="summary-price"><strong>${{ $subtotal}}.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <button type="submit" title="Update Shopping Cart" class="btn-secondary">Place Order</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2">
                                                <a href="profile" title="Checkout with Multiple Addresses">
                                                    Checkout with Multiple Addresses
                                                </a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    </form>

                    @endif
                @endif
                </div>
            </div>
        </section>
     @endsection