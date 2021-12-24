<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('front/images/favicon.ico')}}" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/main.css')}}">
    <!--Js -->
    <!-- <script type="text/javascript" src="{{ asset('front/js/main.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('front/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/modernizr.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/owl.carousel.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/placeholders.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/fastclick.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/html5shiv.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/jquery.fancybox.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/respond.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('front/js/general.js') }}"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Header Start -->
        <header class="header">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="row">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle nav-toggle collapsed " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{route('site')}}" title="eShopper" class="logo"><img src="{{ asset('images')}}/{{ $basic_detail->logo}}" alt="eShopper"></a>
                            <!-- <a href="{{route('site')}}" title="eShopper" class="logo"><img src="{{ asset('front/images/logo.svg')}}" alt="eShopper"></a> -->
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <nav class="nav is-fixed">
                                    <div class="nav-container clearfix">
                                        <ul class="nav-menu menu clearfix">
                                            <li class="menu-item"><a href="{{route('site')}}" class="menu-link" title="Home">Home</a></li>
                                        <?php foreach ($categories as $cate){
                                         $subcate = DB::table('subcategory')->where(['category_id'=>$cate->id])->get();
                                         if(!$subcate->isEmpty()){ ?>
                                           <li class="menu-item">
                                            <!-- route('/product',['category_id',$cate->id]) -->
                                                <a href="{{ route('product',['cid'=>$cate->id])}}" class="menu-link" title="{{ $cate->name}}">{{ $cate->name}}</a>
                                                <ul class="sub-menu">
                                                <?php foreach ($subcate as $scat){?>
                                                    <li><a href="{{ route('product',['cid'=>$cate->id,'sid'=>$scat->id])}}" title="{{ $scat->name}}">{{ $scat->name}}</a></li>
                                                <?php } ?>
                                                </ul>
                                            </li>
                                         <?php }else{ ?>
                                             <li class="menu-item"><a href="{{ route('product',['cid'=>$cate->id])}}" class="menu-link" title="{{ $cate->name}}">{{ $cate->name}}</a></li>
                                           <?php } } ?>
                                            <!-- <li class="menu-item">
                                                <a href="#" class="menu-link" title="Men">Men</a>
                                                <ul class="sub-menu">
                                                    <li><a href="product-detail" title="Jeans">Jeans</a></li>
                                                    <li><a href="product-detail" title="Shirts">Shirts</a></li>
                                                    <li><a href="product-detail" title="T-shirts">T-shirts</a></li>
                                                    <li><a href="product-detail" title="Chinos">Chinos</a></li>
                                                    <li><a href="product-detail" title="Blazers">Blazers</a></li>
                                                    <li><a href="product-detail" title="Night Wear">Night Wear</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li class="menu-item"><a href="product" class="menu-link" title="Women">Women</a></li>
                                            <li class="menu-item"><a href="product" class="menu-link" title="Kids">Kids</a></li>
                                            <li class="menu-item"><a href="product" class="menu-link" title="Accessories">Accessories</a></li> -->
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xs-12 search-outer">
                            <form>
                                <ul class="header-right-block clearfix">
                                    <li class="login-link"><a href="#" title="Login" data-toggle="modal" data-target="#Login-popup">Login</a></li>
                                    <li class="cart-outer">
                                        <a href="#" title="Add to Cart" class="add-to-cart"></a>
                                        <div class="cart-wrap">
                                            <p>Recently added item(s)</p>
                                            <ul>
                                                <li>
                                                    <a class="cart-product" title="consectetur adipiscing elit" href="product-detail"><img alt="" src="{{ asset('front/images/new-thumb-01.jpg') }}"></a>

                                                    <div class="cart-details">
                                                    <a class="btn-remove" title="Remove item" href="#"><img src="{{ asset('front/images/cross.svg') }}" alt=""></a>
                                                        <a class="btn-edit" title="Edit item" href="cart">
                                                            <img src="{{ asset('front/images/edit.svg') }}" alt="">
                                                        </a>
                                                        <p class="product-name"><a href="product-detail">U.S. Polo Assn. Full Sleeve Plain T-Shirts...</a></p>
                                                        <p class="price">$120.00 </p>
                                                        <p class="qty-wrapper">
                                                            <span>Qty :  </span>
                                                            <span>1</span>
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
                                                </li>
                                                <li>
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
                                                </li>
                                            </ul>
                                            <div class="summary">
                                                <p class="subtotal">
                                                    <span>Cart Subtotal:</span> <span class="price">$168.00</span>
                                                </p>
                                            </div>
                                            <div class="cart-action">
                                                <a href="cart" title="View Cart"  class="btn-secondary">View Cart</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="search-link-wrap">
                                        <div class="search-link-outer">
                                            <div class="search-link clearfix">
                                                <input type="text" class="form-control" placeholder="Search">
                                                <a href="#" title="Search"><i><img src="{{ asset('front/images/search.svg')}}" alt="Search"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </form>
                        </div>

                        <!-- /.navbar-collapse -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
        </header>
        <!-- Header End-->
@yield('content')

<footer class="footer">
        <div class="container">
            <div class="clearfix">
                <div class="footer-content">
                    <form>
                        <div class="form-group">
                            <label>Subscribe for Newsletter</label>
                            <p class="thankyou-msg">Thank you for your subscription.</p>
                            <input type="text" class="form-control" placeholder="Enter your email address">
                        </div>
                        <button type="button" class="sign-up">sign up</button>
                    </form>
                    <ul class="footer-links">
                        <li><a href="index" title="Home">Home</a></li>
                        <li><a href="{{route('about_us')}}" title="About us">About us</a></li>
                        <li><a href="register" title="Register">Register</a></li>
                        <li><a href="{{route('contact')}}" title="Contact us">Contact us</a></li>
                    </ul>
                    <p class="copyright">&copy; 2017 eShopper online store. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" title="Back to Top" class="back-to-top"><img src="{{ asset('front/images/up-arrow-white.svg')}}" alt="Arrow"></a>
    <!-- Footer End -->
    <div class="popup-outer">
        <div class="modal fade" id="Login-popup" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2>eShopper Login</h2>
                    </div>
                    <div class="modal-body">
                        <form  class="loginform">
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" placeholder="Enter your Username">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" placeholder="Enter your Password">
                            </div>
                            <div class="form-group validation-error">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" placeholder="Enter your Password" value="Incorrect Password">
                            </div>
                            <div class="form-group clearfix login-options">
                                <button type="submit" class="btn-secondary">Login</button>
                                <p>Not a Member? <a href="register" title="Register">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
