<h2>Danh sách sản phẩm</h2>
@foreach ($products as $product)
    <h3>{{ $product->name }}</h3>
@endforeach
