<div class="container d-flex align-items-center justify-content-lg-between">

    <!--<h1 class="logo me-auto me-lg-0"><a href="{{ route('front.index') }}"><img src="assets/img/Durvankur-hub-logo.png" alt="Durvankur Hub Logo"><span>.</span></a></h1>-->
    <!-- Uncomment below if you prefer to use an image logo -->
    <a href="{{ route('front.index') }}" class="logo me-auto me-lg-0"><img src="{{ asset('front/assets/img/Durvankur-hub-logo.png') }}" alt="" class="img-fluid"></a>
    <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            <li><a class="nav-link scrollto active" href="{{ route('front.index') }}#hero">Home</a></li>
            <li><a class="nav-link scrollto" href="{{ route('front.index') }}#about">About</a></li>
            <!--<li><a class="nav-link scrollto" href="#services">Products</a></li>-->
            
            <li class="dropdown"><a href="{{ route('front.products') }}"><span>Products</span> </a><!-- <i class="bi bi-chevron-down"></i> -->
                <!-- <ul>
                    @foreach ($menu['data'] as $value)
                    
                    <li {{ count($value["sub"]) > 0 ? 'class=dropdown' : '' }}  ><a href="#services"><span>{{ $value['category_name'] }} </span> @if (!empty($value['sub'])) <i class="bi bi-chevron-right"></i>  @endif</a>
                        @if (!empty($value['sub']))
                        <ul>
                            @foreach  ($value['sub'] as $value2)
                            <li><a href="#services">{{ $value2->subcategory_name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul> -->
            </li>
            <li><a class="nav-link scrollto " href="{{ route('front.index') }}#portfolio">Gallery</a></li>
            <li><a class="nav-link scrollto" href="{{ route('front.index') }}#team">Team</a></li>

            <li><a class="nav-link scrollto" href="{{ route('front.index') }}#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <a href="{{ route('front.products') }}" class="get-started-btn scrollto"> <i class="bi-shop-window"></i> Enter the Store</a>
    <a href="{{ route('cart.list') }}" class="flex items-center">
        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
        </svg>
        <span id="cartCount">{{ Cart::getTotalQuantity()}}</span>
    </a>
</div>