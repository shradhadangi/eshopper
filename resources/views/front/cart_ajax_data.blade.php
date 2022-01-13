<p>Recently added item(s)</p>
                                            <ul>
                                               <?php $subtotal=0;?>
                                            @foreach ($carts_data as $cart)
                                            <?php  $subtotal += $cart->price*$cart->qty; ?>
                                                <li>
                                                    <a class="cart-product" title="consectetur adipiscing elit" href="{{ route('product-detail',['product_id'=>$cart->product_id])}}"><img style="height:70px;width:50px;" src="{{ asset('images') }}/{{ $cart->image}}" alt="{{ $cart->name}}"></a>

                                                    <div class="cart-details">
                                                    <a class="btn-remove" title="Remove item" href="javascript:void(0)" onclick="delete_item('{{ $cart->id}}')"><img src="{{ asset('front/images/cross.svg') }}" alt=""></a>
                                                        <!-- <a class="btn-edit" title="Edit item" href="cart">
                                                            <img src="{{ asset('front/images/edit.svg') }}" alt="">
                                                        </a> -->
                                                        <p class="product-name"><a href="{{ route('product-detail',['product_id'=>$cart->product_id])}}">{{ $cart->name}}</a></p>
                                                        <p class="price">${{ $cart->price}} </p>
                                                        <p class="qty-wrapper">
                                                            <span>Qty :  </span>
                                                            <span>{{ $cart->qty}}</span>
                                                        </p>
                                                        <div class="size-wrap">
                                                            <dl class="item-options">
                                                                <dt>Size :</dt>
                                                                <dd>
                                                                {{ $cart->size}}
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                                <!-- <li>
                                                    <a class="cart-product" title="consectetur adipiscing elit" href="product-detail"><img alt="" src="{{ asset('front/images/new-thumb-02.jpg') }}"></a>

                                                    <div class="cart-details">
                                                        <a class="btn-remove" title="Remove item" href="#"><img src="{{ asset('front/images/cross.svg')}}" alt=""></a>
                                                        <a class="btn-edit" title="Edit item" href="cart">
                                                            <img src="{{ asset('front/images/edit.svg')}}" alt="">
                                                        </a>
                                                        <p class="product-name"><a href="product-detail">U.S. Polo Assn. Full Sleeve Plain T-Shirts for Men</a></p>
                                                        <p class="price">$120.00</p>

                                                        <p class="qty-wrapper">
                                                            <span>Qty :  </span>
                                                            <span>
                                                                1
                                                            </span>
                                                        </p>
                                                        <div class="size-wrap">
                                                            <dl class="item-options">
                                                                <dt>Size :</dt>
                                                                <dd>
                                                                    Medium/Large
                                                                </dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </li> -->
                                            </ul>
                                            <div class="summary">
                                                <p class="subtotal">
                                                    <span>Cart Subtotal:</span> <span class="price">${{ ($subtotal) ? $subtotal : '0'}}.00</span>
                                                </p>
                                            </div>
                                            <div class="cart-action">
                                                <a href="{{route('cart')}}" title="View Cart"  class="btn-secondary">View Cart</a>
                                            </div>