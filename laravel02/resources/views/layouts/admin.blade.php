<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/admin/scss/app.scss', 'resources/admin/js/app.js'])
</head>

<body>
    <header>
        <h1>Unicode Academy</h1>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <nav>
                    <ul class="nav flex-column">
                        <li><a href="{{ route('admin.dashboard') }}">Tổng quan</a></li>
                        @can('viewAny', \App\Models\Product::class)
                            <li><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
                        @endcan

                        <li><a href="#">Bài viết</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>

    <footer>
        <p>
            Copyright &copy;Unicode Academy
        </p>
    </footer>
</body>

</html>
