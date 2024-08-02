<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị</title>
    @include('admin.layouts.partials.css')
</head>
<body>
    @include('admin.layouts.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('admin.layouts.partials.menu')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    @yield('head')
                    @include('admin.layouts.partials.navbar-bot')
                </div>


                @yield('title')
                @yield('main')
            </main>
        </div>
    </div>

    @include('admin.layouts.partials.js')
</body>
</html>
