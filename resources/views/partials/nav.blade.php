    <!-- NAVIGATION -->
    <div id="navigation">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav">
                <!-- category nav -->
                <div class="category-nav show-on-click">
                    <span class="category-header">Categories <i class="fa fa-list"></i></span>
                    <ul class="category-list">

                       @foreach($catData as $category)
                        <li><a href="{{url('/category')}}/{{$category->cat_name}}/{{$category->id}}">{{$category->cat_name}}</a></li>
                        @endforeach
                    </ul>

                </div>
                <!-- /category nav -->

                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/about')}}">About</a></li>
                        <li><a href="{{url('/shop')}}">Shop</a></li>
                        <li><a href="{{url('/women')}}">Women </a></li>
                        <li><a href="{{url('/men')}}">Men </a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                        
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->