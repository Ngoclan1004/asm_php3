<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            {{-- <li class="nav-item">
                <a class="nav-link active" href="#">
                    <span data-feather="home"></span>
                    Bảng điều khiển <span class="sr-only">(hiện tại)</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" href="{{route('danhmuc.list')}}">
                    {{-- <span data-feather="file"></span> --}}
                    <i class="fa-solid fa-list"></i>
                    Danh mục
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sanpham.list')}}">
                    <span data-feather="shopping-cart"></span>
                    Sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="users"></span>
                    Khách hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('banner.list')}}">
                    <span data-feather="bar-chart-2"></span>
                    Banner
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('donhang.list')}}">
                    <span data-feather="layers"></span>
                    Đơn hàng
                </a>
            </li>
        </ul>
    </div>
</nav>