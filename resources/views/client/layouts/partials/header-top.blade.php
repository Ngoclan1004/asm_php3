<div class="site-navbar-top">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="" class="site-block-top-search">
                    <span class="icon icon-search2"></span>
                    <input type="text" class="form-control border-0" placeholder="Search">
                </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                    <a href="index.html" class="js-logo-clone">Shoppers</a>
                </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                    <ul>
                        <li><a href="#">
                            {{-- <span class="icon icon-person"></span> --}}
                                @if (Route::has('login'))
                                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                                        @auth
                                            <a href="{{ url('/home') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                                in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </a></li>
                        <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                        <li>
                            <a href="{{ url('cart') }}" class="site-cart">
                                <span class="icon icon-shopping_cart"></span>
                            </a>
                        </li>
                        <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>