<style>
    .dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a class="navbar-brand" href="#">Lanxinggai</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Trang chủ <span class="sr-only">(hiện tại)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Quản lý người dùng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Quản lý sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Báo cáo</a>
            </li>
            <li class="nav-item">
                @auth
                <div class="dropdown">
                    <a href="#" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" id="navbarDropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                <a href="login">
                    <button class="vnn__login-btn" style="display: flex; background: none; border: none; cursor: pointer; gap: 5px; height:100%">
                        <span style="margin: auto; transform: translateY(-2px); border: none">
                            <img src="https://static.vnncdn.net/icon-v1/dang-nhap.svg" alt="login vietnamnet" style="width: 20px;">
                        </span>
                    </button>
                </a>
                    {{-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif --}}
                @endauth
            </li>
        </ul>
    </div>
</nav>