    <!-- HEADER -->
    <header>
        <!-- top Header -->
        <div id="top-header">
            <div class="container">
                <div class="pull-left">
                    <span>Welcome to E-shop!</span>
                </div>
                <div class="pull-right">
                    <ul class="header-top-links">
                        <li><a href="#">Store</a></li>
                        <li><a href="#">Newsletter</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li class="dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="#">English (ENG)</a></li>
                                <li><a href="#">Russian (Ru)</a></li>
                                <li><a href="#">French (FR)</a></li>
                                <li><a href="#">Spanish (Es)</a></li>
                            </ul>
                        </li>
                        <li class="dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
                            <ul class="custom-menu">
                                <li><a href="#">USD ($)</a></li>
                                <li><a href="#">EUR (€)</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="pull-left">
                    <!-- Logo -->
                    <div class="header-logo">
                        <a class="logo" href="{{url('/')}}">
                            <img src="{{asset('public/assets/./img/logo.png')}}" alt="">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Search -->
                    <div class="header-search">
                        <form action="{{url('search')}}" method="post">
                         @csrf
                            <input name="keyword" class="input search-input" type="text" placeholder="Enter your keyword">

                            <select class="input search-categories" name="cat_id">
                                <option value="0">All Categories</option>
                                @foreach($catData as $category)
                                <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /Search -->
                </div>
                <div class="pull-right">
                    <ul class="header-btns">
                        <!-- Account -->
                        <li class="header-account dropdown default-dropdown">
                            <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
                            </div>
                            <a href="#" class="text-uppercase">Login</a> / <a href="#" class="text-uppercase">Join</a>
                            <ul class="custom-menu">
                                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
                                <li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
                                <li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
                                <li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
                                <li><a href="#"><i class="fa fa-unlock-alt"></i> Login</a></li>
                                <li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
                            </ul>
                        </li>
                        <!-- /Account -->

                        <!-- Cart -->
                        <li class="header-cart dropdown default-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <div class="header-btns-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="qty"> 
                                   
                                   {{ count((array) session('cart')) }}

                                     </span>
                                </div>
                                <strong class="text-uppercase">My Cart:</strong>
                                <br>
                                <span> 

                                    <?php $total = 0 ?>
                                    @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                    <?php  
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $total += $discount_taka * $details['quantity'] ;

                                    ?>
                                    @endforeach
                                    @endif
                                   <?php  echo $total; ?>
                                </span>
                            </a>
                            <div class="custom-menu">
                                <div id="shopping-cart">
                                    <div class="shopping-cart-list">
                                           
 
                                                 @if(session('cart'))
                                                    @foreach(session('cart') as $id => $details)
                                                <?php 

                                                    // single product price calculation
                                                    $discount = $details['discount_per'];
                                                    $taka =$details['price'];
                                                    $discount_taka = $taka - (($taka/100)*$discount);


                                                    // total product price calculation
                                                     $total += $discount_taka * $details['quantity'] ;
                                                ?>

                                        <div class="product product-widget">
                                            <div class="product-thumb">
                                                <?php $image = $details['photo'] 

                                                ?>
                                                <img src='{{asset("public/$image")}}'alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-price">{{$discount_taka}} ৳</span></h3>
                                                <h2 class="product-name"><a href="#">{{$details['name']}} </a></h2>
                                            </div>
                                            <button class="cancel-btn"><a href="{{url('remove-cart').'/'.$id}}"><i class="fa fa-trash"></i></a></button>
                                        </div>

                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="shopping-cart-btns">
                                        <button class="main-btn"><a href="{{url('view-cart')}}">View Cart</a></button>
                                        <button class="primary-btn"><a href="{{url('checkout')}}" style="color:white">Checkout <i class="fa fa-arrow-circle-right"></i></a></button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- /Cart -->

                        <!-- Mobile nav toggle-->
                        <li class="nav-toggle">
                            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                        </li>
                        <!-- / Mobile nav toggle -->
                    </ul>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->